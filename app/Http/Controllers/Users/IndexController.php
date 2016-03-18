<?php

namespace App\Http\Controllers\Users;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\EditUserRequest;
use App\Roles;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Middleware Guard
     */
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Roles::lists('title', 'id');

        return view('users.create', compact('roles'));
    }

    /**
     * Input request is sanitized and checked by App\Requests\CreateUserRequest class
     * Store a newly created user in storage.
     *
     * @param CreateUserRequest $request
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        // create new user
        $user = User::createUser($request->all());

        // do synchronizing of tables 'user' and 'roles'
        User::syncRoles($user, $request->input('role_list'));

        return redirect('users');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Response
     * @internal param int $id
     */
    public function edit(User $user)
    {
        $roles = Roles::lists('title', 'id');

        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param CreateUserRequest $request
     * @return Response
     */
    public function update(User $user, CreateUserRequest $request)
    {
        if (User::updateUser($user, $request->all())) {

            User::syncRoles($user, $request->input('role_list'));

            return redirect()->back()->with('flash_message_user_updated', 'User data has been successfully updated!');
        }

        return redirect()->back()->with('flash_message_hacking', 'Password field empty!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
