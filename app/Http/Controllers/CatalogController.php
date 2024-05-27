<?php

namespace App\Http\Controllers;

use App\Models\Biscuit;
use App\Models\Design;
use App\Models\DesignCategory;
use App\Models\Fill;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\TasteCombination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CatalogController extends Controller
{
    public function index($product_category)
    {
        $category = ProductCategory::findOrFail($product_category);
        $products = $category->designs;
        $design_categories = DesignCategory::where('product_category_id', $category->id)
            ->get();
        return view('catalog.index', [
            "products" => $products,
            "category" => $category,
            "design_categories" => $design_categories
        ]);

    }


    public function show($product_category_id, $id)
    {
        //сам продукт и его описание
        $category = ProductCategory::findOrFail($product_category_id);
        $product = Design::findOrFail($id);
        $fills = Fill::all();
        $biscuits = $this->getBiscuits();
        $reviews = DB::table('reviews')
            ->orderBy('created_at', 'desc')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.review as review', 'reviews.created_at as created_at', 'users.name as name', 'users.avatar as avatar')
            ->get();



        return view('catalog.show', [
            "product" => $product,
            "price" => $category->price,
            "biscuits" => $biscuits,
            "fills" => $fills,
            'reviews' => $reviews
        ]);
    }

    public function getBiscuits()
    {
        $biscuits = Biscuit::all();
        return $biscuits;
    }

    public function getFills(Request $request)
    {
        //dd($request->biscuit_id);
        $fills = TasteCombination::where('biscuit_id', $request->biscuit_id)
            ->get();
        $fills = json_decode($fills);
        //dd($fills);
        return response()->json($fills);
    }

    public function total_price(Request $request) {

        if ($request->fill_id == "null") {
            $taste = DB::table('taste_combinations')
                ->where('biscuit_id',  $request -> biscuit_id)
                ->whereNull('fill_id')
                ->get();
        } else if ($request->fill_id != "null") {
            $taste = DB::table('taste_combinations')
                ->where('biscuit_id', $request -> biscuit_id)
                ->where('fill_id', $request->fill_id)
                ->get();
        }
        $taste_ratio = $taste[0]->ratio;
        return ["taste_ratio" => $taste_ratio];


    }

    public function inCartOrNot(Request $request)
    {

        $cart = $request->session()->get('cart');

        $id = $request->id;

        $flag = 0;
        if (isset($cart[$id])) {
            $flag = 1;
        }
        //  dd($flag);
        return $flag;
    }

    public function addToCart(Request $request)
    {
        $design = Design::where('id', $request->design_id)
            ->get('id');
        $design = json_decode($design);
        $design_id = $design[0]->id;
        $pieces = $request->pieces;
        $biscuit_id = $request->biscuit_id;
        $fill_id = $request->fill_id;
        $price = $request->price;

        $id = $pieces . $biscuit_id . $fill_id . $design_id;

        $cart = $request->session()->get('cart', []);
        $cart[$id] = [
            "id" => $id,
            "pieces" => (int)$pieces.' шт',
            "biscuit_id" => $biscuit_id,
            "fill_id" => $fill_id,
            "design_id" => $design_id,
            "quantity" => 1,
            "price" => (float)$price
        ];

        $request->session()->put('cart', $cart);

        return response()->json(["biscuit_id" => $biscuit_id, "design_id" => $design]);


    }


}
