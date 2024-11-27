<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class SettingsController extends Controller
{
    //ayarları Guncelle
    public function SettingsUpdatePost(Request $request)
    {
        $ayari_getir = Settings::where("id", $request->settings_id)->first();
        if ($ayari_getir->settings_type == "file") {
            //file isteniyor ..
            $mimeType = [
                'image/jpeg', 'image/png'
            ];
            if ($request->hasFile('new_value')) {
                //gelen bir dosya ise
                // ve bu dosya varsa  onu sil
                if (File::exists($ayari_getir->settings_value)) {
                    File::delete($ayari_getir->settings_value);
                }
                //dosya var
                if (in_array($request->file('new_value')->getMimeType(), $mimeType)) {
                    //eğer images dosyası ise
                    //dosya yolunu al
                    $path_name = $request->file('new_value')->path();
                    //dosya adını al
                    /*
                    */
                    $file_name = date("y-m-d-s") . "-Images" . "." . $request->file('new_value')->getClientOriginalExtension();
                    //yeni adı ayarla
                    $new_path = public_path('assets/images/setting_image/' . $file_name);
                    //move et
                    File::move($path_name, $new_path);
                    //null u kaldır
                    $durum = $ayari_getir->update(["settings_value" => 'assets/images/setting_image/' . $file_name]);
                    if ($durum) {
                        return redirect()->route("settingsPage")->with("success", "Başarı İle Güncellendi");
                    } else {
                        return redirect()->route("settingsPage")->with("error", "Güncellenemedi Bir Problem Oluştu Lütfen Tekrar Dene");
                    }
                } else {
                    return redirect()->route("settingsPage")->with("error", "Sectiğiniz dosya bir resim dosyası değil lütfen bir daha deneyin");
                }
            }
        } else {

            $menu_new_values = htmlspecialchars($request->new_value);
            $durum = $ayari_getir->update(['settings_value' => $menu_new_values]);
            if ($durum) {
                return redirect()->route("settingsPage")->with("success", "Başarı İle Güncellendi");
            } else {
                return redirect()->route("settingsPage")->with("error", "Güncellenemedi Bir Problem Oluştu Lütfen Tekrar Dene");
            }
            dd("Text Dostası İsteniyor .. ");
        }
    }
    //slider sayfası

    public function SliderPage()
    {

        $data = [

            'Slider' => Slider::all(),
        ];
        return view("admin.pages.Slider")->with($data);
    }

    //slider post sayfas

    public function SliderPagePost(Request $request)
    {
        $mimeType = [
            'image/jpeg', 'image/png'
        ];
        if ($request->hasFile('image')) {
            //dosya var
            if (in_array($request->file('image')->getMimeType(), $mimeType)) {
                //eğer images dosyası ise
                //dosya yolunu al
                $path_name = $request->file('image')->path();
                //dosya adını al
                $file_name = date("y-m-d-s") . "-slider" . "." . $request->file('image')->getClientOriginalExtension();
                //yeni adı ayarla
                $new_path = public_path('assets/images/slider_images/' . $file_name);

                //null u kaldır
                //eğer resim var ise
                // oluşturmayı başarı ile yap
                //move et
                File::move($path_name, $new_path);
                $CrateSlider = [
                    'title' => htmlspecialchars($request->title),
                    'description' => htmlspecialchars($request->description),
                    'image' => 'assets/images/slider_images/' . $file_name,
                ];
                $_is_created = Slider::create($CrateSlider);
                if ($_is_created) {
                    return redirect()->route("SliderPage")->with("success", "Başarı İle Slider Oluşturdu");
                } else {
                    return redirect()->route("SliderPage")->with("error", "Slider Oluşurken Bir Problem Oluştu");
                }
            } else {
                return redirect()->route("SliderPage")->with("error", "Sectiğiniz dosya bir resim dosyası değil lütfen bir daha deneyin");
            }
        } else {
            return redirect()->route("SliderPage")->with("error", "Lütfen Resim Seçin Resim Zorunlu");
        }
    }

    //slider update

    public function SliderPageUpdate(Request $request)
    {


        $FindSlider = Slider::where("id", $request->slider_id)->first();
        $mimeType = [
            'image/jpeg', 'image/png'
        ];
        $Update_Slider = [
            'title' => htmlspecialchars($request->title),
            'description' => htmlspecialchars($request->description),
            'image' => $FindSlider->image,
        ];
        if ($request->hasFile('image')) {

            //dosya var
            if (in_array($request->file('image')->getMimeType(), $mimeType)) {
                //eğer images dosyası ise
                //dosya yolunu al
                $path_name = $request->file('image')->path();
                //dosya adını al
                $file_name = date("y-m-d-s") . "-slider" . "." . $request->file('image')->getClientOriginalExtension();
                //yeni adı ayarla
                $new_path = public_path('assets/images/slider_images/' . $file_name);

                //null u kaldır
                //eğer resim var ise
                // oluşturmayı başarı ile yap
                //move et
                File::move($path_name, $new_path);
                //eski resim dosyasını sil
                if (File::exists($FindSlider->image)) {
                    File::delete($FindSlider->image);
                }
                $Update_Slider['image'] = 'assets/images/slider_images/' . $file_name;
            } else {
                return redirect()->route("SliderPage")->with("error", "Sectiğiniz dosya bir resim dosyası değil lütfen bir daha deneyin");
            }
        } else {
            return redirect()->route("SliderPage")->with("error", "Lütfen Resim Seçin Resim Zorunlu (.png ya da .jpg)");
        }

        $_is_updated = $FindSlider->update($Update_Slider);
        if ($_is_updated) {
            return redirect()->route("SliderPage")->with("success", "Başarı İle Slider Güncellendi");
        } else {
            return redirect()->route("SliderPage")->with("error", "Slider Güncellenirken Bir Problem Oluştu");
        }
    }

    //modal update slider sırası güncelleme

    public function SliderMustUpdatePost(Request $request)
    {

        $FindSlider = Slider::where("id", $request->slider_id)->first();
        $is_updated = $FindSlider->update(['must' => htmlspecialchars($request->must)]);
        if ($is_updated) {
            return redirect()->route("SliderPage")->with("success", "Başarıli Bir Şekilde Sıra Güncellendi");
        } else {
            return redirect()->route("SliderPage")->with("error", "Sıra Numarası Güncellendirken Bir Hata Oluştu Lütfen Tekrar Deneyin");
        }
    }

    //slider delete controlleri
    public function DeleteSlider($id)
    {
        $FindSlider = Slider::where("id", $id)->first();
        if (File::exists($FindSlider->image)) {
            //eğer resmi var ise sil
            File::delete($FindSlider->image);
        }
        $is_delete = $FindSlider->delete();
        if ($is_delete) {
            return redirect()->route("SliderPage")->with("success", "Başarıli Bir Silindi");
        } else {
            return redirect()->route("SliderPage")->with("error", "Silinirken Bir Sorun Oluştu");
        }
    }
}
