<?php

namespace App\Http\Controllers;


use App\Mail\ForgotPassword;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


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
                "login_email" => ["required", "email", "string"],
                "login_password" => ["required"]
            ]
        );

        $data = [
            'email' => $request->login_email,
            'password' => $request->login_password,
        ];

        $user = User::where('email', $data['email'])
            ->get();
        if(count($user)===0) {
            return redirect($request->headers->get('referer', '/'))->withErrors(['login_email' => 'Неправильная почта']);
        }
        else {
            if (auth("web")->attempt($data)) {
                return redirect(route("home"));
            } else
                return redirect($request->headers->get('referer', '/'))->withErrors(['login_password' => 'Неправильный пароль']);
        }
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
                "forgot_email" => ["required", "email", "string"],
            ]
        );

        $user = User::where(["email" => $data["forgot_email"]])->first();

        if(!$user) {
            return redirect($request->headers->get('referer', '/'))->withErrors(["forgot"=>'Пользователь с таким e-mail не найден']);
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
                "password_confirmation" => ["required", "confirmed"]
            ],
            [
                "telephone.unique" => "Пользователь с таким номером телефона уже существует",
                "email.unique" => "Пользователь с таким e-mail уже существует",
                "password_confirmation.confirmed" => "Пароли не совпадают"
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
