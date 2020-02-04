<?php

use Damin\Route;

Route::get("/", "MainController@index");

Route::post("/register", "LoginController@register");
Route::post("/login", "LoginController@login");
Route::post("/logout", "LoginController@logout");