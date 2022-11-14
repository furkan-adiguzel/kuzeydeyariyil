<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attender;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\SmsService;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        return view('admin.message.index');
    }

    public function send(Request $request, SmsService $smsService)
    {
        $group = $request->post('group');
        $message = $request->post('message');
        $message = str_replace(["\r", "\n"], ['', '\n'], $message);
        $messageCount = 0;

        if ($group === 'to-users') {
            $users = User::all();

            foreach ($users as $user) {
                $smsService->send($user->mobile, $message);
            }

            $messageCount = count($users);
        }

        if ($group === 'to-not-attenders') {
            $users = User::doesntHave('attender')->get();

            foreach ($users as $user) {
                $smsService->send($user->mobile, $message);
            }

            $messageCount = count($users);
        }

        if ($group === 'to-not-have-room') {
            $attenders = Attender::doesntHave('room')->get();

            foreach ($attenders as $attender) {
                $smsService->send($attender->mobile, $message);
            }

            $messageCount = count($attenders);
        }

        if ($group === 'to-attenders') {
            $attenders = Attender::all();

            foreach ($attenders as $attender) {
                $smsService->send($attender->mobile, $message);
            }

            $messageCount = count($attenders);
        }

        if ($group === 'to-not-paid') {
            $attenders = Attender::all();

            foreach ($attenders as $attender) {
                if (! $attender->is_paid) {
                    $smsService->send($attender->mobile, $message);
                    $messageCount++;
                }
            }
        }

        session()->flash('notice', ['message' => sprintf('%s mesaj gönderildi.', $messageCount), 'type' => 'success']);

        return redirect()->route('admin.message');
    }

}
