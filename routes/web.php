<?php
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\CompanyController;
use App\Http\Controllers\Backend\HeroSliderController;
use App\Http\Controllers\Backend\CardController;
use App\Http\Controllers\Backend\OurClientsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ManageCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ColourConroller;
use App\Http\Controllers\Backend\MavMenuController;
use App\Http\Controllers\Backend\ProductController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Front End Controller Start Hear

Route::get('/', [HomeController::class, 'index'])->name('HomePage');
Route::get('/single', [HomeController::class, 'singlepage']);
Route::get('/product/details/{product_code}/{slug}', [HomeController::class, 'ProductDetails']);


// Front End Controller End Hear




// ========NavMenu And Sub NavMenu Start ===========
Route::group(['prefix'=>'/navmenu'],function(){
    Route::get('create', [MavMenuController::class, 'create'])->name('NavMenuCreate');
    Route::post('/categories/create', [MavMenuController::class, 'store'])->name('NavMenuStore');
    Route::get('index', [MavMenuController::class, 'index'])->name('NavMenuIndex');
    // Delete category
  Route::delete('categories/{id}', [MavMenuController::class,'destroy'])->name('NavMenu.destroy');
  // Delete Sub-category
  Route::delete('subcategories/{id}', [MavMenuController::class, 'subdelete'])->name('Navsubcategories.destroy');
  });

  // ========NavMenu And Sub NavMenu End ===========


// ========Category And Sub Category Start ===========
Route::group(['prefix'=>'/category'],function(){
  Route::get('create', [CategoryController::class, 'create'])->name('categoriesCreate');
  Route::post('/categories/create', [CategoryController::class, 'store'])->name('categoriesStore');
  Route::get('index', [CategoryController::class, 'index'])->name('categoriesIndex');
  // Delete category
Route::delete('categories/{id}', [CategoryController::class,'destroy'])->name('categories.destroy');
Route::get('categories/{id}/edit', [CategoryController::class,'edit'])->name('categories.edit');
Route::put('categories/{category}', [CategoryController::class,'update'])->name('categories.update');
Route::get('status/{id}',[CategoryController::class,'status'])->name('categoryStatus');



// Delete Sub-category
Route::delete('subcategories/{id}', [CategoryController::class, 'subdelete'])->name('subcategories.destroy');
// Edit subcategory
// Route::get('subcategories/{subcategory}/edit', [CategoryController::class, 'subEdit'])->name('subcategories.edit');
// Route::put('subcategories/{subcategory}', [CategoryController::class, 'SubUpdate'])->name('subcategories.update');
Route::get('subcategories/{id}/edit', [CategoryController::class, 'editSubcategory'])->name('subcategories.edit');
Route::put('subcategories/{id}', [CategoryController::class, 'updateSubcategory'])->name('subcategories.update');
Route::get('sub-status/{id}',[CategoryController::class,'substatus'])->name('subcategoryStatus');

});

// ========Category And Sub Category End ===========



// //=========Manage All Category Start===========
// Route::get('/manage-category', [ManageCategoryController::class, 'index'])->name('manageCategory');
// Route::post('fetch-sub-categori', [ManageCategoryController::class, 'fetchSubCat']);
// Route::post('fetch-sub-sub-categori', [ManageCategoryController::class, 'fetchSubSubCat']);
// Route::post('manage-category-store', [ManageCategoryController::class, 'allCatrgoryStore'])->name('manageCategoryStore');
// Route::get('manage-all-category', [ManageCategoryController::class, 'allCategory'])->name('manageAllCategory');

// //=========Manage All Category End ===========


