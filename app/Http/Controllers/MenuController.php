<?php

namespace App\Http\Controllers;

use App\Models\MenuProduct;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {
        $products = MenuProduct::all();
        return view('menu', [
            "products" => $products
        ]);
    }
}
