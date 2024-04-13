<?php

namespace App\Http\Controllers;

use App\Models\FeedbackRequest;
use Illuminate\Http\Request;

class FeedbackRequestController extends Controller
{
    public function presentation(Request $request)
    {
        $data = $request->validate(
            [
                "name" => ["required", "string"],
                "telephone" => ["required", "string"],
            ]
        );

        $user = FeedbackRequest::create([
            "name" => $data["name"],
            "request_type" => 'ПРЕЗЕНТАЦИЯ',
            "telephone" => $data["telephone"],
            "admin_comment" => 'Новая заявка.'
        ]);

        return redirect(route("presentation.index"));
    }

    public function tasting(Request $request)
    {
        $data = $request->validate(
            [
                "name" => ["required", "string"],
                "telephone" => ["required", "string"],
            ]
        );

        $user = FeedbackRequest::create([
            "name" => $data["name"],
            "request_type" => 'ДЕГУСТАЦИЯ',
            "telephone" => $data["telephone"],
            "admin_comment" => 'Новая заявка.'
        ]);

        return redirect(route("home"));
    }

}
