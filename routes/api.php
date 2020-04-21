<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Cards;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// all of the routes are in the /articles end-point
Route::group(["prefix" => "/cards"], function () {
    // GET /articles: show all articles
    Route::get("", [Cards::class, "index"]);
    // POST /articles: create a new article
    Route::post("", [Cards::class, "store"]);
// all these routes also have an article ID in the
// end-point, e.g. /articles/8
Route::group(["prefix" => "{card}"], function () {
        // GET /articles/8: show the article
        Route::get("", [Cards::class, "show"]);
        // PUT /articles/8: update the article
        Route::put("", [Cards::class, "update"]);
        // DELETE /articles/8: delete the article
        Route::delete("", [Cards::class, "destroy"]);
    });
});
