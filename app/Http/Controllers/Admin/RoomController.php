<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RoomStoreRequest;
use App\Http\Requests\Admin\RoomUpdateRequest;
use App\Models\Attender;
use App\Models\Package;
use App\Models\Room;
use App\Http\Controllers\Controller;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.room.index', ['count' => Room::count()]);
    }

    public function data()
    {
        return datatables()->of(Room::query()->with('package', 'attenders'))->toJson();
    }

    public function create()
    {
        return view('admin.room.create', [
            'packages' => Package::get()->pluck('name', 'p_id'),
            'attenders' => Attender::get()->pluck('fullname_mobile', 'a_id'),
            'roomAttenders' => [],
        ]);
    }

    public function store(RoomStoreRequest $request)
    {
        $room = new Room();
        $room->fill($request->all());

        if ($room->save()) {
            if ($request->has('attenders') && !empty($request->get('attenders'))) {
                foreach ($request->get('attenders') as $id) {
                    /** @var Attender $attender */
                    $attender = Attender::find($id);
                    if (!$attender) {
                        continue;
                    }
                    $attender->room_id = $room->r_id;
                    $attender->save();
                }
            }

            session()->flash('notice', ['message' => 'Kayıt başarıyla oluşturuldu.', 'type' => 'success']);

            return redirect()->route('admin.room.index');
        } else {
            session()->flash('notice', ['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);

            return back()->withInput();
        }
    }

    public function show($id)
    {
        return $id;
    }

    public function edit(Room $room)
    {
        return view('admin.room.edit', [
            'room' => $room,
            'packages' => Package::get()->pluck('name', 'p_id'),
            'attenders' => Attender::get()->pluck('fullname_mobile', 'a_id'),
            'roomAttenders' => Attender::where('room_id', $room->r_id)->get()->pluck('fullname_mobile', 'a_id'),
        ]);
    }

    public function update(RoomUpdateRequest $request, Room $room)
    {
        $room->fill($request->all());

        // clear all attenders if it belongs to this room
        Attender::where('room_id', $room->r_id)->update(['room_id' => 0]);
        if ($request->has('attenders') && !empty($request->get('attenders'))) {
            foreach ($request->get('attenders') as $id) {
                /** @var Attender $attender */
                $attender = Attender::find($id);
                if (!$attender) {
                    continue;
                }
                $attender->room_id = $room->r_id;
                $attender->save();
            }
        }

        if ($room->save()) {
            session()->flash('notice', ['message' => 'Kayıt başarıyla güncellendi.', 'type' => 'success']);

            return redirect()->route('admin.room.edit', $room->r_id);
        } else {
            session()->flash('notice', ['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);

            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        if (Room::destroy($id)) {
            return response(['message' => 'Kayıt başarıyla silindi.', 'type' => 'success']);
        }

        return response(['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);
    }
}
