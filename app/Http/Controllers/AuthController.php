<?php

namespace App\Http\Controllers;


use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $data = $request->validate(
            [
                "email" => ["required", "email", "string"],
                "password" => ["required"]
            ]
        );

        if (auth("web")->attempt($data)) {

            //$carts=request()->session()->get('carts');
            $cart = request()->session()->get('cart');
            //dd(request()->session());
            $id = Auth::user()->id;
            $carts = [$id => $cart];
            request()->session()->put('carts', $carts);

           // request()->session()->forget('cart');
          //  dd(request()->session());
//            dd($carts);
            return redirect(route("home"));
        }
       // return redirect(route("login"))->withErrors(["email"=>'Проверьте введенные данные']);
    }

    public function logout()
    {
        auth("web")->logout();
     //   \Session::getHandler()->destroy(session()->getId());
        request()->session()->forget('cart');
        return redirect(route("home"));
    }

    public function showRegisterForm()
    {
        return view("auth.register");
    }

    public function showForgotForm()
    {
        return view("auth.forgot");
    }

    public function forgot(Request $request)
    {
        $data = $request->validate(
            [
                "email" => ["required", "email", "string", "exists:users"],
            ]
        );

        $user = User::where(["email" => $data["email"]])->first();

        $password = uniqid();
        $user->password = bcrypt($password);
        $user->save();

        Mail::to($user)->send(new ForgotPassword($password));

        return redirect(route("home"));

    }

    public function register(Request $request)
    {
        $data = $request->validate(
            [
                "name" => ["required", "string"],
                "email" => ["required", "email", "string", "unique:users,email"],
                "telephone" => ["required", "string"],
                "password" => ["required", "confirmed"]
            ]
        );

        $user = User::create([
            "name" => $data["name"],
            "email" => $data["email"],
            "telephone" => $data["telephone"],
            "password" => bcrypt($data["password"]),
            "avatar" => 'avatar.png'
        ]);

        if ($user) {
            auth("web")->login($user);
        }

        return redirect(route("home"));
    }
}
