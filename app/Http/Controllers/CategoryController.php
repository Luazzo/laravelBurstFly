<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends Controller

{
	/**
	 * @return \Illuminate\Support\Collection
	 */
	public static function index()
	{
		$categories = DB::table('categories')
							->orderBy('order','DESC')
							->get();
		return $categories;
    }
}
