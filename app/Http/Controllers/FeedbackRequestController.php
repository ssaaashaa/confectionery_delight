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
                "presentation_name" => ["required", "string"],
                "presentation_telephone" => ["required", "string"],
            ]
        );
        $pattern = '/^\+375\s\((25|29|33|44)\)\s\d{3}-\d{2}-\d{2}$/';
        if(!preg_match($pattern, $data["presentation_telephone"])) {
            return redirect()->back()->withPhone("Допустимый код: 25 | 29 | 33 | 44")->withNosuccess("nosuccess");
        }
        $search = FeedbackRequest::where('name', $data["presentation_name"])
            ->where('request_type', 'ПРЕЗЕНТАЦИЯ')
            ->where('telephone', $data["presentation_telephone"])
            ->get();
        if(count($search) === 0) {
            $user = FeedbackRequest::create([
                "name" => $data["presentation_name"],
                "request_type" => 'ПРЕЗЕНТАЦИЯ',
                "telephone" => $data["presentation_telephone"],
                "admin_comment" => 'Новая заявка.'
            ]);
            return redirect()->back()->withSuccess("success");
        }
        else
            return redirect()->back()->withNosuccess("nosuccess");
    }

    public function tasting(Request $request)
    {
        $data = $request->validate(
            [
                "tasting_name" => ["required", "string"],
                "tasting_telephone" => ["required", "string"],
            ]
        );

        $pattern = '/^\+375\s\((25|29|33|44)\)\s\d{3}-\d{2}-\d{2}$/';

        if(!preg_match($pattern, $data["tasting_telephone"])) {
            return redirect()->back()->withPhone("Допустимый код: 25 | 29 | 33 | 44")->withNosuccess("nosuccess");
        }

        $search = FeedbackRequest::where('name', $data["tasting_name"])
            ->where('request_type', 'ДЕГУСТАЦИЯ')
            ->where('telephone', $data["tasting_telephone"])
            ->get();

        if(count($search) === 0) {

            $user = FeedbackRequest::create([
                "name" => $data["tasting_name"],
                "request_type" => 'ДЕГУСТАЦИЯ',
                "telephone" => $data["tasting_telephone"],
                "admin_comment" => 'Новая заявка.'
            ]);

            return redirect()->back()->withSuccess("success");
        }
        return redirect()->back()->withNosuccess("nosuccess");
    }

}
