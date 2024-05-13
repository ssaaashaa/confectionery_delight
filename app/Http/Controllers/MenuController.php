<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;
use App\Models\MenuProduct;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index() {

        $categories = MenuCategory::all();
        $products = MenuProduct::where('menu_category_id', '1')
        ->get();
        return view('menu', [
            "products" => $products,
            "categories" => $categories
        ]);
    }
}
