<?php

namespace App\Http\Controllers;

use App\Models\ClientLogos;
use App\Models\ClientReview;
use App\Models\GetTouchUs;
use App\Models\HomeSections;
use App\Models\Logo;
use Illuminate\Http\Request;
use App\Models\Page as ModelsPage;
use App\Models\PaymentTerms;
use App\Models\RecentProject;
use App\Models\RecentProjectContent;
use App\Models\SeoSection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PageControl extends Controller
{
    public function index($slug)
    {
            $page = ModelsPage::where('slug', $slug)->first();
            if (!$page) {
                return redirect()->back()->with('error', 'Page not found.');
                }
            $sections = HomeSections::where('page_id', $page->id)->orderBy('sort_order', 'asc')->get();
            return view('cms.homesections', compact('sections','page'));
    }

    public function duplicate(Request $req)
    {
        $validated = $req->validate([
            'name' => 'required',
            'currentId' => 'required',
            'status' => 'required',
        ]);
    
        DB::beginTransaction(); 
        try {
            $slug = Str::slug($validated['name']);
            $duplicateId = (int) $validated['currentId'];
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
                'Payment Terms',
            ];
            $currentMaxSortOrder = HomeSections::count() ?? 1;
            foreach ($sections as $index => $sec) {
                HomeSections::create([
                    'page_id' => $newPageId,
                    'title' => $sec,
                    'sort_order' => $currentMaxSortOrder + $index + 1,
                ]);
            }
    
            $logos = ClientLogos::where('parent_id', $duplicateId)->get();
            $newLogos = [];
            if ($logos->isNotEmpty()) {
                foreach ($logos as $log) {
                    $newLogos[] = [
                        'image' => $log->image,
                        'parent_id' => $newPageId,
                    ];
                }
                ClientLogos::insert($newLogos);
            }
    
            $logo = Logo::where('parent_id', $duplicateId)->first();
            if ($logo) {
                $newLogo = $logo->replicate(['parent_id']);
                $newLogo->parent_id = $newPageId;
                $newLogo->save();
            }
    
            $record = GetTouchUs::where('parent_id', $duplicateId)->first();
            if ($record) {
                $rec = $record->replicate(['parent_id']);
                $rec->parent_id = $newPageId;
                $rec->save();
            }
    
            $projects = RecentProject::where('parent_id', $duplicateId)->get();
            if ($projects->isNotEmpty()) {
                foreach ($projects as $project) {
                    $rec = $project->replicate(['parent_id']);
                    $rec->parent_id = $newPageId;
                    $rec->save();
                }
            }
    
            $reviews = ClientReview::where('parent_id', $duplicateId)->get();
            if ($reviews->isNotEmpty()) {
                foreach ($reviews as $review) {
                    $rec = $review->replicate(['parent_id']);
                    $rec->parent_id = $newPageId;
                    $rec->save();
                }
            }
    
            $seosec = SeoSection::where('parent_id', $duplicateId)->first();
            if ($seosec) {
                $newSeo = $seosec->replicate(['parent_id']);
                $newSeo->parent_id = $newPageId;
                $newSeo->save();
            }

            $recentProjectContent = RecentProjectContent::where('parent_id', $duplicateId)->first();
            if ($recentProjectContent) {
                $new = $recentProjectContent->replicate(['parent_id']);
                $new->parent_id = $newPageId;
                $new->save();
            }
    
            $prices = DB::table('price_package')->where('parent_id', $duplicateId)->get();
            if ($prices->isNotEmpty()) {
                foreach ($prices as $price) {
                    $priceData = (array) $price;
                    unset($priceData['id']);
                    unset($priceData['parent_id']);
                    $priceData['parent_id'] = $newPageId;
                    DB::table('price_package')->insert($priceData);
                }
            }
    
            $payment = PaymentTerms::where('parent_id', $duplicateId)->first();
            if ($payment) {
                $newPayment = $payment->replicate(['parent_id']);
                $newPayment->parent_id = $newPageId;
                $newPayment->save();
            }
    
            DB::commit(); 
    
            return response()->json(['success' => true, 'message' => 'Page duplicated successfully!']);
        
        } catch (\Exception $e) {
            DB::rollBack(); 
    
            log::error('Error duplicating page: ' . $e->getMessage(), ['exception' => $e]);
    
            return response()->json(['success' => false, 'message' => 'Error duplicating page: ' . $e->getMessage()], 500);
        }
    }
    
}
