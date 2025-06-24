<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\sections;

class MakePageController extends Controller
{
     public function index(){
         $menus = Menu::orderBy('created_at', 'desc')->where('menuType','MENU')->get();
         $sections = sections::orderBy('created_at', 'desc')->get();
         return view('back-end.pagelayout', compact('menus','sections'));
        }

        public function subMenu($id){
            $submenus = Menu::where('menuID', $id)->get();

            $data = [
                'submenus' => $submenus->map(function ($submenu) {
                    return [
                        'id' => $submenu->id,
                        'name' => $submenu->menu,
                    ];
                })
            ];
    
            return response()->json($data);
        }
        public function savePage(Request $req){
            $data = [] ;
            $selectedArray = explode(',', $req->selected[0]);
            foreach($selectedArray as $selected){
                if($selected == 1){
                    $data['hero'] = $req->hero;
                }
                if($selected == 2){
                    $data['about'] = $req->about;
                }
                if($selected == 3){
                    $data['service'] = $req->service;
                }
                if($selected == 4){
                    $data['gallery'] = $req->gallery;
                }
                if($selected == 5){
                    $data['testimonial'] = $req->testimonial;
                }
                if($selected == 6){
                    $data['blog'] = $req->blog;
                }
                if($selected == 7){
                    $data['contact'] = $req->contact;
                }
            }
            // dd($data);
            $urlMenu = $req->pageMenu;  
            $urlSubMenu = $req->pageSubMenu;
            return view('back-end.pagevalue',compact('data','urlMenu', 'urlSubMenu'));
        }
}
