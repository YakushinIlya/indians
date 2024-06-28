<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

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

Route::get('/', \App\Http\Controllers\HomeController::class)->name("home");
Route::get('/page/{page}', \App\Http\Controllers\page\IndexController::class)->name("page");
Route::post('/auth', \App\Http\Controllers\user\LoginController::class)->name("form.auth");
Route::get('/blocked', \App\Http\Controllers\BlockedController::class)->name("blocked");
Route::get('/news', \App\Http\Controllers\news\AllController::class)->name("news.all");
Route::get('/news/{slug}', \App\Http\Controllers\news\AllController::class)->name("news.rubric");
Route::get('/new/{slug}', \App\Http\Controllers\news\IndexController::class)->name("news.index");


Route::get('/clear-cache', function() {
    $configCache = Artisan::call('config:cache');
    $clearCache  = Artisan::call('cache:clear');
    $clearView   = Artisan::call('view:clear');
    echo "Мой господин, КЕШ был прочищен успешно! Какие будут дальнейшие поручения?";
});



Route::prefix("basket")->name("basket.")->group(function(){
    Route::get("/", \App\Http\Controllers\basket\IndexController::class)->name("index");
    Route::match(["get", "post"], "/details", \App\Http\Controllers\basket\DetailsController::class)->name("details");
    Route::get("/product/{id}", \App\Http\Controllers\catalog\ProductController::class)->name("product");
    Route::get("/{category}", \App\Http\Controllers\catalog\CategoryController::class)->name("category");
});
Route::prefix("catalog")->name("catalog.")->group(function(){
    Route::get("/", \App\Http\Controllers\catalog\IndexController::class)->name("index");
    Route::get("/product/{id}", \App\Http\Controllers\catalog\ProductController::class)->name("product");
    Route::get("/{category}", \App\Http\Controllers\catalog\CategoryController::class)->name("category");
});
Route::prefix("lk")->middleware(["auth", "lock"])->name("lk.")->group(function(){
    Route::get("/", \App\Http\Controllers\lk\IndexController::class)->name("index");
    Route::post("/update", \App\Http\Controllers\lk\UpdateController::class)->name("update");
    Route::get("/history", \App\Http\Controllers\lk\HistoryController::class)->name("history");
    Route::get("/sales", \App\Http\Controllers\lk\SalesController::class)->name("sales");
    Route::get("logout", function(){
        \Illuminate\Support\Facades\Auth::logout();
        return redirect('/');
    })->name("logout");
});



