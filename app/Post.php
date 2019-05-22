<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use \TCG\Voyager\Models\Post as pst;

/**
 * Class Post
 * @package App
 */
class Post extends pst
{
	/**
	 * @param $slug
	 */
	public static function postsOfCategory($slug)
	{
		/*return $this  ->where('categories.slug','=', $slug)
						->join('categories', 'categories.id', '=', 'posts.category_id');*/
						
    }
}
