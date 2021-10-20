<?php
use think\facade\Route;

Route::get('jsby/:id', 'portal/Article/index')->name('portal/Article/index?cid=1')->append(array('cid' => '1',));

Route::get('jsby', 'portal/List/index')->name('portal/List/index?id=1')->append(array('id' => '1',));


