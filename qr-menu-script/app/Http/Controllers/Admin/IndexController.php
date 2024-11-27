<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Slider;
use App\Models\TheMostToPrefer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function AdminIndex()
    {
        $count_category = Category::all()->count();
        $count_Menu = MenuItem::all()->count();
        $Slider_count = Slider::all()->count();
        $GetTheMostToPreferMenus = TheMostToPrefer::select("menu_id")->distinct()->count();
        $data = [
            'menu_count' => $count_Menu,
            'category_count' => $count_category,
            'slider_count'=>$Slider_count,
            'theMostToPrefer_count'=>$GetTheMostToPreferMenus,
        ];
        return view('admin.pages.index')->with($data);
    }

    public function CategoryPage()
    {


        $data = [
            'Category' => Category::all(),
        ];

        return view("admin.pages.category")->with($data);
    }


    public function CreateCategoryPage()
    {
        return view("admin.pages.CreateCategory");
    }




    public function CreateCategoryPost(Request $request)
    {
        $CreateCategoy = [
            'category_name' => htmlspecialchars($request->category_name),
            'category_color' => htmlspecialchars($request->category_color),
            'category_description' => htmlspecialchars($request->category_description),
            'category_image' => null,
        ];
        // dd($CreateCategoy);
        // die();
        $mimeType = [
            'image/jpeg', 'image/png'
        ];

        if ($request->hasFile('category_image')) {
            //dosya var
            if (in_array($request->file('category_image')->getMimeType(), $mimeType)) {
                //eğer images dosyası ise
                //dosya yolunu al
                $path_name = $request->file('category_image')->path();
                //dosya adını al
                $file_name = Str::slug($request->category_name) . "." . $request->file('category_image')->getClientOriginalExtension();
                //yeni adı ayarla
                $new_path = public_path('assets/images/category_images/' . $file_name);
                //move et
                File::move($path_name, $new_path);
                //null u kaldır
                $CreateCategoy['category_image'] = 'assets/images/category_images/' . $file_name;
            } else {
                return redirect()->route('CreateCategoryPage')->with("error", "Sectiğiniz dosya bir resim dosyası değil lütfen bir daha deneyin");
            }
        }
        //kategory oluşturmaa

        $new_category = Category::create($CreateCategoy);
        if ($new_category) {
            return redirect()->route("categoryPage")->with("success", "Başarı İle Yeni Bir Kategori Oluşturuldu");
        } else {
            return redirect()->route("categoryPage")->with("error", "Bir Sorun Oluştu Lütfen Tekrar Deneyin");
        }
    }
    public function CategoryModalUpdate(Request $request)
    {
        $update_category = Category::where("id", $request->category_id)->first();
        $UpdateCategory = [
            'category_name' => htmlspecialchars($request->category_name),
            'category_color' => htmlspecialchars($request->category_color),
            'category_description' => htmlspecialchars($request->category_description),
            'category_image' => $update_category->category_image,
        ];
        $mimeType = [
            'image/jpeg', 'image/png'
        ];

        if ($request->hasFile('category_image')) {
            //dosya var
            if (in_array($request->file('category_image')->getMimeType(), $mimeType)) {
                //eğer images dosyası ise
                //dosya yolunu al
                $path_name = $request->file('category_image')->path();
                //dosya adını al
                $file_name = Str::slug($request->category_name) . "." . $request->file('category_image')->getClientOriginalExtension();
                //yeni adı ayarla
                $new_path = public_path('assets/images/category_images/' . $file_name);
                //move et
                File::move($path_name, $new_path);
                if (File::exists(asset($request->category_image))) {
                    //eğer böyle bir dosya var ise
                    File::delete(asset($request->category_image));
                }
                //null u kaldır
                $UpdateCategory['category_image'] = 'assets/images/category_images/' . $file_name;
            } else {
                return redirect()->route('CreateCategoryPage')->with("error", "Sectiğiniz dosya bir resim dosyası değil lütfen bir daha deneyin");
            }
        }
        $update_category->update($UpdateCategory);
        if ($update_category) {
            return redirect()->route("categoryPage")->with("success", "Başarı İle " . $request->category_name . " adlı kategori güncellendi");
        } else {
            return redirect()->route("categoryPage")->with("error", "Bir Sorun Oluştu Lütfen Tekrar Deneyin");
        }
        dd($request->all());
        return redirect()->route("categoryPage");
    }
    public function CategoryDelete(Request $request, $id)
    {
        $delete = Category::where("id", $id)->first();

        $delete_file = $delete->category_image;
        if (File::exists($delete_file)) {
            File::delete($delete_file);
        }
        if ($delete->delete()) {
            MenuItem::where("category_id", $id)->delete();
            return redirect()->route("categoryPage")->with("success", "Başarı İle Silindi");
        } else {
            return redirect()->route("categoryPage")->with("error", "Lütfen Tekrar Deneyin Bir Sorun Oluştu");
        }
    }


}
