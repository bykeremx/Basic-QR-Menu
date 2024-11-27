<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Settings;
use App\Models\TheMostToPrefer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    public function GetCategoryMenuItem($id)
    {

        $list_item_ = MenuItem::where("category_id", $id)->get();
        $category_properties = Category::where("id", $id)->first();
        $data = ['MenuItemList' => $list_item_, "CategoryProperties" => $category_properties];
        //dd($list_item_);
        return view("admin.pages.CategoryMenuitem")->with($data);
    }
    //menu oluşturma id ye göre (kategori'nin sayfasında isten bu controller çalışacak)
    public function CreateCategoryItem(Request $request, $id)
    {
        $CreateMenu = [
            'menu_name' => htmlspecialchars($request->menu_name),
            'menu_price' => htmlspecialchars($request->menu_price),
            'menu_description' => htmlspecialchars($request->menu_description),
            'menu_image' => null,
            'category_id' => $id,
        ];
        $mimeType = [
            'image/jpeg', 'image/png'
        ];

        if ($request->hasFile('menu_image')) {
            //dosya var
            if (in_array($request->file('menu_image')->getMimeType(), $mimeType)) {
                //eğer images dosyası ise
                //dosya yolunu al
                $path_name = $request->file('menu_image')->path();
                //dosya adını al
                $file_name = Str::slug($request->menu_name) . "." . $request->file('menu_image')->getClientOriginalExtension();
                //yeni adı ayarla
                $new_path = public_path('assets/images/menu_images/' . $file_name);
                //move et
                File::move($path_name, $new_path);
                //null u kaldır
                $CreateMenu['menu_image'] = 'assets/images/menu_images/' . $file_name;
            } else {
                return redirect()->route("GetThisItem", ['id' => $id])->with("error", "Sectiğiniz dosya bir resim dosyası değil lütfen bir daha deneyin");
            }
        }
        $new_category_menu = MenuItem::create($CreateMenu);
        if ($new_category_menu) {
            return redirect()->route("GetThisItem", ['id' => $id])->with("success", "Başarı İle Yeni Bir Menu Oluşturuldu");
        } else {
            return redirect()->route("GetThisItem", ['id' => $id])->with("error", "Bir Sorun Oluştu Lütfen Tekrar Deneyin");
        }
    }
    public function DeleteCategoryItem(Request $request, $cat_id, $menu_id)
    {
        $delete = MenuItem::where("id", $menu_id)->first();
        $delete_file = $delete->menu_image;
        if (File::exists($delete_file)) {
            File::delete($delete_file);
        }
        //bu menuyu en çok tercih edilenlerden de sil
        TheMostToPrefer::where("menu_id", $delete->id)->delete();
        if ($delete->delete()) {
            return redirect()->route("GetThisItem", ['id' => $cat_id])->with("success", "Başarı İle Menu Silindi");
        } else {
            return redirect()->route("GetThisItem", ['id' => $cat_id])->with("error", "Lütfen Tekrar Deneyin Bir Sorun Oluştu");
        }
    }
    public function CategoryItemModalUpdate(Request $request, $cate_id)
    {
        $menu = MenuItem::where("id", $request->menu_id)->first();
        $UpdateMenu = [
            'menu_name' => htmlspecialchars($request->menu_name),
            'menu_price' => htmlspecialchars($request->menu_price),
            'menu_description' => htmlspecialchars($request->menu_description),
            'menu_image' => $menu->menu_image,
            'menu_id' => $request->menu_id,
        ];
        $mimeType = [
            'image/jpeg', 'image/png'
        ];
        if ($request->hasFile('menu_image')) {
            //dosya var
            if (in_array($request->file('menu_image')->getMimeType(), $mimeType)) {
                //eğer images dosyası ise
                //dosya yolunu al
                $path_name = $request->file('menu_image')->path();
                //dosya adını al
                $file_name = Str::slug($request->menu_name) . "." . $request->file('menu_image')->getClientOriginalExtension();
                //yeni adı ayarla
                $new_path = public_path('assets/images/menu_images/' . $file_name);
                //move et
                File::move($path_name, $new_path);
                //null u kaldır
                $CreateMenu['menu_image'] = 'assets/images/menu_images/' . $file_name;
            } else {
                return redirect()->route("GetThisItem", ['id' => $cate_id])->with("error", "Sectiğiniz dosya bir resim dosyası değil lütfen bir daha deneyin");
            }
        }
        $new_category_menu = $menu->update($UpdateMenu);
        if ($new_category_menu) {
            return redirect()->route("GetThisItem", ['id' => $cate_id])->with("success", "Başarı İle Güncellendi");
        } else {
            return redirect()->route("GetThisItem", ['id' => $cate_id])->with("error", "Bir Sorun Oluştu Lütfen Tekrar Deneyin");
        }
    }

    public function AllMenuPage()
    {
        $data = [
            'MenuItemList' => MenuItem::all(),
        ];
        return view("admin.pages.AllMenuList")->with($data);
    }
    public function MenuItemModalUpdate(Request $request)
    {
        $menu = MenuItem::where("id", $request->menu_id)->first();
        $UpdateMenu = [
            'menu_name' => htmlspecialchars($request->menu_name),
            'menu_price' => htmlspecialchars($request->menu_price),
            'menu_description' => htmlspecialchars($request->menu_description),
            'menu_image' => $menu->menu_image,
            'menu_id' => $request->menu_id,
        ];
        $mimeType = [
            'image/jpeg', 'image/png'
        ];
        if ($request->hasFile('menu_image')) {
            //dosya var
            if (in_array($request->file('menu_image')->getMimeType(), $mimeType)) {
                //eğer images dosyası ise
                //dosya yolunu al
                $path_name = $request->file('menu_image')->path();
                //dosya adını al
                $file_name = Str::slug($request->menu_name) . "." . $request->file('menu_image')->getClientOriginalExtension();
                //yeni adı ayarla
                $new_path = public_path('assets/images/menu_images/' . $file_name);
                //move et
                File::move($path_name, $new_path);
                //null u kaldır
                $CreateMenu['menu_image'] = 'assets/images/menu_images/' . $file_name;
            } else {
                return redirect()->route("AllMenuPage")->with("error", "Sectiğiniz dosya bir resim dosyası değil lütfen bir daha deneyin");
            }
        }
        $new_category_menu = $menu->update($UpdateMenu);
        if ($new_category_menu) {
            return redirect()->route("AllMenuPage")->with("success", "Başarı İle Güncellendi");
        } else {
            return redirect()->route("AllMenuPage")->with("error", "Bir Sorun Oluştu Lütfen Tekrar Deneyin");
        }
    }
    public function MenuItemDelete(Request $request, $id)
    {
        $delete = MenuItem::where("id", $id)->first();
        $delete_file = $delete->menu_image;
        if (File::exists($delete_file)) {
            File::delete($delete_file);
        }
        //bu menuyu en çok tercih edilenlerden de sil
        TheMostToPrefer::where("menu_id", $delete->id)->delete();
        if ($delete->delete()) {
            return redirect()->route("AllMenuPage")->with("success", "Başarı İle Menu Silindi");
        } else {
            return redirect()->route("AllMenuPage")->with("error", "Lütfen Tekrar Deneyin Bir Sorun Oluştu");
        }
    }

    public function MenuCreatePage()
    {
        $data = ['Categories' => Category::all()];
        return view("admin.pages.CreateMenu")->with($data);
    }


    //meunu oluştur genel sayfadan

    public function MenuCreatePagePost(Request $request)
    {
        $CreateMenu = [
            'menu_name' => htmlspecialchars($request->menu_name),
            'menu_price' => htmlspecialchars($request->menu_price),
            'menu_description' => htmlspecialchars($request->menu_description),
            'menu_image' => null,
            'category_id' => htmlspecialchars($request->category_id),
        ];
        // dd($CreateMenu);
        // die();
        $mimeType = [
            'image/jpeg', 'image/png'
        ];
        if ($request->hasFile('menu_image')) {
            //dosya var
            if (in_array($request->file('menu_image')->getMimeType(), $mimeType)) {
                //eğer images dosyası ise
                //dosya yolunu al
                $path_name = $request->file('menu_image')->path();
                //dosya adını al
                $file_name = Str::slug($request->menu_name) . "." . $request->file('menu_image')->getClientOriginalExtension();
                //yeni adı ayarla
                $new_path = public_path('assets/images/menu_images/' . $file_name);
                //move et
                File::move($path_name, $new_path);
                //null u kaldır
                $CreateMenu['menu_image'] = 'assets/images/menu_images/' . $file_name;
            } else {
                return redirect()->route("AllMenuPage")->with("error", "Sectiğiniz dosya bir resim dosyası değil lütfen bir daha deneyin");
            }
        }
        $new_category_menu = MenuItem::create($CreateMenu);
        if ($new_category_menu) {
            return redirect()->route("AllMenuPage")->with("success", "Başarı İle Yeni Bir Menu Oluşturuldu");
        } else {
            return redirect()->route("AllMenuPage")->with("error", "Bir Sorun Oluştu Lütfen Tekrar Deneyin");
        }
    }


    //toplu fiyat gücelleme controller
    public function AllPriceUpdatePage()
    {
        $data = [
            'MenuItemList' => MenuItem::all(),
        ];
        return view("admin.pages.AllPriceUpdate")->with($data);
    }
    //toplu fiyat güncelleme post

    public function AllPriceUpdatePost(Request $request)
    {

        $fiyat_listesi = $request->menu_price;
        $butun_liste = MenuItem::all();
        $count = 0;
        $durum = false;
        foreach ($butun_liste as $key) {
            // echo $fiyat_listesi[$count] . "<br>";
            $key->update(['menu_price' => $fiyat_listesi[$count]]);
            $count++;
            $durum = true;
        }
        if ($durum) {
            return redirect()->route("AllPriceUpdatePage")->with("success", "Bütün Fiyatlar Başarı İle Güncellendi !");
        } else {
            return redirect()->route("AllPriceUpdatePage")->with("error", "Bir Sorun Oluştu Lütfen Birdaha Dene !! ");
        }
    }

    //gene site ayarları page
    public function SettingsPage()
    {
        $data = [
            "Settings" => Settings::all(),

        ];
        return view("admin.pages.AdminSettings")->with($data);
    }
}
