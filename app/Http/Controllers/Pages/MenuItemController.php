<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    //categoryie tıkalndığı zaman menu itemleri gelecek
    public function MenuItemPage($id){
        $category_properties = Category::where("id",$id)->first();
        $get_category_item = MenuItem::where("category_id",$id)->get();
        $all_categories = Category::all();
        $data = [
            'MenuItem'=>$get_category_item,
            'Category'=>$category_properties,
            'Category_All'=>$all_categories,
        ];
        return view("pages.menuItem")->with($data);
    }
}
