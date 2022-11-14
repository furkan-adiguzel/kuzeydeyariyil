<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AttenderStoreRequest;
use App\Http\Requests\Admin\AttenderUpdateRequest;
use App\Models\Attender;
use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class AttenderController extends Controller
{
    public function index()
    {
        return view('admin.attender.index', ['count' => Attender::count()]);
    }

    public function data()
    {
        return datatables()->of(Attender::query()->with('package', 'room'))
            ->addColumn('created_date', function ($attender) {
                return $attender->created_at?->format('Y-m-d H:i:s');
            })
            ->addColumn('updated_date', function ($attender) {
                return $attender->updated_at?->format('Y-m-d H:i:s');
            })
            ->toJson();
    }

    public function create()
    {
        return view('admin.attender.create', [
            'packages' => Package::get()->pluck('name', 'p_id'),
            'users' => User::get()->pluck('fullname_mobile', 'u_id')
        ]);
    }

    public function store(AttenderStoreRequest $request)
    {
        $attender = new Attender();
        $attender->fill($request->all());

        if ($attender->save()) {
            session()->flash('notice', ['message' => 'Kayıt başarıyla oluşturuldu.', 'type' => 'success']);

            return redirect()->route('admin.attender.index');
        } else {
            session()->flash('notice', ['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);

            return back()->withInput();
        }
    }

    public function show($id)
    {
        return $id;
    }

    public function edit(Attender $attender)
    {
        return view('admin.attender.edit', [
            'attender' => $attender,
            'packages' => Package::get()->pluck('name', 'p_id'),
            'users' => User::get()->pluck('fullname_mobile', 'u_id')
        ]);
    }

    public function update(AttenderUpdateRequest $request, Attender $attender)
    {
        $attender->fill($request->all());

        if ($attender->save()) {
            session()->flash('notice', ['message' => 'Kayıt başarıyla güncellendi.', 'type' => 'success']);

            return redirect()->route('admin.attender.index');
        } else {
            session()->flash('notice', ['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);

            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        if (Attender::destroy($id)) {
            return response(['message' => 'Kayıt başarıyla silindi.', 'type' => 'success']);
        }

        return response(['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);
    }

    public function download($folder, $name)
    {
//        return Storage::disk('public')->download($file->path);
        return Storage::download($folder . '/' . $name);
    }
}
