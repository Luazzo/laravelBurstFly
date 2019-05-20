<?php
	
	namespace App\Http\Controllers;
	
	use App\Post;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	
	
	/**
	 * Class PostController
	 * @package App\Http\Controllers
	 */
	class PostController extends Controller
	{
		/**
		 * Affichage des posts d'une categorie
		 * @param $slug
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public static function show($slug)
		{
			$posts = Post::where('categories.slug','=', $slug)
							->join('categories', 'categories.id', '=','posts.category_id')
							->lists('name', 'image', 'slug')
							->get();
			return view('post.index', ['posts'=>$posts]);
		}
	}
