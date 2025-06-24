<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    /**
     * Display a listing of the menu.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = Service::orderBy('created_at', 'desc')->get();
        $menuCount = Service::count()+1;
        return view('back-end.service', compact('menu','menuCount'));
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
        $menuCount = Service::count();
        $existingSortOrders = Service::pluck('sortOrder')->toArray();
    
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
    
        // Create menu data
        $data = [
            'service' => $request->menuName,
            'sortOrder' => $request->sortOrder,
        ];
    
        // Save to database
        Service::create($data);
    
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

    
    public function update(Request $request, Service $service) // Change $menu to $service for clarity
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'menuName' => 'required|string|max:255',
                'sortOrder' => 'required|integer',
            ]);
    
            // Get the count of Service records
            $menuCount = Service::count();
    
            // Check if the requested sortOrder is within valid range
            if ($menuCount < $validatedData['sortOrder']) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'The Sort Order must be less than or equal to the current number of menus.',
                ], 400);
            }
    
            DB::beginTransaction(); // Start transaction for atomic updates
    
            // Check if there's another Service with the same sortOrder
            $existingService = Service::where('sortOrder', $validatedData['sortOrder'])->first();
    
            if ($existingService && $existingService->id !== $service->id) {
                // If sortOrder is already taken by another Service, swap their sortOrders
                $existingService->sortOrder = $service->sortOrder; // Swap sortOrder
                $existingService->save();
            }
    
            // Update the current Service
            $service->service = $validatedData['menuName']; // Ensure this matches your database column
            $service->sortOrder = $validatedData['sortOrder'];
            $service->save();
    
            DB::commit(); // Commit the transaction
    
            return response()->json([
                'status' => 'success',
                'message' => 'Menu updated successfully.',
            ]);
        } catch (ValidationException $e) {
            // Handle validation exceptions specifically
            return response()->json([
                'status' => 'error',
                'message' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction in case of error
            Log::error('Error updating service: ' . $e->getMessage(), ['exception' => $e]);
    
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
    public function destroy(Service $service)
    {
        DB::beginTransaction();
        try {
            $service->delete();
            DB::commit();
    
            return response()->json([
                'status' => 'success',
                'message' => 'Service deleted successfully.',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error("Error deleting service: " . $e->getMessage());
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred. Please try again.',
                'error' => $e->getMessage()
            ], 500);
        }
    }
    
}
