<?php
namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\User;
use Collective\Annotations\Routing\Annotations\Annotations\Get;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $posts=Post::where('author_id',Auth::user()->id)->paginate(8);
        return view('profile',compact('posts'));
    }

}
