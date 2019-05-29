<?php
	
	namespace App\Http\Controllers;
	
	use App\Post;
    use Collective\Annotations\Routing\Annotations\Annotations\Get;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;


    /**
	 * Class PostController
	 * @package App\Http\Controllers
	 */
	class PostController extends Controller
	{
		/**
 		 * Affichage des touts les posts
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public static function index()
		{
			$posts = Post::join('categories', 'categories.id', '=','posts.category_id')
							->select('title', 'posts.image', 'posts.slug','categories.image as ctgimage')
							->paginate(8);
			return view('post.index', compact('posts'));
		}
		
		/**
		 * Affichage des posts d'une categorie
		 * @param $slug
		 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
		 */
		public static function indexByCategory($slug)
		{
			$posts = Post::where('categories.slug','=', $slug)
							->join('categories', 'categories.id', '=','posts.category_id')
							->select('title', 'posts.image', 'posts.slug','categories.image as ctgimage')
							->paginate(4);
			return view('post.index', compact('posts'));
		}

        public static function similars($id,$name,$post){
            $posts=Post::where('category_id',$id)->get();
		    return view('post._similars',compact('posts','name','post'));
        }

        /**
         * @Get("post/{sloug}",as="post.show")
         * @param $slug
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public static function show ($slug)
        {
            $post = Post::where('slug', $slug)->firstOrFail();
            return view('post.show', compact('post'));
        }

        /**
         * @param $id
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function edit($id)
        {
            $post=Post::find($id);
            return view ('post.edit',compact('post'));

        }

        /**
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public function create()
        {
            return view ('post.create');
        }


        /**
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function valid(Request $request){
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
        public function destroy($id){
            // delete
            $post = Post::find($id);
            $post->delete();

            // redirect
            Session::flash('message', 'le post est bien supprime!');
            return Redirect::to('profile',['id'=>Auth::user()->id]);
        }
	}
