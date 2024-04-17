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

//    public function getDesigns(Request $request)
//    {
//        //var_dump('get_designs');
//
//        $product_category_id = ProductCategory::where('name',$request->product_category_name)
//        ->get();
//        $product_category_price = $product_category_id[0]->price;
//        $product_category_id = $product_category_id[0]->id;
//        $this->index($product_category_id);
//        $products = Design::where('design_category_id', $request->design_category_id)
//            ->where('product_category_id', $product_category_id)
//            ->get();
//        dd($products);
//        return response()->json(["products"=>$products, "price" =>$product_category_price]);
//    }

    public function show($product_category_id, $id)
    {
        //сам продукт и его описание
        $category = ProductCategory::findOrFail($product_category_id);
        $product = Design::findOrFail($id);

//        //а тут уже параметры (вкус, бисквит)
//        $biscuits = Biscuit::all();
        $fills = Fill::all();
        $biscuits = $this->getBiscuits();

        return view('catalog.show', [
            "product" => $product,
            "price" => $category->price,
            "biscuits" => $biscuits,
            "fills" => $fills,
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
//        \Session::getHandler()->destroy(session()->getId());

        $cart = $request->session()->get('cart', []);
        $cart[$id] = [
            "id" => $id,
            "pieces" => (int)$pieces,
            "biscuit_id" => $biscuit_id,
            "fill_id" => $fill_id,
            "design_id" => $design_id,
            "quantity" => 1,
            "price" => (float)$price
        ];

        $request->session()->put('cart', $cart);
//        dd($cart);

        return response()->json(["biscuit_id" => $biscuit_id, "design_id" => $design]);


    }


}
