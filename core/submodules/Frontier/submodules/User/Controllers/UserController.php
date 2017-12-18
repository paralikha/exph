<?php

namespace User\Controllers;

use Frontier\Controllers\AdminController;
use Illuminate\Http\Request;
use Role\Models\Role;
use User\Models\Detail;
use User\Models\User;
use User\Requests\UserRequest;

class UserController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resources = User::paginate();
        $trashed = User::onlyTrashed()->count();

        return view("Theme::users.index")->with(compact('resources', 'trashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::select('name', 'code', 'description', 'id');
        if (! user()->isRoot()) {
            $roles = $roles->except(config('auth.rootroles', []));
        }
        $roles = $roles->get();

        $avatars = User::avatars();

        return view("Theme::users.create")->with(compact('roles', 'avatars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \User\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        // User
        $user = new User();
        $user->prefixname = $request->input('prefixname');
        $user->firstname = $request->input('firstname');
        $user->middlename = $request->input('middlename');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->avatar = $request->input('avatar');
        $user->save();

        // Role
        $user->roles()->attach($request->input('roles'));

        // Detail
        $detail = new Detail();
        $detail->birthday = date('Y-m-d', strtotime($request->input('birthday')));
        $detail->phone = $request->input('phone');
        $detail->sex = $request->input('sex');
        $detail->gender = $request->input('gender');
        $detail->address = $request->input('address');
        $user->detail()->save($detail);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $resource = User::findOrFail($id);

        return view("Theme::users.show")->with(compact('resource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $resource = User::findOrFail($id);
        $roles = Role::select('name', 'code', 'description', 'id');
        if (! user()->isRoot()) {
            $roles = $roles->except(config('auth.rootroles', []));
        }
        $roles = $roles->get();

        $avatars = User::avatars();

        return view("Theme::users.edit")->with(compact('resource', 'roles', 'avatars'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \User\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        // User
        $user = User::findOrFail($id);
        $user->prefixname = $request->input('prefixname');
        $user->firstname = $request->input('firstname');
        $user->middlename = $request->input('middlename');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->avatar = $request->input('avatar');
        $user->save();

        // Role
        $user->roles()->sync($request->input('roles'));

        // Detail
        $detail = Detail::firstOrCreate(['user_id' => $user->id]);
        $detail->birthday = date('Y-m-d', strtotime($request->input('birthday')));
        $detail->phone = $request->input('phone');
        $detail->sex = $request->input('sex');
        $detail->gender = $request->input('gender');
        $detail->address = $request->input('address');
        $user->detail()->save($detail);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $resources = User::onlyTrashed()->paginate();

        return view("Theme::users.trash")->with(compact('resources'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore(Request $request, $id)
    {
        $user = User::onlyTrashed()->findOrFail($id);
        $user->restore();

        return back();
    }

    /**
     * Delete the specified resource from storage permanently.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();

        return redirect()->route('users.trash');
    }
}