Route::prefix("admin")->middleware(["auth", "role:admin"])->name("admin.")->group(function(){
    Route::get("/", \App\Http\Controllers\admin\DashboardController::class)->name("index");
    Route::get("/test", \App\Http\Controllers\admin\TestController::class)->name("test");

    Route::prefix("user")->name("user.")->group(function(){
        Route::get("/add", \App\Http\Controllers\admin\user\AddController::class)->name("add");
        Route::post("/create", \App\Http\Controllers\admin\user\CreateController::class)->name("create");
        Route::get("/edit/{id}", \App\Http\Controllers\admin\user\EditController::class)->name("edit");
        Route::put("/update/{id}", \App\Http\Controllers\admin\user\UpdateController::class)->name("update");
        Route::delete("/delete/{id}", \App\Http\Controllers\admin\user\DeleteController::class)->name("delete");
        Route::get("/restore/{id}", \App\Http\Controllers\admin\user\RestoreController::class)->name("restore");
        Route::get("/lock/{id}", [\App\Http\Controllers\admin\user\LockController::class, "lockUp"])->name("lock");
        Route::get("/unlock/{id}", [\App\Http\Controllers\admin\user\LockController::class, "unlockUp"])->name("unlock");

        Route::get("/all", \App\Http\Controllers\admin\user\AllController::class)->name("all");
        Route::get("/admins", \App\Http\Controllers\admin\user\AdminsController::class)->name("admins");
        Route::get("/buyers", \App\Http\Controllers\admin\user\BuyersController::class)->name("buyers");
        Route::get("/blocked", \App\Http\Controllers\admin\user\BlockedController::class)->name("blocked");
        Route::get("/deleted", \App\Http\Controllers\admin\user\DeletedController::class)->name("deleted");
    });
    Route::prefix("news")->name("news.")->group(function(){
        Route::get("/add", \App\Http\Controllers\admin\news\AddController::class)->name("add");
        Route::post("/create", \App\Http\Controllers\admin\news\CreateController::class)->name("create");
        Route::get("/edit/{id}", \App\Http\Controllers\admin\news\EditController::class)->name("edit");
        Route::put("/update/{id}", \App\Http\Controllers\admin\news\UpdateController::class)->name("update");
        Route::delete("/delete/{id}", \App\Http\Controllers\admin\news\DeleteController::class)->name("delete");

        Route::get("/all", \App\Http\Controllers\admin\news\AllController::class)->name("all");
    });
    Route::prefix("products")->name("products.")->group(function(){
        Route::get("/add", \App\Http\Controllers\admin\products\AddController::class)->name("add");
        Route::delete("/delete/{id}", \App\Http\Controllers\admin\products\DeleteController::class)->name("delete");
        Route::delete("/delete-all", \App\Http\Controllers\admin\products\DeleteAllController::class)->name("delete-all");

        Route::get("/all", \App\Http\Controllers\admin\products\AllController::class)->name("all");
    });
    Route::prefix("categories")->name("categories.")->group(function(){
        Route::delete("/delete/{id}", \App\Http\Controllers\admin\categories\DeleteController::class)->name("delete");
        Route::get("/all", \App\Http\Controllers\admin\categories\AllController::class)->name("all");
    });
    Route::prefix("rubrics")->name("rubrics.")->group(function(){
        Route::get("/add", \App\Http\Controllers\admin\rubrics\AddController::class)->name("add");
        Route::post("/create", \App\Http\Controllers\admin\rubrics\CreateController::class)->name("create");
        Route::get("/edit/{id}", \App\Http\Controllers\admin\rubrics\EditController::class)->name("edit");
        Route::put("/update/{id}", \App\Http\Controllers\admin\rubrics\UpdateController::class)->name("update");
        Route::delete("/delete/{id}", \App\Http\Controllers\admin\rubrics\DeleteController::class)->name("delete");

        Route::get("/all", \App\Http\Controllers\admin\rubrics\AllController::class)->name("all");
    });
    Route::prefix("pages")->name("pages.")->group(function(){
        Route::get("/add", \App\Http\Controllers\admin\pages\AddController::class)->name("add");
        Route::post("/create", \App\Http\Controllers\admin\pages\CreateController::class)->name("create");
        Route::get("/edit/{id}", \App\Http\Controllers\admin\pages\EditController::class)->name("edit");
        Route::put("/update/{id}", \App\Http\Controllers\admin\pages\UpdateController::class)->name("update");
        Route::delete("/delete/{id}", \App\Http\Controllers\admin\pages\DeleteController::class)->name("delete");

        Route::get("/all", \App\Http\Controllers\admin\pages\AllController::class)->name("all");
    });
    Route::prefix("feedback")->name("feedback.")->group(function(){
        Route::get("/feedback", \App\Http\Controllers\admin\DashboardController::class)->name("feedback");

        Route::get("/contacts", \App\Http\Controllers\admin\feedback\contacts\AllController::class)->name("contacts");
        Route::get("/contacts/active/{id}", \App\Http\Controllers\admin\feedback\contacts\ActiveController::class)->name("contacts.active");
        Route::get("/contacts/add", \App\Http\Controllers\admin\feedback\contacts\AddController::class)->name("contacts.add");
        Route::post("/contacts/create", \App\Http\Controllers\admin\feedback\contacts\CreateController::class)->name("contacts.create");
        Route::get("/contacts/edit/{id}", \App\Http\Controllers\admin\feedback\contacts\EditController::class)->name("contacts.edit");
        Route::put("/contacts/update/{id}", \App\Http\Controllers\admin\feedback\contacts\UpdateController::class)->name("contacts.update");
        Route::delete("/contacts/delete/{id}", \App\Http\Controllers\admin\feedback\contacts\DeleteController::class)->name("contacts.delete");
    });
    Route::prefix("sbis")->name("sbis.")->group(function(){
        Route::get("/test", [\App\Http\Controllers\api\sbis\TestController::class, "getData"])->name("test");
        Route::get("/shops", [\App\Http\Controllers\api\sbis\ShopsController::class, "getData"])->name("shops");
        Route::match(['post', 'get'],"/products-categories/{page}/{pageSize}", [\App\Http\Controllers\api\sbis\ProductsCategoriesController::class, "getData"])->name("products-categories");
    });
});



