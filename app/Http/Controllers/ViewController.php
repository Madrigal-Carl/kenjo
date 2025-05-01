<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function viewHome() {
        return response()->view('pages.home', [], 200);
    }

    public function viewSignin() {
        if (Auth::check()) {
            return redirect()->route('home', [], 302);
        }

        return response()->view('pages.signin', [], 200);
    }

    public function viewSignup() {
        if (Auth::check()) {
            return redirect()->route('home', [], 302);
        }

        return response()->view('pages.signup', [], 200);
    }

    public function viewCart() {
        if (!Auth::check()) {
            return redirect()->route('signin', [], 302);
        }

        return response()->view('pages.cart', [], 200);
    }

    public function viewAdminOrder() {
        if (!Auth::check()) {
            return redirect()->route('signin', [], 302);
        }

        if (Auth::user()->role != 'admin'){
            return redirect()->route('home', [], 302);
        }

        $orders = Order::with('customer')->orderBy('created_at', 'desc')->get();
        $users = User::all()->where('role', 'customer');

        return response()->view('pages.admin', [
            'orders' => $orders,
            'users' => $users
        ], 200);
    }
}
