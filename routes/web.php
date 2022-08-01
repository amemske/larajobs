<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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
//All listings
Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest Listings',
        'listings' => Listing::all() //method inside eloquence
    ]);
});

//Single Listing
//Method 1
// Route::get('/listings/{id}', function ($id) {
//     /* return view('listing', [
//         'listing' => Listing::find($id)  //method inside eloquence
//     ] */
// $listing =   Listing::find($id);
// if($listing) {
//     return view('listing', [
//         'listing' => $listing  //method inside eloquence
//     ]);
// }
// else {
//     abort('404');
// }
// });
//Method 2 = Route Model Binding
Route::get('/listings/{listing}', function (Listing $listing) {
    return view('listing', [
        'listing' => $listing
    ]);
});

/* Route::get('/hello', function () {
    return response('<h1>Hello world</h1>', 200)
        ->header('Content-type', 'text/html')
        ->header('foo', 'bar'); //custom response headers
});

Route::get('/posts/{id}', function ($id) {
    return response('Post ' . $id);
})->where('id', '[0-9]+'); // regular expression to limit to only numbers

Route::get('/search', function (Request $request) { ///search?name=Antony&city=nairobi
    // dd($request->city  . ' ' . $request->name); //dd for debugging very POWERFUL
    return ($request->city  . ' ' . $request->name);
}); */