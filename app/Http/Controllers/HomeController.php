<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Contact;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contact = Contact::get();
        return view('back-end.home.layout', compact('contact'));
    }
    public function followingClients(){
        $contact = Contact::where('status','following')->get();
        return view('back-end.home.following', compact('contact'));
    }
    public function completedClients(){
        $contact = Contact::where('status','completed')->get();
        return view('back-end.home.completed', compact('contact'));
    }
    public function rejectedClients(){
        $contact = Contact::where('status','rejected')->get();
        return view('back-end.home.rejected', compact('contact'));
    }
    public function pendingClients(){
        $contact = Contact::where('status','pending')->get();
        return view('back-end.home.pending', compact('contact'));
    }

public function inputContent(Request $req){
    $layout = $req->selected_layout;
    return view('back-end.home.content');
}
    /**
     * Show the form for creating a new resource.
     */
    public function listProposel()
    {
        $contact = Contact::where('proposal_status','success')->get();
        return view('back-end.proposal', compact('contact'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function proposalUpadate(Request $req)
    {
        $contact = Contact::find($req->client_id);
        if ($contact) {
         $contact->proposal_status = 'completed';
         $contact->save();
         return response()->json(['success' => true, 'message' => 'Client status updated successfully.']);
        }
        return response()->json(['success' => false, 'message' => 'Client not found.'], 404);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
