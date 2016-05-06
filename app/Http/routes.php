<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/** ------------------------------------------
 *  Frontend Routes
 *  ------------------------------------------
 */

Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@index']);


/** ------------------------------------------
 *  Admin Routes
 *  ------------------------------------------
 */

Route::group(array('prefix' => 'admin', 'middleware' => 'guest'), function()
{
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'AdminController@dashboard']);
    Route::post('dashboard', ['as' => 'create_image', 'uses' => 'AdminController@create_image']);
    Route::get('delete_image/{id}', ['as' => 'delete_image', 'uses' => 'AdminController@delete_image']);

});
