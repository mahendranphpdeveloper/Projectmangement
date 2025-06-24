<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Contact;
use App\Models\FollowUp;

class ClinetFollowUp extends Controller
{
        public function client($id) {
            $client = Contact::where('id',$id)->first();
            $followup = FollowUp::where('client_id',$id)->get();
            return view('back-end.followup',compact('client','followup'));
        }
        public function filterInquiries(Request $req)
        {
            $validated = $req->validate([
                'startDate' => 'required|date',
                'endDate' => 'required|date',
            ]);
        
            $start = \Carbon\Carbon::parse($validated['startDate'])->startOfDay(); // Start of the day for startDate
            $end = \Carbon\Carbon::parse($validated['endDate'])->endOfDay(); // End of the day for endDate
        
            if ($start->isSameDay($end)) {
                $contacts = FollowUp::whereDate('follow_ups.scheduled_date', $start)
                ->join('contacts', 'follow_ups.client_id', '=', 'contacts.id')
                ->select('contacts.*', 'follow_ups.scheduled_date')
                ->get();
                
            } else {
                $contacts = FollowUp::whereBetween('follow_ups.scheduled_date', [$start, $end])
                    ->join('contacts', 'follow_ups.client_id', '=', 'contacts.id')
                    ->select('contacts.*', 'follow_ups.scheduled_date')
                    ->get();
            }
            return response()->json($contacts);
        }
        
    public function clientStatus(Request $req)
    {
        // Validate the incoming request
        $req->validate([
            'client_id' => 'required|exists:contacts,id',
            'status' => 'required|string|in:following,rejected,pending,completed',
        ]);

        // Find the contact by ID and update the status
        $contact = Contact::find($req->client_id);

        if ($contact) {
            $contact->status = $req->status;
            $contact->save();

            return response()->json(['success' => true, 'message' => 'Client status updated successfully.']);
        }

        // If the client is not found, return an error response
        return response()->json(['success' => false, 'message' => 'Client not found.'], 404);
    }
    public function sentProposel(Request $req){
       $contact = Contact::find($req->id);
       if ($contact) {
        $contact->proposal_status = 'success';
        $contact->save();

        return response()->json(['success' => true, 'message' => 'Client status updated successfully.']);
    }
    return response()->json(['success' => false, 'message' => 'Client not found.'], 404);
    }
    public function update(Request $request, $id)
{
    // Log request data
    Log::info("Update  Contact request received");
    Log::info($request->all());
    
    // Validate the incoming request data
    $validatedData = $request->validate([
        'name' => 'nullable|string',
        'last_name' => 'nullable|string', // Validate each item in the array
        'company_name' => 'nullable|string',
        'phone_number' => 'nullable|string',
        'email' => 'nullable|email',
        'location' => 'nullable|string',
        'category' => 'nullable|string',
        'service' => 'nullable|string',
        'content' => 'nullable|string',
    ]);
    $client = Contact::findOrFail($id);
    $client->update($validatedData);

    // Return a JSON response indicating success
    return response()->json(['success' => 'Client updated successfully!']);
}

public function destroy($id)
{
    try {
        // Find and delete the client record by ID
        $client = Contact::findOrFail($id);
        $client->delete();
        
        // Return a JSON response indicating success
        return response()->json(['success' => 'Client deleted successfully!']);
    } catch (\Exception $e) {
        // Log the error and return a JSON response indicating failure
        Log::error('Delete error: ' . $e->getMessage());
        return response()->json(['error' => 'Failed to delete client.'], 500);
    }
}
}
