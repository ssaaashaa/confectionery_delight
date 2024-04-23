<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index()
    {

        $reviews = DB::table('reviews')
            ->orderBy('created_at', 'desc')
            ->join('users', 'users.id', '=', 'reviews.user_id')
            ->select('reviews.review as review', 'reviews.created_at as created_at', 'users.name as name')
            ->get();

        //dd(session()->getId());
        return view('welcome', ['reviews' => $reviews]);

    }
}
