<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// php artisan make:controller MyController
class MyController extends Controller
{
    function index(): string{
        return $this->myfunction();
    }

    function myfunction(): string{
        return "<h1>This is my first controller function</h1>";
    }
}