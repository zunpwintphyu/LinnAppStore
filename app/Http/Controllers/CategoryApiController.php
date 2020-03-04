<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryApiController extends Controller
{
    public function list()
    {
    	$categories = Category::all();

    	 return response()->json($categories, 200);
    }
}
