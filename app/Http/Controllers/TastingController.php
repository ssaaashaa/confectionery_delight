<?php

namespace App\Http\Controllers;

use App\Models\FeedbackRequest;
use Illuminate\Http\Request;

class TastingController extends Controller
{
    public function index()
    {
        return view('tasting.index');
    }


}
