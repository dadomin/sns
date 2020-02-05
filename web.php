<?php

use Damin\Route;

Route::get("/", "MainController@index");
Route::get("/home", "HomeController@index");
Route::get("/logout", "LoginController@logout");
Route::get("/profile", "ProfileController@index");

Route::post("/register", "LoginController@register");
Route::post("/login", "LoginController@login");