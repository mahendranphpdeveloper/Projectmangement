<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\HeaderFooter;
use App\Models\MenuAndLinks;
use Illuminate\Support\Facades\Log;

class HeaderFooterClass extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     $header = HeaderFooter::find(1);   
     $header2 = HeaderFooter::find(2);   
     $menu = MenuAndLinks::get();   
        return view('cms.header-footer', compact('header','header2','menu'));
    }

    public function uploadLogo(Request $request)
    {
        if ($request->hasFile('logo')) {
            $request->validate(['logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
            
            $path = $request->file('logo')->store('logos', 'public'); 
            $logoUrl = Storage::url($path);
            $arr =[
                'header_logo' => $path
            ]; 
            $updated = HeaderFooter::where('id', 1)->update($arr);

            if ($updated) {
                return response()->json(['logoPath' => $logoUrl], 200);
            } else {
                return response()->json(['error' => 'Failed to update the database.'], 500);
            }
        }

        return response()->json(['error' => 'No image uploaded'], 400);
    }

    public function updateLink(Request $request)
    {
        $newLink = $request->input('link');
        $arr =[
            'header_link' => $newLink
        ];
        $updated = HeaderFooter::where('id', 1)->update($arr);

        if ($updated) {
            return response()->json(['newLink' => $newLink], 200);
        } else {
            return response()->json(['error' => 'Failed to update the database.'], 500);
        }
    }
    public function updatemenu(Request $request, $id)
    {
            $request->validate([
            'name' => 'required|string|max:255', 
            'link' => 'required'
        ]);
    
        $menuItem = MenuAndLinks::findOrFail($id); 
    
        $menuItem->menu = $request->name;
        $menuItem->link = $request->link;
    
        $menuItem->save();
    
        return response()->json(['success' => true]);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function storemenu(Request $request)
    {
        Log::info($request->all());
    
        $request->validate([
            'name' => 'required|string|max:255',
            'link' => 'required'
        ]);
    
        try {
            $menuItem = MenuAndLinks::create([
                'menu' => $request->name,
                'link' => $request->link,
            ]);
    
            return response()->json(['success' => true, 'id' => $menuItem->id]);
        } catch (\Exception $e) {
            Log::error('Error creating menu item: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Menu creation failed. Please try again.'], 500);
        }
    }
    
    public function footermenu(Request $request){
Log::error($request->all());
    $newname = $request->input('menuName');
    $newLink = $request->input('newText');
    $click = $request->input('click');
    if($click == 'left-click'){
        $arr =[
            $newname => $newLink ,
        ]; 
        $updated = HeaderFooter::where('id', 1)->update($arr);   
    }else{
        $arr =[
            $newname => $newLink ,
        ]; 
        $updated = HeaderFooter::where('id', 2)->update($arr); 
    }
    if ($updated) {
        return response()->json(['newLink' => $newLink], 200);
    } else {
        return response()->json(['error' => 'Failed to update the database.'], 500);
    } 

    }
    public function linkandmenu(Request $request){
        $newname = $request->input('name');
        $newLink = $request->input('link');
        $arr =[
            'request_btn' => $newname,
            'request_btn_link' => $newLink,
        ]; 
        $updated = HeaderFooter::where('id', 1)->update($arr);
        
        if ($updated) {
            return response()->json(['newLink' => $newLink], 200);
        } else {
            return response()->json(['error' => 'Failed to update the database.'], 500);
        }
    }
    public function destroy($id)
{
    $menuItem = MenuAndLinks::find($id);

    if ($menuItem) {
        $menuItem->delete();
        return response()->json(['success' => true]);
    } else {
        return response()->json(['success' => false, 'message' => 'Menu item not found.'], 404);
    }
}

}
