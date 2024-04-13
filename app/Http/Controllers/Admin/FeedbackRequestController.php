<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedbackRequest;
use Illuminate\Http\Request;

class FeedbackRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $requests = FeedbackRequest::all();
        return view("admin.feedback-requests.index", [
            "requests" => $requests,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        //
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
        return redirect(route("admin.feedback-requests.index"));

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
