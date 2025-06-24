<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
    /**
     * Display a listing of the menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Menu::orderBy('created_at', 'desc')->where('menuType','MENU')->get();
        $menuCount = Menu::count()+1;
        return view('back-end.menu', compact('menu','menuCount'));
    }

    /**
     * Show the form for creating a new menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('menu.create');
    }

    /**
     * Store a newly created menu in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Basic validation
        $request->validate([
            'menuName' => 'required|string|max:255',
            'sortOrder' => 'required|integer|min:1',
        ]);
    
        // Get menu count and existing sort orders
        $menuCount = Menu::count();
        $existingSortOrders = Menu::pluck('sortOrder')->toArray();
    
        // Advanced validation with custom rules
        $request->validate([
            'sortOrder' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) use ($menuCount, $existingSortOrders) {
                    // Check if the sort order is within the valid range
                    if ($value > $menuCount + 1) {
                        $fail('The Sort Order must be less than or equal to the current number of menu items plus one.');
                    }
    
                    // Check for duplicate sort order
                    if (in_array($value, $existingSortOrders)) {
                        $fail('The Sort Order must be unique.');
                    }
                },
            ],
        ]);
    
        // Check for unique menu slug
        $slug = Str::slug($request->menuName);
        if (Menu::where('menuSlug', $slug)->exists()) {
            return redirect()->back()
                ->withErrors(['menuName' => 'The Menu name is already picked. Please choose a different menu name.'])
                ->withInput();
        }
    
        // Create menu data
        $data = [
            'menu' => $request->menuName,
            'sortOrder' => $request->sortOrder,
            'menuType' => 'MENU',
            'menuSlug' => $slug,
        ];
    
        // Save to database
        Menu::create($data);
    
        return redirect()->back()
            ->with('success', 'Menu created successfully.');
    }
    

    /**
     * Show the form for editing the specified menu.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menu.edit', compact('menu'));
    }

    /**
     * Update the specified menu in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        try {
            $validatedData = $request->validate([
                'menuName' => 'required|string|max:255',
                'sortOrder' => 'required|integer',
            ]);
            
            $menuCount = Menu::count();
            
            if ($menuCount < $request->sortOrder) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'The Sort Order must be less than or equal to the current number of menus.',
                ], 400);
            }
            
            $slug = Str::slug($request->menuName);
            
            if (Menu::where('menuSlug', $slug)->where('id', '!=', $menu->id)->exists()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'The Menu name is already picked. Please choose a different menu name.',
                ], 400);
            }
            
            $existingMenu = Menu::where('sortOrder', $validatedData['sortOrder'])->first();
    
            if ($existingMenu && $existingMenu->id !== $menu->id) {
                $existingMenu->sortOrder = $menu->sortOrder;
                $existingMenu->save();
            }
    
            $menu->menu = $validatedData['menuName'];
            $menu->menuSlug = $slug;
            $menu->sortOrder = $validatedData['sortOrder'];
            $menu->save(); 
    
            return response()->json([
                'status' => 'success',
                'message' => 'Menu updated successfully.',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {  
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred. Please try again.',
            ], 500);
        }
    }
    

    /**
     * Remove the specified menu from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        DB::beginTransaction(); // Start the transaction
    
        try {
            // Delete submenus related to this menu
            Menu::where('menuID', $menu->id)->delete();
    
            // Delete the menu itself
            $menu->delete();
    
            DB::commit(); // Commit the transaction
    
            return response()->json([
                'status' => 'success',
                'message' => 'Menu deleted successfully.',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction on error
    
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred. Please try again.',
                'error' => $e->getMessage() // Optional: Include error details
            ], 500);
        }
    }
    
}
