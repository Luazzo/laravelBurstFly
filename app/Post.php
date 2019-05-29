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
	public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
}
