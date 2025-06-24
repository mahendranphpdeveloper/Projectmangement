<?php

namespace App\Http\Controllers;

use App\Models\ClientReview;
use App\Models\GetTouchUs;
use App\Models\HomeSections;
use App\Models\Logo;
use App\Models\Page as ModelsPage;
use App\Models\PaymentTerms;
use App\Models\RecentProject;
use App\Models\RecentProjectContent;
use App\Models\SeoSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Page extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = ModelsPage::all();
        return view('cms.page',compact('pages'));
    }

    public function edit($id)
    {
        $page = ModelsPage::findOrFail($id);
        $pages = ModelsPage::all(); // For showing the list in edit view
        return view('cms.page', compact('pages', 'page'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
    
        $slug = Str::slug($validated['name']);
    
        $originalSlug = $slug;
        $counter = 1;
        while (ModelsPage::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter++;
        }
    
        $validated = array_merge($validated, ['slug' => $slug]);
    
        $page = ModelsPage::create($validated); 
        $newPageId = $page->id;
        $sections = [
            'Logo Section',
            'Year Of Experience',
            'Recent Projects',
            'Google Reviews',
            'SEO Package',
            'Price & Package',
            'Payment Terms'
        ];
    
        $currentMaxSortOrder = HomeSections::count()?? 1;
    
        foreach ($sections as $index => $sec) {
            HomeSections::create([
                'page_id' => $newPageId,
                'title' => $sec,
                'sort_order' => $currentMaxSortOrder + $index + 1,  
            ]);
        }
    
        return redirect()->route('pages.index')->with('success', 'Page created successfully!');
    }
    
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'status' => 'required',
        ]);
    
        $page = ModelsPage::findOrFail($id);
    
        $slug = Str::slug($validated['name']);
    
        if ($slug != $page->slug) {
            $originalSlug = $slug;
            $counter = 1;
            while (ModelsPage::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $counter++;
            }
        }
    
        $validated = array_merge($validated, ['slug' => $slug]);
    
        $page->update($validated);
    
        return redirect()->route('pages.index')->with('success', 'Page updated successfully!');
    }
    

    public function destroy($id)
    {
        $page = ModelsPage::findOrFail($id);
        $page->delete();
        HomeSections::where('page_id',$id)->delete();
        Logo::where('parent_id',$id)->delete();
        GetTouchUs::where('parent_id',$id)->delete();
        RecentProject::where('parent_id',$id)->delete();
        ClientReview::where('parent_id',$id)->delete();
        SeoSection::where('parent_id',$id)->delete();
        PaymentTerms::where('parent_id',$id)->delete();
        RecentProjectContent::where('parent_id',$id)->delete();
        DB::table('price_package')->where('parent_id',$id)->delete();
        return redirect()->route('pages.index')->with('success', 'Page deleted successfully!');
    }
}
