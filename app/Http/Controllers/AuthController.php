<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:35',
            'phone_number' => 'required|unique:users',
            'password' => 'required|confirmed'
        ], [
            'fullname.required' => 'Please enter your full name.',
            'fullname.max' => 'Fullname max only 35 letters',
            'phone_number.required' => 'We need your phone number to continue.',
            'phone_number.unique' => 'That phone number is already in use.',
            'password.required' => 'Don’t forget to set a password.',
            'password.confirmed' => 'Your passwords don’t match — Try again.',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            flash()->title('Invalid Input')->error($message);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'fullname' => $request->fullname,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role' => 'customer'
        ]);

        flash()->title('Account created')->success('You can now log in.');
        return redirect()->route('signin', [], 303);
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'phone_number' => 'required|exists:users,phone_number',
            'password' => 'required'
        ], [
            'phone_number.required' => 'Please enter your phone number.',
            'phone_number.exists' => 'We couldn’t find an account with that phone number.',
            'password.required' => 'Please enter your password.'
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->first();
            flash()->title('Invalid Input')->error($message);
            return redirect()->back()->withInput();
        }

        $user = User::where('phone_number', $request->phone_number)->first();

        if (!Hash::check($request->password, $user->password)) {
            flash()->title('Invalid Input')->error('Invalid credentials');
            return back()->withInput();
        }

        Auth::login($user);
        flash()->title('Welcome back!')->success('You’ve logged in successfully.');

        if (Auth::user()->role == 'admin') {
            return redirect()->route('admin.order', [], 303);
        }

        return redirect()->route('home', [], 303);
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        flash()->title('Logged out')->success('See you next time!');
        return redirect()->route('home', [], 303);
    }
}
