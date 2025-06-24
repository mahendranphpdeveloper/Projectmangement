<?php

namespace App\Http\Controllers;

use App\Models\SeoSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SEOController extends Controller
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        $imagePath = null;

        // Handle file upload if a new image is provided
        if ($request->hasFile('seo_image')) {
            $imagePath = $request->file('seo_image')->store('images', 'public');
            $validated['image'] = $imagePath; // Add the image path to the validated data
        }
    
        $seoSection = SeoSection::updateOrCreate(
            ['parent_id' => $id],  // Match by parent_id
            $validated              
        );
    
        return response()->json(['success' => true, 'message' => 'SEO Section updated or created successfully!', 'seoSection' => $seoSection]);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
