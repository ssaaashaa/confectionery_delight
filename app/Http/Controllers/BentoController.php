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


class BentoController extends Controller
{
    public function index()
    {
        $category = ProductCategory::where('name', 'Бенто-бокс')
            ->get();
        $price = $category[0]->price;
        $biscuits = $this->getBiscuits();
        $fills = Fill::all();
        $image = Design::where('product_category_id', $category[0]->id)
        ->get();
//        dd($image);
        $image = $image[0];

        return view('bento.index', [
            "biscuits" => $biscuits,
            "fills" => $fills,
            "price" => $price,
            "image" => $image,
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
        $design_id = $request->design_id;
        $pieces = $request->pieces;
        $biscuit_id = $request->biscuit_id;
        $fill_id = $request->fill_id;
        $price = $request->price;

        $id = $pieces . $biscuit_id . $fill_id . $design_id.'bento';
//        \Session::getHandler()->destroy(session()->getId());

        $cart = $request->session()->get('cart', []);
        $cart[$id] = [
            "id" => $id,
            "pieces" => (int)$pieces.' гр',
            "biscuit_id" => $biscuit_id,
            "fill_id" => $fill_id,
            "design_id" => $design_id,
            "quantity" => 1,
            "price" => (float)$price
        ];

        $request->session()->put('cart', $cart);
//        dd($cart);

        return response()->json(["biscuit_id" => $biscuit_id, "design_id" => $design_id]);


    }


}
