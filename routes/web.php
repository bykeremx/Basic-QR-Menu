<?php

use App\Http\Controllers\Admin\AjaxController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\TheMostToPreferController;
use App\Http\Controllers\Pages\IndexController;
use App\Http\Controllers\Pages\MenuItemController;
use App\Models\Settings;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//anasayfa Controller i çağır


Route::get('/', [IndexController::class, 'IndexPages'])->name('anasayfa');
//Menu item sayfası

Route::get("/menu-item/{id}", [MenuItemController::class, "MenuItemPage"])->name("MenuItemPage");


//anasayfa ajax

Route::post("/urundetay", [AjaxController::class, "ItemDetailHomePage"])->name("ItemDetailGetItemPage-POST");


/******************** login ***************************** */
Route::get("/login", [LoginController::class, "LoginIndexPages"])->name("AdminLoginPage");
//post
Route::post("/login", [LoginController::class, "LoginPagesPost"])->name("AdminLoginPagePOST");
Route::get("/logout",[LoginController::class,"LogOut"])->name("LogoutPage");
//admin
Route::prefix("/admin")->middleware("CheckLogin")->group(function () {
    /********************************************************* */
    //anasayfa
    Route::get("/", [AdminIndexController::class, "AdminIndex"])->name("adminIndex");
    //category
    Route::get("/category", [AdminIndexController::class, "CategoryPage"])->name("categoryPage");
    //update
    Route::post("/ajax/category/update", [AdminIndexController::class, "CategoryModalUpdate"])->name("updateCategory");
    Route::get("/category/create", [AdminIndexController::class, "CreateCategoryPage"])->name("CreateCategoryPage");
    //create page post
    Route::post("/category/create", [AdminIndexController::class, "CreateCategoryPost"])->name("CreateCategoryPOST");
    //categry-delete
    Route::get("/category/delete/{id}", [AdminIndexController::class, "CategoryDelete"])->name("DeleteCategory");
    // Get kategori item lisst
    Route::get("/category/item/{id}", [MenuController::class, "GetCategoryMenuItem"])->name("GetThisItem");
    //bulunduğum kategori item sayfasında o sayfaya ait menu oluşturma post url si
    Route::post("/category/item/{id}", [MenuController::class, "CreateCategoryItem"])->name("CreateCategoryItem");
    // bu onu silme urlsi
    Route::get("/category/item/{cat_id}/{menu_id}", [MenuController::class, "DeleteCategoryItem"])->name("CategoryDeleteItemPOST");
    Route::post("/category/item/update/{cat_id}", [MenuController::class, "CategoryItemModalUpdate"])->name("CategoryUpdateItemPOST");

    // Bütün Menulerin Listelendiği Sayfanın Rotası :
    Route::get("/all-menu-list", [MenuController::class, "AllMenuPage"])->name("AllMenuPage");
    // Bütün Menulerin gelecek olan Menu listesinden update etme rotası
    Route::post("/all-menu-list", [MenuController::class, "MenuItemModalUpdate"])->name("AllMenuPageModalUpdate");
    // bütün menu listesinden id ye göre silme
    Route::get("/all-menu-list/delete/{id}", [MenuController::class, "MenuItemDelete"])->name("AllMenuPageDelete");
    //direkt menu oluşturma sayfası
    Route::get("/menu/create", [MenuController::class, "MenuCreatePage"])->name("MenuCreatePage");
    //menu oluşturma sayfasına gönderilecek url ve post
    Route::post("/menu/create", [MenuController::class, "MenuCreatePagePost"])->name("MenuCreatePagePost");


    //fiyat güncelle rotası :

    Route::get("/all-price-update", [MenuController::class, "AllPriceUpdatePage"])->name("AllPriceUpdatePage");

    //fiyat güncelle toplu :

    Route::post("/all-price-update", [MenuController::class, "AllPriceUpdatePost"])->name("AllPriceUpdatePagePOST");


    //settings page (Ayarlar Sayfası)

    Route::get("/settings", [MenuController::class, "SettingsPage"])->name("settingsPage");
    //settings Update
    Route::post("/settings", [SettingsController::class, "SettingsUpdatePost"])->name("SettingsUpdatePost");
    //slider sayfası
    Route::get("/slider", [SettingsController::class, "SliderPage"])->name("SliderPage");

    //slider post sayfası

    Route::post("/slider/create", [SettingsController::class, "SliderPagePost"])->name("SliderPagePost");

    //slider Update
    Route::post("/slider/update", [SettingsController::class, "SliderPageUpdate"])->name("SliderPagePostUpdate");

    //slider must post update

    Route::post("/slider/must/update/page", [SettingsController::class, "SliderMustUpdatePost"])->name("SliderMustUpdate");
    //slider delete

    Route::get("/slider/delete/{id}", [SettingsController::class, "DeleteSlider"])->name("SliderDelete");
    //the most to prefer (en çok tercih edilen listesi)
    Route::get("/TheMostToPrefer", [TheMostToPreferController::class, "TheMostToPreferIndex"])->name("TheMostToPrefer");
    // the most to prefer sayfasına ürün eklenecek sayfasnın post url si
    Route::post("/TheMostToPrefer", [TheMostToPreferController::class, "TheMostToPreferIndexPost"])->name("TheMostToPreferPost");
    //delete
    Route::get("/TheMostToPrefer/delete/{id}",[TheMostToPreferController::class,"DeleteMostPrefer"])->name("DeleteTheMostItem");

    // --------------------------------------------------------------------------------------------------------------------------
    //ajax rotaları
    Route::post("/category/update", [AjaxController::class, "AjaxUpdate"])->name("ajax-update-category");
    Route::post("/ajax/category/item/update", [AjaxController::class, "AjaxUpdateCategoryItem"])->name("ajax-update-category-item");
    Route::post("/settings/update", [AjaxController::class, "SettingsUpdateAjax"])->name("ajax-settings-update");
    //slider verilerini getirena ajax
    Route::post("/slider", [AjaxController::class, "SliderUpdateGetData"])->name("GetDetaiUpdateSlider-POST");
    Route::post("/slider/must/get-data", [AjaxController::class, "SliderMustUpdate"])->name("SliderMustUpdatePOST");
});

//category
