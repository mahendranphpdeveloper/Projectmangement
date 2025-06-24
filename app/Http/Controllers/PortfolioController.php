<?php
namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('portfolios.index', compact('portfolios'));
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'type' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // File validation
            'link' => 'required|string',
            'status' => 'required|string',
        ]);

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName; // Save file name in DB
        }
    
        Portfolio::create($data);
    
        return redirect()->back()->with('success', 'Portfolio created successfully!');
    }
    
    public function update(Request $request, Portfolio $portfolio)
    {
        $data = $request->validate([
            'type' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional file validation
            'link' => 'required|string',
            'status' => 'required|string',
        ]);
    
        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($portfolio->image && file_exists(public_path('images/'.$portfolio->image))) {
                unlink(public_path('images/'.$portfolio->image));
            }
    
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName; // Save new file name in DB
        }
    
        $portfolio->update($data);
    
        return redirect()->back()->with('success', 'Portfolio updated successfully!');
    }
    // public function edit($id)
    // {
    //     $portfolio = Portfolio::findOrFail($id);
    //     return response()->json($portfolio);
    // }
    public function show($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return response()->json($portfolio);
    }
    


    public function destroy(Portfolio $portfolio)
    {
        $portfolio->delete();
        return redirect()->back()->with('success', 'Portfolio deleted successfully!');
    }
}
