<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\UserInfo;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ChangePasswordRequest;

class UserController extends Controller
{
    /**
     * Retrieves all users
     * @param  User   $user Object used to retrieve the users from the database
     * @return View         Renders a list of all the users
     */
    public function get_all(User $user) {
        $users = $user->all()->load('user_info');
        return view('users', ['users' => $users]);
    }

    /**
     * Retrieves a single user
     * @param  User   $user   Object used to find the right user
     * @return View           Renders the profile page
     * @return HTTP Error 404 Throws an error if someone tries view a user that doesn't exist
     */
    public function get(User $user) {
        if ($user->where('id',$user->id)->exists()) {
            $user = $user->find($user->id)->load('user_info');
            return view('profile', ['user' => $user]);
        } else {
            return abort(404, 'Not Found');
        }
    }

    /**
     * Creates a new user
     * @param  CreateUserRequest $request Object containing the data submitted by the user
     * @param  User              $user    Object used the register the new user in the database
     * @return Response                   Redirects with a success message
     * @return Response                   Redirects with an error message
     */
    public function create(CreateUserRequest $request, User $user) {
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        if($user->save()) {
            $info = new UserInfo;
            $info->user_id = $user->id;
            if ($info->save()) {
                return redirect(route('login.form'))->with('success', 'You have been registered and can now login.');
            }
        }
        return back()->with('error', 'An error happend during the registration process. Please try again.');
    }

    /**
     * Renders the form for updating the users information
     * @param  User   $user   Object containing user data
     * @return View
     * @return HTTP Error 403 Throws an error if someone tries to edit a user that is not their own
     */
    public function update_form(User $user) {
        if (Auth::user()->id === $user->id) {
            return view('profile.edit', ['user' => $user->user_info]);
        } else {
            return abort(403, 'Unauthorized action.');
        }
    }

    /**
     * Updates the users information
     * @param  UpdateUserRequest $request Object containing the data submitted by the user
     * @param  User              $user    Object used to update the users information
     * @return Response                   Redirects with a success message
     * @return Response                   Redirects with an error message
     */
    public function update(UpdateUserRequest $request, User $user) {
        if (null === $user->user_info->user_id) { $user->user_info->user_id = $user->id; }
        $user->user_info->name = $request->name;
        $user->user_info->email = $request->email;
        $user->user_info->birthday = $request->birthday;
        if($user->user_info->save()){
            return back()->with('success', 'Your profile has been updated.');
        }
        return back()->with('error', 'Your profile was not updated. Please try again.');
    }

    /**
     * Renders the password change form
     * @return View
     * @return HTTP Error 403 Throws an error if someone tries to change the password of a user that is not their own
     */
    public function change_password_form(User $user) {
        if (Auth::user()->id === $user->id) {
            return view('profile.change_password', ['user' => $user]);
        } else {
            return abort(403);
        }
    }

    /**
     * Changes the users password
     * @param  ChangePasswordRequest $request Object containing the data submitted by the user
     * @param  User                  $user    Object used to change the users password
     * @return Response                       Redirects with a success message
     * @return Response                       Redirects with an error message
     */
    public function change_password(ChangePasswordRequest $request, User $user) {
        $user->password = bcrypt($request->password);
        if($user->save()){
            return back()->with('success', 'Your password has been changed.');
        }
        return back()->with('error', 'Your password was not changed. Please try again.');
    }
}
