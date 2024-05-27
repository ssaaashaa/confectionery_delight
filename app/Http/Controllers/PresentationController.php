<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\FeedbackRequest;
use Illuminate\Http\Request;

class PresentationController extends Controller
{
    public function index()
    {
        $presentation = Event::where('event_type', 'ПРЕЗЕНТАЦИЯ')
            ->firstOrFail();
        return view('presentation.index', [
                "presentation" => $presentation
            ]
        );
    }


}
