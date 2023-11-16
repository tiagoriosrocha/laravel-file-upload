<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;

//Upload simples de arquivos
//link do tutorial: https://larainfo.com/blogs/laravel-9-image-file-upload-example
Route::get('/image', [ImageController::class,'index']);
Route::post('/image', [ImageController::class,'store']);

//Upload de arquivos com crop
//link do tutorial: https://hdtuto.com/article/-laravel-10-crop-image-before-upload-using-cropper-js
Route::get('/image2', [ImageController::class,'index2']);
Route::post('image2', [ImageController::class, 'store2']);
Route::post('/post2',[PostController::class, 'store2']);

//Upload de arquivos com drag and drop
//link do tutorial: https://medium.com/@eriktailor/laravel-10-dropzone-image-upload-with-other-form-fields-and-validation-3727ca08e746
Route::get('/image3', [ImageController::class,'index3']);
Route::post('submit-imagem-post', [ImageController::class, 'store3']);


