<?php

namespace App\Http\Controllers;

use App\Models\ClientLogos;
use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'parent_id' => 'required|integer', 
            'title1' => 'required|string|max:255',
            'title2' => 'required|string|max:255',
            'form_title' => 'required|string|max:255',
        ]); 
    
        $parent_id = $validatedData['parent_id'];    
        $logo = Logo::where('parent_id', $parent_id)->first(); 
    
        if (!$logo) {
            $logo = new Logo();
            $logo->parent_id = $parent_id; 
        }
        $logo->title1 = $validatedData['title1'];
        $logo->title2 = $validatedData['title2'];
        $logo->form_title = $validatedData['form_title'];
        $logo->save();    
        return response()->json(['success' => true]);
    }
    

    public function store(Request $request)
    {

    
        $validated = $request->validate([
            'images' => 'required', 
            'parent_id' => 'required|integer',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);
        $parent_id = $validated['parent_id'];  
        $uploadedImages = [];
    
        $images = $request->file('images');
    
        if ($images) {
            // If it's a single file, wrap it in an array to handle consistently
            if (!is_array($images)) {
                $images = [$images];
            }
    
            foreach ($images as $image) {
                $imageName = time().'_'.$image->getClientOriginalName();
                $image->storeAs('public/logos', $imageName);
    
                ClientLogos::create([
                    'image' => $imageName,
                    'parent_id' => $parent_id,
                ]);
    
                $uploadedImages[] = $imageName;
            }
        }
    
        return response()->json(['success' => true, 'images' => $uploadedImages], 200);
    }
    
    public function destroy($id)
    {
        $logo = ClientLogos::findOrFail($id);
    
        Storage::delete('public/logos/' . $logo->image);
    
        $logo->delete();
    
        return response()->json(['success' => true], 200);
    }
    
}
