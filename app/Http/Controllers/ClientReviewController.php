<?php

namespace App\Http\Controllers;

use App\Models\ClientReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ClientReviewController extends Controller
{
    public function index($parent_id)
    {
        // Log::notice("cll");
        // Log::notice(
        //     $parent_id
        // );
        $reviews = ClientReview::where('parent_id',$parent_id)->get();
        return response()->json($reviews);
    }
    public function store(Request $request)
    {
        // Log::notice($request->all());
    
        $validated = $request->validate([
            'parent_id' => 'required',
            'client_role' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'review_content' => 'required|string',
            'stars_count' => 'required|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Initialize image path as null
        $imagePath = null;
        
        // Check if client_image is provided and store it
        if ($request->hasFile('client_image')) {
            $imagePath = $request->file('client_image')->store('client_images', 'public');
            
            // Add the image path to the validated data array
            $validated['client_image'] = $imagePath;
        }
    
        // Get the parent_id from the request
        $parentId = $request->parent_id;
    
        $review = ClientReview::Create(
            $validated                    // Use validated data for update or creation
        );
    
        return response()->json(['success' => 'Review added successfully!', 'review' => $review]);
    }
    

    public function show($id)
    {
        $review = ClientReview::findOrFail($id);
        return response()->json($review);
    }

    public function update(Request $request, $id)
    {
        $review = ClientReview::findOrFail($id);

        $request->validate([
            // 'client_name' => 'required|string|max:255',
            'client_role' => 'required|string|max:255',
            'company_name' => 'required|string|max:255',
            'review_content' => 'required|string',
            'stars_count' => 'required|integer|min:1|max:5',
            'client_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        $imagePath = $review->client_image;
        if ($request->hasFile('client_image')) {
            // Optionally delete old image
            if ($imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('client_image')->store('client_images', 'public');
        }

        $review->update(array_merge($request->all(), ['client_image' => $imagePath]));

        return response()->json(['success' => 'Review updated successfully!', 'review' => $review]);
    }

    public function destroy($id)
    {
        $review = ClientReview::findOrFail($id);
        // Optionally delete image
        if ($review->client_image) {
            Storage::disk('public')->delete($review->client_image);
        }
        $review->delete();

        return response()->json(['success' => 'Review deleted successfully!']);
    }
}