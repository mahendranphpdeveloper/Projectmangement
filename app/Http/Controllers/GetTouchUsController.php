<?php

namespace App\Http\Controllers;

use App\Models\GetTouchUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GetTouchUsController extends Controller
{
    // Fetch all records (not necessary for just updating, but keeping for context)
    public function index($parent_id)
    {
        $records = GetTouchUs::where('parent_id',$parent_id)->get();
        return response()->json($records);
    }

    // Fetch a single record for editing
    public function show($id)
    {
        $record = GetTouchUs::findOrFail($id);
        return response()->json($record);
    }

    // Update an existing record
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'parent_id' => 'required',
            'title1' => 'required|string',
            'title2' => 'required|string',
            'title3' => 'required|string',
            'years' => 'required|string',
            'clients' => 'required|string',
            'projects' => 'required|string',
            'reviews' => 'required|string',
        ]);
        // Log::info("aahhhh");
        // Log::info( $validatedData );
        $record = GetTouchUs::updateOrCreate(['parent_id' => $id], 
            $validatedData 
        );
    
        return response()->json(['success' => 'Record updated successfully!', 'record' => $record]);
    }
    

    // Delete a record
    public function destroy($id)
    {
        $record = GetTouchUs::findOrFail($id);
        $record->delete();

        return response()->json(['success' => 'Record deleted successfully!']);
    }
}
