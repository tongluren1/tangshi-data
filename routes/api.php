<?php

Route::group(['prefix' => 'tangshi'], function() {
    Route::get('list', 'ApiController@index');
});