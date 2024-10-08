<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateAdminRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate(20);
        return view("admin.user.index", compact(['users']));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view("admin.user.show", compact("user"));
    }

    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("admin.user.edit", compact("user"));
    }

     /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('admin.users.index', $user->id)->with('success', 'Пользователь успешно обновлен');
    }

    /**
     * Block the specified user.
     */
    public function block($id)
    {
        $user = User::find($id);
        $user->status = 0;
        $user->save();

        return redirect()->route("admin.users.index")->with("success","Пользователь успешно заблокирован");
    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route("admin.users.index")->with("success","Пользователь успешно удален");
    }
}
