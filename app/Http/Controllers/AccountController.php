<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {

        $user_id = Auth::id();
        if($user_id) {
            $name = User::findOrFail($user_id)->name;
            $orders = Order::where('user_id', $user_id)
                ->get();
            return view('account.index', ["name" => $name, "orders" => $orders]);
        } else
            return view('account.index');

    }
}
