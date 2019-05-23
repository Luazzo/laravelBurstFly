<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Builder;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;

/**
 * Class Comment
 * @package App
 */
class Comment extends Model
{
    use Translatable,
        Resizable;
	
	/**
	 * @var string
	 */
	protected $table  = "comments";
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $translatable = ['body'];
	
	
	/**
	 * @param array $options
	 * @return bool|void
	 */
	public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        /*if (!$this->user_id && app('VoyagerAuth')->user()) {
            $this->user_id = app('VoyagerAuth')->user()->getKey();
        }*/

        parent::save();
    }
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function userId()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    /**
     * Scope a query to only published scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     
    public function postId()
    {
        return $this->belongsTo(Voyager::modelClass('Post'), 'post_id', 'id');
    }*/
    
    /**
     * Get the post that owns the comment.
     */
    public function postId()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }
     
    
}
