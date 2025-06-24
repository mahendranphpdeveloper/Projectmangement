<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Segment;

class SegmentController extends Controller
{
    public function index()
    {
        $segments = Segment::all();
    
        return view('segments.index', compact('segments'));
    }

    public function show(Segment $segment)
    {
        return response()->json($segment);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $segment = Segment::create($request->all());
        return response()->json($segment);
    }

    public function update(Request $request, Segment $segment)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $segment->update($request->all());
        return response()->json($segment);
    }

    public function destroy(Segment $segment)
    {
        $segment->delete();
        return response()->json(['success' => true]);
    }
}
