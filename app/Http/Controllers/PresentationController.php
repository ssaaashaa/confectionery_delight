<?php

namespace App\Http\Controllers;

use App\Models\FeedbackRequest;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function index()
    {
        return view('presentation.index');
    }


}
