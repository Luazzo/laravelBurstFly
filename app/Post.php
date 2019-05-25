<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;
use \TCG\Voyager\Models\Post as pst;

/**
 * Class Post
 * @package App
 */
class Post extends pst
{
    use Commentable;

}
