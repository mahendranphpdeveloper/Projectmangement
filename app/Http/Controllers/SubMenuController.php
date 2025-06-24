<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Menu;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

class SubMenuController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->query('id');
        $menu = Menu::where('id', $id)->first();
        $menuCount = Menu::where('menuID', $id)->where('menuType', 'SUBMENU')->count() + 1;

        $subMenus = Menu::where('menuID', $id)->where('menuType', 'SUBMENU')->get();

        return view('back-end.sub-menu', compact('menu', 'menuCount', 'subMenus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'menuName' => 'required|string|max:255',
            'sortOrder' => 'required|integer|min:1',
        ]);
            $menuID = $request->input('menuID');
            $menuCount = Menu::where('menuID', $menuID)->count();
            $existingSortOrders = Menu::where('menuID', $menuID)->pluck('sortOrder')->toArray();
    
        $request->validate([
            'sortOrder' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) use ($menuCount, $existingSortOrders) {
                    if ($value > $menuCount + 1) {
                        $fail('The Sort Order must be less than or equal to the current number of menu items plus one.');
                    }
                    if (in_array($value, $existingSortOrders)) {
                        $fail('The Sort Order must be unique.');
                    }
                },
            ],
        ]);
    
        $slug = Str::slug($request->menuName);
        if (Menu::where('menuSlug', $slug)->exists()) {
            return redirect()->back()
                ->withErrors(['menuName' => 'The Menu name is already picked. Please choose a different menu name.'])
                ->withInput();
        }
    
        $menu = new Menu();
        $menu->menuID = $menuID; 
        $menu->menuType = 'SUBMENU';
        $menu->menu = $request->input('menuName');
        $menu->menuSlug = $slug;
        $menu->sortOrder = $request->input('sortOrder');
        $menu->save();
            return redirect()->back()
            ->with('success', 'Sub Menu created successfully.');
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'menuName' => 'required|string|max:255',
            'sortOrder' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) use ($id) {
                    $menu = Menu::find($id);
                    if (!$menu) {
                        return $fail('Menu item not found.');
                    }
    
                    $menuID = $menu->menuID;
                    $menuCount = Menu::where('menuID', $menuID)->count();
                    $existingSortOrders = Menu::where('menuID', $menuID)->where('id', '!=', $id)->pluck('sortOrder')->toArray();
                                        if ($value > $menuCount) {
                        $fail('The Sort Order must be less than or equal to the current number of menu items.');
                    }
                    
                    if (in_array($value, $existingSortOrders)) {
                        $fail('The Sort Order must be unique.');
                    }
                },
            ],
        ]);
    
        $menu = Menu::find($id);
        if (!$menu) {
            return response()->json(['message' => 'Sub menu not found.'], 404);
        }
            $slug = Str::slug($request->input('menuName'));
        if (Menu::where('menuSlug', $slug)->where('id', '!=', $id)->exists()) {
            return response()->json(['message' => 'The Menu name is already picked. Please choose a different menu name.'], 422);
        }
    
        $menu->menu = $request->input('menuName');
        $menu->menuSlug = $slug; 
        $menu->sortOrder = $request->input('sortOrder');
        $menu->save();
            return response()->json(['message' => 'Sub menu updated successfully.']);
    }
    
    

    public function destroy($id)
    {
        $menu = Menu::find($id);
        if (!$menu) {
            return Response::json(['message' => 'Sub menu not found.'], 404);
        }

        $menu->delete();    

        return Response::json(['message' => 'Sub menu deleted successfully.']);
    }
}
