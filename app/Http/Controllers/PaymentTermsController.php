<?php

namespace App\Http\Controllers;

use App\Models\PaymentTerm; // Make sure to import your model
use App\Models\PaymentTerms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentTermsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'content' => 'required|string',
            'parent_id' => 'required',
        ]);

        // $paymentTerm = PaymentTerms::findOrFail($id); 

        // $paymentTerm->content = $validated['content'];
        // $paymentTerm->save(); 
        $record = PaymentTerms::updateOrCreate(['parent_id' => $id], 
            $validated 
        );
        return response()->json(['success' => true, 'message' => 'Payment term updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
