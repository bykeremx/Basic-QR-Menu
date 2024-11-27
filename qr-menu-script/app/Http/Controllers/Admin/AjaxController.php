<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Settings;
use App\Models\Slider;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function AjaxDeleteItem(Request $ajaxRequest)
    {
        return $ajaxRequest->id;
    }
    public function AjaxUpdate(Request $ajaxRequest)
    {
        //gelen ajax isteğinden id yi al
        $category_id = $ajaxRequest->id;
        $category = Category::where("id", $category_id)->get();
        return $category;
    }
    public function AjaxUpdateCategoryItem(Request $ajaxRequest)
    {
        //gelen ajax isteğinden id yi al
        $menu_id = $ajaxRequest->id;
        $menu = MenuItem::where("id", $menu_id)->get();
        return $menu;
    }


    //setttings ajax controller
    public function SettingsUpdateAjax(Request $request)
    {
        $settings_this = Settings::where("id", $request->id)->first();
        return $settings_this;
    }

    //urunler listesinden urun detayı görüntüleme

    public function ItemDetailHomePage(Request $request)
    {
        $urun_detail = MenuItem::where("id", $request->urun_id)->first();
        return $urun_detail;
    }

    //slider update ile verileri getiren ajax
    public function SliderUpdateGetData(Request $request)
    {
        $Slider = Slider::where("id", $request->id)->first();
        return $Slider;
    }
    public function SliderMustUpdate(Request $request)
    {
        $Slider = Slider::where("id", $request->id)->first();
        return $Slider;
    }
}
