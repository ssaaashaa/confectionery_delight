<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Order;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function index()
    {


        $user_id = Auth::id();
        if ($user_id != 0) {
            // dd($user_id);
            $user = User::findOrFail($user_id);
            $orders = Order::where('user_id', $user_id)
                ->orderBy('id', 'desc')
                ->get();
            $orders_count = count($orders);
            $order_discount = Discount::where('name', 'Скидка за 1 заказ, (%)')
                ->firstOrFail();
            $max_discount = Discount::where('name', 'Максимально возможная скидка, (%)')
                ->firstOrFail();
            $max_discount = number_format($max_discount -> size, 0);
            $personal_discount = $orders_count * floatval($order_discount->size);

            if($orders_count % 2 === 0) {
                $personal_discount = number_format($personal_discount, 0);
            }
            else $personal_discount = number_format($personal_discount, 1);

            if ($personal_discount >= $max_discount) {
                $personal_discount = $max_discount;
            }

            foreach ($orders as $order) {
                $review = Review::where('order_id', $order->id)
                    ->get();
//                dd(var_dump($review));
                $products = DB::table('order_details')
                    ->join('products', 'order_details.product_id', '=', 'products.id')
                    ->join('designs', 'products.design_id', '=', 'designs.id')
                    ->join('taste_combinations', 'products.taste_combination_id', '=', 'taste_combinations.id')
                    ->join('biscuits', 'taste_combinations.biscuit_id', '=', 'biscuits.id')
                    ->leftJoin('fills', 'taste_combinations.fill_id', '=', 'fills.id')
                    ->where('order_details.order_id', $order->id)
                    ->select('designs.name', 'designs.img', 'order_details.count', 'order_details.quantity', 'biscuits.name as biscuit_name', 'fills.name as fill_name')
                    ->get();
                $order->products = $products;
                $count_review = count($review);
                $order->count_review = $count_review;

//                dd($orders);

            }
            return view('account.index', ["user" => $user, "orders" => $orders, "discount" => $personal_discount]);
        } else
            return view('account.index');

    }

    public function review(Request $request)
    {
        $data = $request->validate(
            [
                "review" => ["required", "string"],
            ]
        );

        $review = Review::create([
            "order_id" => $request->order_id,
            "user_id" => Auth::id(),
            "review" => $data["review"],
        ]);

        return redirect(route("home"));

    }

    public function load_avatar(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->file('file');
            $extension = $data->getClientOriginalExtension();
            $filename = 'user-' . Auth::id() . '.' . $extension;
            $path = storage_path('app/public/users');
            $data->move($path, $filename);

            $update_img = User::where('id', Auth::id())
                ->firstOrFail();
            $update_img->avatar = $filename;
            $update_img->save();

            return response()->json([
                'success' => 'done',
            ]);

        }
    }

    public function update_user_info(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        $user->update(['name' => $request['name'],
            'email' => $request['email'],
            'telephone' => $request['telephone']
        ]);
        return response()->json([
            'success' => 'done',
        ]);


    }
}
