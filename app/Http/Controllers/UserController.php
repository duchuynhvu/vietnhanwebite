<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.pages.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:20|confirmed'
        ]);

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'role' => $data['role']
        ]);

        Session::flash('message', 'User successfully added!');

        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = $user->findOrFail($user->id);
        return view('admin.pages.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        $user = $user->findOrFail($user->id);
        if ($data['email'] == $user->email) {
            $this->validate($request, [
                'name' => 'required|max:255'
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users'
            ]);
        }

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role']
        ]);

        Session::flash('message', 'User successfully updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user = $user->findOrFail($user->id);
        $user->delete();
        Session::flash('message', 'User successfully deleted!');
        return redirect()->route('users.index');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|max:20|confirmed'
        ]);

        $id = $request->id;
        $password = $request->password;

        $user = User::findOrFail($id);

        $user->update([
            'password' => bcrypt($password)
        ]);

        Session::flash('message', 'User Password successfully updated!');

        return redirect()->back();
    }

    public function profile(User $user)
    {
        $id = Auth::user()->id;
        $user = $user->findOrFail($id);
        return view('admin.pages.user.profile', compact('user'));
    }

    public function profileUpdate(User $user, Request $request)
    {
        $id = Auth::user()->id;
        $user = $user->findOrFail($id);
        $data = $request->all();
        if ($data['email'] == $user->email) {
            $this->validate($request, [
                'name' => 'required|max:255',
                'avatar' => 'image|max:2000'
            ]);
        } else {
            $this->validate($request, [
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'avatar' => 'image|max:2000'
            ]);
        }
        if (Input::hasFile('avatar')) {
            $path = 'uploads/avatar';
            $filename = Input::file('avatar')->getClientOriginalName();
            Input::file('avatar')->move($path, $filename);
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'avatar' => $filename
            ]);
        } else {
            $user->update([
                'name' => $data['name'],
                'email' => $data['email']
            ]);
        }

        Session::flash('message', 'Profile successfully updated!');

        return redirect()->back();
    }

}
