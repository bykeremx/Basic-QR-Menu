<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use App\Models\TheMostToPrefer;
use Illuminate\Http\Request;

class TheMostToPreferController extends Controller
{
    public function TheMostToPreferIndex()
    {

        $menuler = MenuItem::all();
        $GetTheMostToPreferMenus = TheMostToPrefer::with('MenuleriGetir')->select("menu_id")->distinct()->get();
        $data = [
            'MenuItems' => $menuler,
            'ThePreferMenu' => $GetTheMostToPreferMenus,
        ];
        return view("admin.pages.MostThePrefer")->with($data);
    }

    //toplu ya da tek gelen uurun listesi
    public function TheMostToPreferIndexPost(Request $request)
    {
        $add_items_array = $request->menu_id;
        if (!empty($add_items_array)) {
            $create_array = [];
            foreach ($add_items_array as $key) {
                $create_array[] = ['menu_id' => $key];
            }
            $yukle = TheMostToPrefer::insert($create_array);
            if ($yukle) {
                return redirect()->route("TheMostToPrefer")->with("success", "Başarı Bir Şekilde Listeye Eklendi");
            } else {
                return redirect()->route("TheMostToPrefer")->with("error", "Yüklenirken Bir Hata Oluştu");
            }
        } else {
            return redirect()->route("TheMostToPrefer")->with("error", "Listeye Boş Urun Yüklenemez");
        }
    }
    //delete

    public function DeleteMostPrefer($id)
    {
        $FindMost = TheMostToPrefer::where("menu_id", $id)->delete();
        if ($FindMost) {
            return redirect()->route("TheMostToPrefer")->with("success", "Başarı Bir Şekilde Silindi");
        } else {
            return redirect()->route("TheMostToPrefer")->with("error", "Silinirken Bir Hata Oluştu");
        }
    }
}
