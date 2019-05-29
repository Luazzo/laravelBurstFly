<?php
namespace App\Http\Controllers;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts=Post::where('author_id',$id)->paginate(8);
        return view('profile',compact('posts'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request){
        $rules = [
            'name'       => 'max:55',
            'category'   =>'required',Rule::in(Category::all()),
        ];
        $validator = $request->validate($rules);
        if ($validator) {

            return Redirect::to('post.edit',['id'=>$request->post_id])
                ->withErrors($validator);
        } else {
            $post = Post::find($request->post_id);
            if($request->file('image')!='') {
                Storage::disk('voyager')->delete($post->avatar);
                $post->avatar = $request->file('image')->store('post', 'voyager');
            }
            if($request->title!='')$post->title       = Input::get('title');
            if($request->body!='')$post->email      = Input::get('body');
            if($request->category!='')$post->category      = Input::get('category');

            $post->save();
            // redirect
            return back()->with('success','Item created successfully!');
        }
    }
}
