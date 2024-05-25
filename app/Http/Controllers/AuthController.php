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
            return redirect(route("home"));
        } else
        return redirect($request->headers->get('referer', '/'))->withErrors(["login"=>'Неверно введенные данные']);
    }

    public function logout()
    {
        auth("web")->logout();
        request()->session()->forget('cart');
        return redirect(route("home"));
    }

//    public function showRegisterForm()
//    {
//        return view("auth.register");
//    }

    public function showForgotForm()
    {
        return view("auth.forgot");
    }

    public function forgot(Request $request)
    {
        $data = $request->validate(
            [
                "email" => ["required", "email", "string"],
            ]
        );

        $user = User::where(["email" => $data["email"]])->first();

        if(!$user) {
            return redirect($request->headers->get('referer', '/'))->withErrors(["forgot"=>'Неверно введенная почта']);
        } else {
            $password = uniqid();
            $user->password = bcrypt($password);
            $user->save();

            Mail::to($user)->send(new ForgotPassword($password));
            return redirect($request->headers->get('referer', '/'));
        }
    }

    public function register(Request $request)
    {
        $data = $request->validate(
            [
                "name" => ["required", "string"],
                "email" => ["required", "email", "string", "unique:users,email"],
                "telephone" => ["required", "string", "unique:users,telephone"],
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

        return redirect($request->headers->get('referer', '/'));
    }
}
