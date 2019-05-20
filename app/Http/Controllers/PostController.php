<?php
	
	namespace App\Http\Controllers;
	
	use App\Post;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	
	
	class PostController extends Controller
	{
		public static function show($slug)
		{
			$posts = Post::where('categories.slug','=', $slug)
							->join('categories', 'categories.id', '=','posts.category_id')
							->lists('name', 'image', 'slug')
							->get();
			return view('post.index', ['posts'=>$posts]);
		}
	}
