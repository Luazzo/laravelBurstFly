<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;

/**
 * Class CommentController
 * @package App\Http\Controllers
 * @mixin
 */
class CommentController extends Controller
{

    /**
     * @param \Illuminate\Http\Request $request
     * @return \App\Comment
     */
    public function addComment(Request $request)
    {
    	try{
	        //$post = Post::findOrFail($request->post_id);
	        $comment = new Comment;
	        $comment->body = $request->input('body');
	        $comment->user_id = $request->input('user');
	        $comment->post_id = $request->input('post');
	        $comment->save();

	        $user = User::find($comment->user_id);

	        return $user;
	    }
	    catch(\Exception $e){
			// do task when error
			 $e->getMessage();   // insert query
	    }
    }

    /**
     * @param $idPost
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function commentsPost($idPost)
	{ //SELECT * FROM `comments` INNER JOIN `users` ON `comments`.`user_id`=`users`.`id` WHERE `post_id` = 6
        $comments=Comment::where('post_id', $idPost)->get();
	    return  view('comment._commentsPost',compact('comments'));//view('comment._commentsPost',compact('comments'));
		
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static  function create()
    {
        return view('comment.create');
    }

}

