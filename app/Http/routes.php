<?php

use App\Order;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'OrderController@orders');
    Route::post('/order', 'OrderController@neworder');
    Route::post('/order/edit/{id}', 'OrderController@editorder');
    Route::post('/order/delete/{id}', 'OrderController@deleteorder');
});