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


class CakeController extends Controller
{
    public function index()
    {
        $fills = Fill::all();
        $biscuits = $this->getBiscuits();
        $category = ProductCategory::where('name', 'Торт')
        ->get();
        $price = $category[0]->price;
        $category_id = $category[0]->id;
        $designs = Design::where('product_category_id', $category_id)
            ->get();
        return view('cake.index', [
            "biscuits" => $biscuits,
            "fills" => $fills,
            "price" => $price,
            'designs'=> $designs
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
        return response()->json($fills);
    }

    public function getTasteImg(Request $request)
    {
        if ($request->fill_id == "null") {
            $taste = DB::table('taste_combinations')
                ->where('biscuit_id', $request->biscuit_id)
                ->whereNull('fill_id')
                ->get('img');
        } else
            $taste = TasteCombination::where('biscuit_id', $request->biscuit_id)
                ->where('fill_id', $request->fill_id)
                ->get('img');
        return response($taste[0]->img);

    }
    public function upload(Request $request) {
        $path = $request->file('iamge')->store('upload_designs', 'public');
        return response($path);
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
//        $design = Design::where('id', $request->design_id)
//            ->get('id');
//        $design = json_decode($design);
//        $design_id = $design[0]->id;
        $pieces = $request->pieces;
        $weight = $request->weight;
        $biscuit_id = $request->biscuit_id;
        $fill_id = $request->fill_id;
        $design_id = $request->design_id;
        $price = $request->price;


        $id = $pieces . $biscuit_id . $fill_id . $design_id.'cake';
//        \Session::getHandler()->destroy(session()->getId());

        $cart = $request->session()->get('cart', []);
        $cart[$id] = [
            "id" => $id,
            "pieces" => (int)$pieces,
            "weight" => $weight,
            "biscuit_id" => $biscuit_id,
            "fill_id" => $fill_id,
            "design_id" => $design_id,
            "quantity" => 1,
            "price" => (float)$price
        ];

        $request->session()->put('cart', $cart);
        //\Session::getHandler()->destroy(session()->getId());
        //dd($cart);

        return response()->json(["biscuit_id" => $biscuit_id]);


    }


}
