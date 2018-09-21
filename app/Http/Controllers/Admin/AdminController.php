<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Repositories\Contracts\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $users;

    /**
     * AdminController constructor.
     * @param UserRepository $users
     */
    public function __construct(UserRepository $users)
    {

        $this->users = $users;
    }

    public function index() {

        return view('admin.index');
    }

    public function show() {

        $admin = Auth::user();

        return view('admin.show', compact('admin'));
    }

    public function update(UserRequest $request) {

        $admin = Auth::user();

        $this->users->update($admin->id, [

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('admin.show')
            ->withSuccess('profile updated successfully.');
    }

    public function changePassword() {


        return view('admin.password');
    }

    public function updatePassword(PasswordRequest $request) {

        if (!(Hash::check($request->current_password, Auth::user()->password))) {

            // The passwords matches
            return redirect()
                ->back()
                ->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->current_password, $request->get('new-password')) == 0) {

            //Current password and new password are same
            return redirect()
                ->back()
                ->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }

        $this->users->update(auth()->id(), [
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('admin.change.password')
            ->withSuccess('password updated successfully.');
    }
}
