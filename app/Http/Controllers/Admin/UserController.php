<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.user.index', ['count' => User::count()]);
    }

    public function data()
    {
        return datatables()->of(User::query())->toJson();
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserStoreRequest $request)
    {
        $user = new User();
        $user->fill($request->all());

        if ($user->save()) {
            session()->flash('notice', ['message' => 'Kayıt başarıyla oluşturuldu.', 'type' => 'success']);

            return redirect()->route('admin.user.index');
        } else {
            session()->flash('notice', ['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);

            return back()->withInput();
        }
    }

    public function show($id)
    {
        return $id;
    }

    public function edit(User $user)
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->name = $request->get("name");
        $user->mobile = $request->get("mobile");
        $user->role = $request->get("role");

        if ($request->has("password")) {
            $user->password = bcrypt($request->get("password"));
        }

        if ($user->save()) {
            session()->flash('notice', ['message' => 'Kayıt başarıyla güncellendi.', 'type' => 'success']);

            return redirect()->route('admin.user.index');
        } else {
            session()->flash('notice', ['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);

            return back()->withInput();
        }
    }

    public function destroy($id)
    {
        if (User::destroy($id)) {
            return response(['message' => 'Kayıt başarıyla silindi.', 'type' => 'success']);
        }

        return response(['message' => 'Hata meydana geldi! Lütfen tekrar deneyiniz.', 'type' => 'error']);
    }
}
