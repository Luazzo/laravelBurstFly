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
        return view('profile.profile',compact('posts'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request){
        $rules = [
            'title'       => 'max:255',
        ];
        $validator = $request->validate($rules);
        if ($validator) {

            return Redirect::to('profile.edit',['id'=>$request->user_id])
                ->withErrors($validator);
        } else {
            $user = User::find($request->user_id);
            if($request->file('avatar')!='') {
                Storage::disk('voyager')->delete($user->avatar);
                $user->avatar = $request->file('avatar')->store('users', 'voyager');
            }
            if($request->name !='')$user->name       = Input::get('name');
            if($request->email!='')$user->email      = Input::get('email');

            $user->save();
            // redirect
            return back()->with('success','Item created successfully!');
        }
    }
}
