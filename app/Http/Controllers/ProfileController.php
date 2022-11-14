<?php

namespace App\Http\Controllers;

use App\Models\Attender;
use App\Models\Room;
use App\Models\RoommateRequest;
use App\Services\SmsService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  Request  $request
     * @return View|Response|RedirectResponse
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        /** @var Attender $attender */
        $attender = $user->attender;

        if ($attender) {
            $roommateRequest = RoommateRequest::query()
                ->where('owner_id', $attender->a_id)
                ->where('status', 'waiting')
                ->first();
        }


        return view('profile/index', [
            'attender' => $attender,
            'roommateRequest' => $roommateRequest ?? null,
        ]);
    }

    public function addRoommate(Request $request, SmsService $smsService)
    {
        $userAttender = Auth::user()->attender;

        if (!$userAttender->room_select) {
            return redirect()->route('profile')->withErrors([
                'message' => 'Henüz oda arkadaşı ekleyemezsiniz.',
            ]);
        }

        $request->validate([
            'mobile' => ['required'],
        ]);

        $attender = Attender::query()
            ->where('user_id', '!=', $userAttender->user_id)
            ->where('mobile', $request->post('mobile'))
            ->first();

        if (!$attender) {
            return redirect()->route('profile')->withErrors([
                'message' => 'Bu telefon numarası ile kaydolmuş bir katılımcı bulunmuyor.',
            ]);
        }

        if (!$attender->room_select) {
            return redirect()->route('profile')->withErrors([
                'message' => 'Oda arkadaşınızın kaydı henüz onaylanmamıştır.',
            ]);
        }

        if ($attender->package_id !== $userAttender->package_id) {
            return redirect()->route('profile')->withErrors([
                'message' => 'Oda arkadaşınızla sizin paketleriniz eşleşmiyor.',
            ]);
        }

        if ($attender) {
            $roommateRequest = new RoommateRequest();
            $roommateRequest->owner_id = $userAttender->a_id;
            $roommateRequest->friend_id = $attender->a_id;
            $roommateRequest->token = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 8);
            $roommateRequest->status = 'waiting';
            $roommateRequest->save();

            $message = sprintf('%s sizi oda arkadaşı olarak eklemek istiyor. %s bağlantısına tıklayarak oda arkadaşı talebini onaylayabilirsiniz.',
                ($userAttender->name.' '.$userAttender->surname),
                route('profile.accept-roommate', ['token' => $roommateRequest->token])
            );

            $smsService->send($attender->mobile, $message);

            return redirect()->route('profile')->with([
                'message' => 'Arkadaşlık talebiniz iletilmiştir. Gelen SMS üzerinden talebinizi onaylayabilir.',
            ]);
        }
    }

    public function acceptRoommateRequest($token)
    {
        /** @var RoommateRequest $roommateRequest */
        $roommateRequest = RoommateRequest::query()
            ->where('token', $token)
            ->where('status', 'waiting')
            ->first();

        if (! $roommateRequest) {
            return redirect()->route('home')->withErrors([
                'message' => 'İstek bulunamadı.',
            ]);
        }

        $redirectRoute = Auth::id() ? 'profile' : 'home';

        // friend oda yoksa.
        if ($roommateRequest->friend->room_id === null) {
            // istek atan oda yoksa
            if ($roommateRequest->owner->room_id === null) {
                // paket toplam kişi sayısı 1'den büyükse
                if ($roommateRequest->owner->package->room_person > 1) {
                    // Oda aç ve arkadaşı ve istek yapanı odaya ekle.
                    $room = new Room();
                    $room->package_id = $roommateRequest->owner->package_id;
                    $room->save();

                    $roommateRequest->owner->room_id = $room->r_id;
                    $roommateRequest->owner->save();

                    $roommateRequest->friend->room_id = $room->r_id;
                    $roommateRequest->friend->save();
                } else {
                    $this->makeRequestDone($roommateRequest);

                    return redirect()->route($redirectRoute)->withErrors([
                        'message' => 'Odada yeterli alan yok.',
                    ]);
                }
            // istek atanın oda varsa
            } else {
                // paket toplam kişi sayısı, istek atanın odasının kişi sayısından fazla ise
                // arkadaşı odaya ekle
                if ($roommateRequest->owner->package->room_person > count($roommateRequest->owner->room->attenders)) {
                    $roommateRequest->friend->room_id = $roommateRequest->owner->room_id;
                    $roommateRequest->friend->save();
                } else {
                    $this->makeRequestDone($roommateRequest);

                    return redirect()->route($redirectRoute)->withErrors([
                        'message' => 'Odada yeterli alan yok.',
                    ]);
                }
            }

            $this->makeRequestDone($roommateRequest);

            return redirect()->route($redirectRoute)->with([
                'message' => 'Oda arkadaşınız başarıyla eklendi.',
            ]);
        } else {
            $this->makeRequestDone($roommateRequest);

            return redirect()->route($redirectRoute)->withErrors([
                'message' => 'Oda arkadaşınız zaten bir odaya kayıtlı.',
            ]);
        }
    }

    private function makeRequestDone($roommateRequest)
    {
        $roommateRequest->status = 'done';
        $roommateRequest->save();
    }

    public function addReceipt(Request $request)
    {
        $path = $request->file('receipt')->store('receipt');

        $attender = Auth::user()->attender;
        $attender->receipt_2 = $path;
        $attender->paid_2_date = Carbon::now();
        $attender->save();

        return redirect()->route('profile')->with([
            'message' => 'Dekontunuz başarıyla yüklendi.',
        ]);
    }
}
