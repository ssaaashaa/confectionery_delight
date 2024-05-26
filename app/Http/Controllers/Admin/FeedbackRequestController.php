<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRecord;
use App\Models\FeedbackRequest;
use Illuminate\Http\Request;

class FeedbackRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $taste_requests = FeedbackRequest::where('request_type', 'ДЕГУСТАЦИЯ')
        ->get();
        $presentation_requests = FeedbackRequest::where('request_type', 'ПРЕЗЕНТАЦИЯ')
            ->get();
        $presentation = Event::where('event_type', 'ПРЕЗЕНТАЦИЯ')
            ->firstOrFail();
        $presentation_records = EventRecord::where('event_id', $presentation->id)
            ->get();
        $count = $presentation->event_count-count($presentation_records);
        return view("admin.feedback-requests.index", [
            "taste_requests" => $taste_requests,
            "presentation_requests" => $presentation_requests,
            "count" => $count
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $request = FeedbackRequest::where("id", $id)
            ->firstOrFail();

//        return redirect(route("admin.presentation.index", ["request"=>$request]));
        $presentation = Event::where('event_type', 'ПРЕЗЕНТАЦИЯ')
            ->firstOrFail();
        $presentation_records = EventRecord::where('event_id', $presentation->id)
            ->get();

        return view("admin.presentation.index", [
            "presentation" => $presentation,
            "presentation_records" => $presentation_records,
            "request" => $request
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $feedbackRequest = FeedbackRequest::findOrFail($id);
        return view("admin.feedback-requests.edit", [
            "feedbackRequest" =>$feedbackRequest,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $feedbackRequest = FeedbackRequest::findOrFail($id);
        $feedbackRequest->update(['admin_comment' => $request['admin_comment']]);
        return redirect(route("admin.feedback-requests.index"))->withSuccess('Информация успешно изменена');;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FeedbackRequest::destroy($id);
        return redirect(route("admin.feedback-requests.index"));

    }
}
