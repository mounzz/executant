<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AvatarController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserListController;
use App\Http\Controllers\CategorieController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::get('/update', [UserController::class, 'create'])->middleware(['auth']);
Route::put('/update', [UserController::class, 'update'])->middleware(['auth']);

//GALERIES
Route::get('/galerie', [ImagesController::class, 'create'])->name('gallery');

//ARTICLES
Route::get('/articles', [ArticleController::class, "index"])->name('articles');

Route::middleware(['adminAccess'])->group(function(){
    //USERS

    Route::get('/userlist', [UserListController::class, 'index'])->name('users');
    Route::get('/updateProfilAdmin/{id}', [UserListController::class, 'show']);
    Route::put('/updateProfilAdmin/{id}/update', [UserListController::class, 'update']);
    Route::delete('/userlist/{id}/delete', [UserListController::class, 'destroy']);

    //AVATARS
    Route::get('/avatars', [AvatarController::class, 'index'])->name('avatars');
    Route::post('/avatars/store', [AvatarController::class, 'store']);
    Route::delete('/avatars/{id}/delete', [AvatarController::class, 'destroy']);

    //CATEGORIES
    Route::get('/categories', [CategorieController::class, 'index'])->name('categories');
    Route::post('/categorie/store', [CategorieController::class, 'store']);
    Route::delete('/categorie/{id}/delete', [CategorieController::class, 'destroy']);

    //IMAGES
    Route::get('/images', [ImagesController::class, 'index'])->name('images');
    Route::post('/images/store', [ImagesController::class, 'store']);
    Route::delete('/galerie/{id}/delete', [ImagesController::class, 'destroy']);
    Route::get('/download/{id}',[ImagesController::class, 'download']);

    //ARTICLE
    Route::get("/articleCreate", [ArticleController::class, "create"]);
    Route::post("/articleCreate", [ArticleController::class, "store"]);
    Route::get("/articleEdit/{id}", [ArticleController::class, "show"]);
    Route::delete("/articles/{id}/delete", [ArticleController::class, "destroy"]);
    Route::put("/articleEdit/{id}/update", [ArticleController::class, "update"]);

});


require __DIR__.'/auth.php';
