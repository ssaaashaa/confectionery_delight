<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index()
    {

//        $products = DB::table('order_details')
//            ->join('products', 'order_details.product_id','=', 'products.id')
//            ->join('designs', 'products.design_id', '=', 'designs.id')
//            ->join('taste_combinations', 'products.taste_combination_id', '=', 'taste_combinations.id')
//            ->join('biscuits', 'taste_combinations.biscuit_id', '=', 'biscuits.id')
//            ->leftJoin('fills', 'taste_combinations.fill_id', '=', 'fills.id')
//            ->where('order_details.order_id', '54')
//            ->select('designs.name', 'order_details.count', 'order_details.quantity', 'biscuits.name as biscuit_name', 'fills.name as fill_name')
//            ->get();


        $user_id = Auth::id();
        if ($user_id != 0) {
           // dd($user_id);
            $name = User::findOrFail($user_id)->name;
            $orders = Order::where('user_id', $user_id)
                ->get();
            return view('account.index', ["name" => $name, "orders" => $orders]);
        } else
            return view('account.index');

    }
}
