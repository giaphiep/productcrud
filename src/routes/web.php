<?php

Route::get('product/list','ProductController@list')->name('product.list');

Route::resource('product','ProductController');