// ===========Company Controller Start =============
Route::group(['prefix'=>'/company'],function(){
    Route::get('add',[CompanyController::class,'index'])->name('add_company');
    Route::post('store',[CompanyController::class,'store'])->name('store_company');
    Route::get('show',[CompanyController::class,'show'])->name('show_company');
    Route::get('edit/{id}',[CompanyController::class,'edit'])->name('company_info_edit');
    Route::post('update_info',[CompanyController::class,'update'])->name('company_info_update');
    Route::get('delete-company/{id}',[CompanyController::class,'destroy'])->name('company_info_delete');
});
// ===========Company Controller End =============



  // ==========Slider Controller Start ===============

  Route::group(['prefix'=>'/slider'],function(){
    Route::get('add',[HeroSliderController::class,'index'])->name('slider');
    Route::post('store',[HeroSliderController::class,'store'])->name('sliderStore');
    Route::get('show',[HeroSliderController::class,'show'])->name('sliderShow');
    Route::get('edit/{id}',[HeroSliderController::class,'edit'])->name('SliderInfoEdit');
    Route::post('update',[HeroSliderController::class,'update'])->name('SliderInfoUpdate');
    Route::get('delete/{id}',[HeroSliderController::class,'destroy'])->name('SliderInfoDelete');
    Route::get('status/{id}',[HeroSliderController::class,'status'])->name('sliderStatus');

 });



  // ==========Slider Controller End ===============


  // ==========Card  Controller Start ===============

  Route::group(['prefix'=>'/card'],function(){
    Route::get('add',[CardController::class,'index'])->name('cardAdd');
    Route::post('store',[CardController::class,'store'])->name('addStore');
    Route::get('show',[CardController::class,'show'])->name('cardShow');
    Route::get('status/{id}',[CardController::class,'status'])->name('cardStatus');
 });
  // ==========Card  Controller End ===============


  //=============Our Clients Start ===========

  Route::group(['prefix'=>'/clint'],function(){
    Route::get('add',[OurClientsController::class,'index'])->name('clintdAdd');
    Route::post('store',[OurClientsController::class,'store'])->name('clientStore');
    Route::get('show',[OurClientsController::class,'show'])->name('allClients');
    Route::get('edit/{id}',[OurClientsController::class,'edit'])->name('clientedit');
    Route::get('status/{id}',[OurClientsController::class,'status'])->name('allclientstatus');
    Route::get('clintdelete/{id}',[OurClientsController::class,'destroy'])->name('clintdelete');
    Route::post('updateClient',[OurClientsController::class,'update'])->name('updateClient');

 });
  //=============Our Clients End  ===========

 //========== Brand Controller Start=========
Route::group(['prefix'=>'/brand'],function(){
    Route::get('add',[BrandController::class,'index'])->name('addBrand');
    Route::get('show',[BrandController::class,'show'])->name('showBrand');
    Route::post('add',[BrandController::class,'store'])->name('storeBrand');
    Route::get('status/{id}',[BrandController::class,'status'])->name('brandStatus');
    Route::get('brand-delete/{id}',[BrandController::class,'destroy'])->name('brandDelete');
    Route::get('edit/{id}',[BrandController::class,'edit'])->name('brandEdit');
    Route::post('updateBrand',[BrandController::class,'update'])->name('brandUpdate');

});
 //========== Brand Controller End=========


 // ============Size Controller Start========
Route::group(['prefix'=>'/size'],function(){
    Route::get('add',[SizeController::class,'index'])->name('AddSize');
    Route::post('add',[SizeController::class,'store'])->name('StoreSize');
    Route::get('show',[SizeController::class,'show'])->name('ShowSize');
    Route::get('status/{id}',[SizeController::class,'status'])->name('StatusSize');
    Route::get('delete/{id}',[SizeController::class,'destroy'])->name('DeleteSize');
    Route::get('edit/{id}',[SizeController::class,'edit'])->name('EditSize');
    Route::POST('update',[SizeController::class,'update'])->name('UpdateSize');

});
// ==============Size Controller End============

 // ============Colour Controller Start========

Route::group(['prefix'=>'/colour'],function(){
    Route::get('add',[ColourConroller::class,'index'])->name('AddColour');
    Route::post('add',[ColourConroller::class,'store'])->name('StoreColour');
    Route::get('show',[ColourConroller::class,'show'])->name('ShowColour');
    Route::get('status/{id}',[ColourConroller::class,'status'])->name('StatusColour');
    Route::get('delete/{id}',[ColourConroller::class,'destroy'])->name('DeleteColour');
    Route::get('edit/{id}',[ColourConroller::class,'edit'])->name('EditColour');
    Route::POST('update',[ColourConroller::class,'update'])->name('UpdateColour');
});

// ==============Colour Controller End============

 // ============Product Controller Start========

Route::group(['prefix'=>'/product'],function(){
    Route::get('create',[ProductController::class,'create'])->name('AddProduct');
    Route::post('store',[ProductController::class,'store'])->name('StoreProduct');
    Route::get('index',[ProductController::class,'index'])->name('ShowProduct');
    Route::get('status/{id}',[ProductController::class,'status'])->name('StatusProduct');
    Route::delete('product/delete/{id}', [ProductController::class, 'productdelete'])->name('DeleteProduct');
    Route::get('edit/{id}',[ProductController::class,'edit'])->name('EditProduct');
    Route::POST('update',[ProductController::class,'update'])->name('UpdateProduct');
    Route::POST('img-update',[ProductController::class,'updateMultiImg'])->name('UpdateProductMultiImg');
    Route::get('/product/multiimg/delete/{id}',[ProductController::class,'multipaleImgDel'])->name('multiImgDel');
    // Route::get('/product/multiimg/delete/{id}' , 'MulitImageDelelte')->name('product.multiimg.delete');
});



// ==============Product Controller End============

Route::get('/dashboard', function () {
    return view('backend.admin_dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
