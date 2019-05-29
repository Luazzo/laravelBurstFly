<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

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
            return $comment;
        }
        catch(\Exception $e){
            // do task when error
            $e->getMessage();   // insert query
        }
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

