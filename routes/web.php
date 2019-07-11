<?php

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


/*
    Sites available for guests
*/
Auth::routes();
Route::get('login/{service}', 'Auth\LoginController@redirectToProvider')->name('login.social');
Route::get('callback/{service}', 'Auth\LoginController@handleProviderCallback');
Route::get('test/provider', 'Auth\LoginController@testProvider');

   
Route::get('/', 'GuestController@index')->name('home')->middleware('guest');
Route::get('/home', 'GuestController@index')->name('home');
Route::get('/playGame/{index}', 'GuestController@playGame')->name('play.game');

Route::get('/getGame', 'GuestController@getGame')->name('get.game');

/*
    Sites available for  basic member
*/
Route::post('/load/sidebar', 'HomeController@loadSideBar')->name('load.sideBar');


/*
    Sites available for  basic members
*/



/*
    Sites available for  premium members
*/



/*
    Sites available for  admin
*/








Route::get('/lexikon', 'HomeController@lexikon')->name('lexikon');
Route::get('/alt', 'HomeController@alt')->name('alt');
Route::get('/getSolutions/{index}', 'HomeController@getSolutions')->name('getSolutions');
Route::get('/userlanding', 'GuestController@UserLandingPage')->name('user.landingpage');


Route::post('/load/practice', 'HomeController@loadPractice')->name('load.practice');
Route::get('/lektion/{lection}', function($lection) {
    return View::make('lex_html.'.$lection);
});
Route::get('/getimage/{img}', 'GuestController@getImage')->name('get.image');
Route::post('/load/table', 'HomeController@loadPracticeTable')->name('load.table');
Route::get('/return/{html}', function($html) {
    $str=file_get_contents(base_path("resources/views/html/".$html));
    return $str;
})->name('load.html');

