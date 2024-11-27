<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Slider;
use App\Models\TheMostToPrefer;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function IndexPages()
    {
        //anasayfa index i çağır
        //Kategorileri Çağır...
        $Slider = Slider::orderBy("must","asc")->get();
        $kategoriler = Category::all();
        $GetTheMostToPreferMenus = TheMostToPrefer::with('MenuleriGetir')->select("menu_id")->distinct()->get();
        $data = [
            'Category'=>$kategoriler,
            'Slider'=>$Slider,
            'TheMost'=>$GetTheMostToPreferMenus,
        ];
        return view("pages.index")->with($data);
    }
}
