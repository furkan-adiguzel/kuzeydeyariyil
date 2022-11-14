<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PackageStoreRequest;
use App\Http\Requests\Admin\PackageUpdateRequest;
use App\Models\Package;
use App\Http\Controllers\Controller;

class PackageController extends Controller
{
    public function index()
    {
        return view('admin.package.index', ['count' => Package::count()]);
    }

    public function data()
    {
        return datatables()->of(Package::query())->toJson();
    }

    public function create()
    {
        return view('admin.package.create');
    }

    public function store(PackageStoreRequest $request)
    {
        $package = new Package();
        $package->fill($request->all());

        if ($package->save()) {
            session()->flash('notice', ['message' => 'Kayıt başarıyla oluşturuldu.', 'type' => 'success']);

            return redirect()->route('admin.package.index');
        } else {
            session()->flash('notice', ['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);

            return back()->withInput();
        }
    }

    public function show($id)
    {
        return $id;
    }

    public function edit(Package $package)
    {
        return view('admin.package.edit', [
            'package' => $package,
        ]);
    }

    public function update(PackageUpdateRequest $request, Package $package)
    {
        $package->fill($request->all());

        if ($package->save()) {
            session()->flash('notice', ['message' => 'Kayıt başarıyla güncellendi.', 'type' => 'success']);

            return redirect()->route('admin.package.index');
        } else {
            session()->flash('notice', ['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);

            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        if (Package::destroy($id)) {
            return response(['message' => 'Kayıt başarıyla silindi.', 'type' => 'success']);
        }

        return response(['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);
    }
}
