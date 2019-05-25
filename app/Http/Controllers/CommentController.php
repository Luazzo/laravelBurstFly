<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\User;
use Illuminate\Support\Facades\View;

/**
 * Class CommentController
 * @package App\Http\Controllers
 * @mixin
 */
class CommentController extends Controller
{
	
    /**
     * @param  \Illuminate\Http\Request  $request
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
	
	public static function commentsPost($idPost)
	{ //SELECT * FROM `comments` INNER JOIN `users` ON `comments`.`user_id`=`users`.`id` WHERE `post_id` = 6
        $comments=Comment::where('post_id', $idPost)->get();
	    return  view('comment._commentsPost',compact('comments'));//view('comment._commentsPost',compact('comments'));
		
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Comment::all();
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

    /*public function __construct() {
        $this->middleware('auth');
    }*/
	
	/**
	 * @param Request $request
	 */
	public function store(Request $request)
    {
        //
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
