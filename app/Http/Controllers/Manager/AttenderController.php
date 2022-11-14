<?php

namespace App\Http\Controllers\Manager;

use App\Models\Attender;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class AttenderController extends Controller
{
    public function index()
    {
        return view('manager.attender.index', ['count' => Attender::count()]);
    }

    public function data()
    {
        return datatables()->of(Attender::query()->with('package'))
            ->addColumn('entered_at', function ($attender) {
                if ($attender->entered_date) {
                    return (new Carbon($attender->entered_date))->format('Y-m-d H:i:s');
                }
                return null;
            })
            ->toJson();
    }

    public function entered($id)
    {
        /** @var Attender $attender */
        $attender = Attender::find($id);
        if (!$attender) {
            session()->flash('notice', ['message' => 'Hata! katılımcı bulunamadı.', 'type' => 'error']);
        }

        $attender->entered_date = new Carbon('now');

        if ($attender->save()) {
            session()->flash('notice', ['message' => 'Katılımcının girişi başarıyla onaylandı.', 'type' => 'success']);
        } else {
            session()->flash('notice', ['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);
        }

        return redirect()->route('manager.attender.index');
    }

    public function download($folder, $name)
    {
        return Storage::download($folder . '/' . $name);
    }
}
