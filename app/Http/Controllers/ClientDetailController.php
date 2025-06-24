<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Segment;
use Illuminate\Support\Facades\Log;

class ClientDetailController extends Controller
{
    public function index(){
        $segments = Segment::all();
        return view('front-end.clientEnquiry',compact('segments'));
}
public function store(Request $request)
{
    // Validate the request data
    $validatedData = $request->validate([
        'segment' => 'nullable|array',
        'segment.*' => 'string', // Validate each item in the array
        'company_name' => 'nullable|string',
        'phone_number' => 'nullable|string', 
        'email' => 'nullable|email',
        'location' => 'nullable|string',
        'url' => 'nullable|string',
        'contact_person' => 'nullable|string',
        'zipcode' => 'nullable|string',
        'country' => 'nullable|string',
    ]);
    $validatedData['segment'] = implode(',', $validatedData['segment']);
    Clients::create($validatedData);
    return redirect()->back()->with('success', 'Your message has been sent successfully!');
}

public function update(Request $request, $id)
{
    // Log request data
    Log::info("Update request received");
    Log::info($request->all());
    
    // Validate the incoming request data
    $validatedData = $request->validate([
        'segment' => 'nullable|array',
        'segment' => 'nullable|string', // Validate each item in the array
        'company_name' => 'nullable|string',
        'phone_number' => 'nullable|string',
        'email' => 'nullable|email',
        'location' => 'nullable|string',
        'url' => 'nullable|string',
        'contact_person' => 'nullable|string',
        'zipcode' => 'nullable|string',
        'country' => 'nullable|string',
    ]);

    // Find the client record by ID and update it
    $client = Clients::findOrFail($id);
    $client->update($validatedData);

    // Return a JSON response indicating success
    return response()->json(['success' => 'Client updated successfully!']);
}

public function filterClients(Request $request)
{
    $segments = $request->input('segments');

    if (!empty($segments)) {
        // Use LIKE query to match segments
        $clients = Clients::where(function($query) use ($segments) {
            foreach ($segments as $segment) {
                $query->orWhere('segment', 'LIKE', "%{$segment}%");
            }
        })->get();
    } else {
        $clients = Clients::all();
    }

    return response()->json(['clients' => $clients]);
}



public function destroy($id)
{
    try {
        // Find and delete the client record by ID
        $client = Clients::findOrFail($id);
        $client->delete();
        
        // Return a JSON response indicating success
        return response()->json(['success' => 'Client deleted successfully!']);
    } catch (\Exception $e) {
        // Log the error and return a JSON response indicating failure
        Log::error('Delete error: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to delete client.'], 500);
    }
}

public function clientsList(){
    $clients = Clients::get();
    $segments = Segment::all();
    return view('back-end.clientlist',compact('clients', 'segments'));
}
}