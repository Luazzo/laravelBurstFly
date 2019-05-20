<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
	public static function index()
	{
		$categories = DB::table('categories')
							->orderBy('order','DESC')
							->get();
		return $categories;
    }
}
