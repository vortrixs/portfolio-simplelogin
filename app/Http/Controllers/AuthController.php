<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class AuthController extends Controller
{
    /**
     * Handles login attempts
     * @return Response Redirects the user
     */
    public function authenticate(Request $request) {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            return redirect(route('users.list'));
        }
        return back()->with('error', 'The user doesn\'t exists. Please register as a new user first.');
    }

    /**
     * Renders the login page
     * @return View
     */
    public function show_login_form() {
        return view('login');
    }

    /**
     * Handles logout attempts
     * @return Response Redirects the user to the login page
     * @return Response Returns the user to the previous page
     * @return Boolean Returns false if the user is not logged in
     */
    public function logout() {
        if (Auth::logout()) {
            return redirect(route('login.form'))->with('success', 'You have been logged out.');
        } else {
            return back()->with('error', 'You could not be logged out. Contact an adminstrator if this happens again.');
        }
    }

    /**
     * Renders the registration page
     * @return View
     */
    public function show_register_form() {
        return view('register');
    }
}
