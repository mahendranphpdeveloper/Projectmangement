<?php

namespace App\Http\Controllers;

use App\Models\ClientLogos;
use App\Models\ClientReview;
use App\Models\GetTouchUs;
use App\Models\HomeSections;
use App\Models\Logo;
use App\Models\PaymentTerms;
use App\Models\Portfolio;
use App\Models\Page as ModelsPage;
use App\Models\RecentProject;
use App\Models\RecentProjectContent;
use App\Models\SeoSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function homesections()
    {  
        $sections = HomeSections::orderBy('sort_order', 'asc')->get();
        return view('cms.homesections', compact('sections'));
    }
    public function slug($slug)
    {  
        if($slug == 'admin' || $slug == '/admin' || $slug == '/admin/') {
            return redirect()->route('admin.loginForm');
            // return view('back-end.login');
        }
        $page = ModelsPage::where('slug', $slug)->where('status','active')->first();
        if (!$page) {
            return redirect()->route('cms.home');
        }
        $id = $page->id;
        $sections = HomeSections::where('page_id', $id)->where('status', 0)->orderBy('sort_order', 'asc')->get();
        $price =DB::table('price_package')->where('parent_id',$id)->get();
        $portfolios = Portfolio::where('parent_id',$id)->get();
        $logo = Logo::where('parent_id',$id)->first();
        $paymentTerm = PaymentTerms::where('parent_id',$id)->first();
        $getTouchUs = GetTouchUs::where('parent_id',$id)->first();
        $recentProjectContent = RecentProjectContent::where('parent_id',$id)->first();
        $seo = SeoSection::where('parent_id',$id)->first();
        $clientlogos = ClientLogos::where('parent_id',$id)->get();
        $clientReview = ClientReview::where('parent_id',$id)->get();
        $recentProject = RecentProject::where('parent_id',$id)->get();
        // $ar = compact('page','sections','price','portfolios','logo', 'recentProject', 'getTouchUs','clientlogos','paymentTerm','seo');
        return view('cms.type', compact('page','sections','price','portfolios','logo', 'recentProject', 'clientReview', 'getTouchUs','clientlogos','paymentTerm','seo', 'recentProjectContent'));
        return abort(404);
    }

    public function sortorderupdate(Request $request)
    {
        $request->validate([
            'draggedId' => 'required|exists:home_sections,id', 
            'targetId' => 'required|exists:home_sections,id', 
        ]);
        $draggedSection = HomeSections::find($request->draggedId);
        $targetSection = HomeSections::find($request->targetId);
    
        $tempSortOrder = $draggedSection->sort_order;
        $draggedSection->sort_order = $targetSection->sort_order;
        $targetSection->sort_order = $tempSortOrder;
    
        $draggedSection->save();
        $targetSection->save();
    
        return response()->json(['message' => 'Order updated successfully!']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'page_id' => 'required|integer', // Ensure page_id is an integer
        ]);

        // Create a new section
        $section = HomeSections::create([
            'page_id' => $request->page_id,
            'title' => $request->title,
            'sort_order' => HomeSections::max('sort_order') + 1 // Automatically set sort order
        ]);

        return response()->json(['success' => true, 'section' => $section]);
    }
    public function store2(Request $request)
    {
        $request->validate([
            'future' => 'required|string|max:255',
            'parent_id' => 'required',
            'basic' => 'required|string|max:255',
            'medium' => 'required|string|max:255',
            'enterprice' => 'required|string|max:255',
            'advanced' => 'required|string|max:255',
        ]);

        Log::error($request->all());

        $priceId = DB::table('price_package')->insertGetId($request->only(['parent_id','future', 'basic', 'medium', 'enterprice', 'advanced']));

        $price = DB::table('price_package')->where('id', $priceId)->first();

        return response()->json($price, 201);
    }
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $section = HomeSections::findOrFail($id);
        $section->update($request->only('title'));

        return response()->json(['success' => true]);
    }
    public function update2(Request $request, $id)
    {
        $request->validate([
            'future' => 'sometimes|required|string|max:255',
            'basic' => 'sometimes|required|string|max:255',
            'medium' => 'sometimes|required|string|max:255',
            'enterprice' => 'sometimes|required|string|max:255',
            'advanced' => 'sometimes|required|string|max:255',
        ]);

        Log::error($request->all());

        $priceExists = DB::table('price_package')->where('id', $id)->exists();
        if (!$priceExists) {
            return response()->json(['message' => 'Price entry not found'], 404);
        }

        DB::table('price_package')->where('id', $id)->update($request->only(['future', 'basic', 'medium', 'enterprice', 'advanced']));

        $price = DB::table('price_package')->where('id', $id)->first();

        return response()->json($price);
    }

    public function destroy(string $id)
    {
        $section = HomeSections::findOrFail($id);
        $section->delete();

        return response()->json(['success' => true]);
    }

    public function updateStatus(Request $request)
    {
        // Validate the request
        $request->validate([
            'section_id' => 'required|exists:home_sections,id',
            'status' => 'required|boolean',
        ]);
    
        $section = HomeSections::find($request->section_id);
        $section->status = $request->status;
        $section->save();
    
        return response()->json(['success' => true, 'message' => 'Status updated successfully!']);
    }
    public function sectionchoose($id)
    {
        $page = ModelsPage::where('id', $id)->first();
        if (!$page) {
            return redirect()->back()->with('error', 'Page not found.');
            }
        $section = HomeSections::find($id);
        $price =DB::table('price_package')->where('parent_id',$id)->get();
        $portfolios = Portfolio::where('parent_id',$id)->get();
        $logo = Logo::where('parent_id',$id)->first();
        $paymentTerm = PaymentTerms::where('parent_id',$id)->first();
        $seo = SeoSection::where('parent_id',$id)->first();
        $recentProjectContent = RecentProjectContent::where('parent_id',$id)->first();
        $clientlogos = ClientLogos::where('parent_id',$id)->get();
        return view('cms.section', compact('page','section','price','portfolios','logo','clientlogos','paymentTerm','seo','recentProjectContent'));
    }

}
