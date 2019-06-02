<?php

namespace App\Http\Controllers;

use Collective\Annotations\Routing\Annotations\Annotations\Middleware;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Category;
use Illuminate\Support\Facades\DB;
use Collective\Annotations\Routing\Annotations\Annotations\Get;

class CategoryController extends Controller
{

    /**
     * @return \Illuminate\Support\Collection
     * @Middleware("auth")
     */
    public static function index()
	{
		$categories = DB::table('categories')
							->orderBy('order','DESC')
							->get();
		return $categories;
    }
}
