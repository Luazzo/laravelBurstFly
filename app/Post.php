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
    protected $attributes = [ 'status' => '5055424c4953484544000000000000000000000000000000000',
        'featured'=>0];

	public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }
}
