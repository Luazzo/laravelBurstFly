<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Post extends \TCG\Voyager\Models\Post
{
	public static function postsOfCategory($slug)
	{
		/*return $this  ->where('categories.slug','=', $slug)
						->join('categories', 'categories.id', '=', 'posts.category_id');*/
						
    }
}
