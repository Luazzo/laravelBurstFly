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
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['category'];
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
