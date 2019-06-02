<?php
namespace App\Http\Controllers;
use Collective\Annotations\Routing\Annotations\Annotations\Middleware;
use Illuminate\Support\Facades\DB;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
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
