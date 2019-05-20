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
 		 * Affichage des touts les posts
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public static function index()
		{
			$posts = Post::join('categories', 'categories.id', '=','posts.category_id')
							->select('title', 'posts.image', 'posts.slug','categories.image as ctgimage')
							->paginate(8);
			return view('post.index', compact('posts'));
		}
		
		/**
		 * Affichage des posts d'une categorie
		 * @param $slug
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public static function show($slug)
		{
			$posts = Post::where('categories.slug','=', $slug)
							->join('categories', 'categories.id', '=','posts.category_id')
							->select('title', 'posts.image', 'posts.slug','categories.image as ctgimage')
							->paginate(8);
			return view('post.index', compact('posts'));
		}
	}
