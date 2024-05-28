<?php

use App\Http\Controllers\API\V1\Book\CreateBookController;
use App\Http\Controllers\API\V1\Book\DeleteBookController;
use App\Http\Controllers\API\V1\Book\GetBookByIdController;
use App\Http\Controllers\API\V1\Book\GetBooksController;
use App\Http\Controllers\API\V1\Book\UpdateBookController;
use App\Http\Controllers\API\V1\Chapter\CreateChapterController;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'v1',
], function ($router) {

    Route::get('hello', function () {
        return response()->json(['message' => 'Hello World!'], 401);
    });

    Route::get('books', [GetBooksController::class, 'index']);
    Route::get('books/{id}', [GetBookByIdController::class, 'show']);
    Route::post('books', [CreateBookController::class, 'store']);
    Route::put('books/{id}', [UpdateBookController::class, 'update']);
    Route::delete('books/{id}', [DeleteBookController::class, 'destroy']);


    Route::post('chapters', [CreateChapterController::class, 'store']);
});
