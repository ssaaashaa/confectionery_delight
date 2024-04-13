<?php

namespace App\Http\Controllers;

use App\Models\Biscuit;
use App\Models\Design;
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
//        $products = DB::table('products')
//            ->join('designs', 'designs.id', '=', 'products.design_id')
//            ->where('products.product_category_id', $product_category_id)->get();
        $category = ProductCategory::findOrFail($product_category);
        $products = $category->designs;
        return view('catalog.index', [
            "products" => $products,
            "category" => $category
        ]);

    }

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
        $fills = TasteCombination::where('biscuit_id', $request->biscuit_id)
            ->get();
        $fills = json_decode($fills);
        //dd($fills);
        return response()->json($fills);
    }


}
