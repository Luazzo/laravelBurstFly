<?php
	
	namespace App\Http\Controllers;
	
	use App\Category;
    use App\Post;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Input;
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Session;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Str;


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
							->select('title', 'posts.image', 'posts.slug', 'posts.body', 'categories.image as ctgimage', 'categories.slug as ctgslug')
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
							->select('title', 'posts.image', 'posts.slug', 'posts.body', 'categories.image as ctgimage', 'categories.slug as ctgslug')
							->paginate(4);

			dd($posts);
			return view('post.index', compact('posts'));
		}

        /**
         * @param $slug
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         *
         */
        public function show($slug)
        {
            $post = Post::where('slug', $slug)->firstOrFail();

            //retourne size de file
            $size = filesize('storage/'.$post->image); // Storage::size($path) ne fonctionne pas

            //convertie size en valeur plus comprehensible
            $sizeImg = self::human_filesize($size, $decimals = 2);

            return view('post.show', compact('post', 'sizeImg'));
        }

        /**
         * @param $id
         * @param $name
         * @param $post
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
        public static function similars($id, $name, $post){
            $posts=Post::where('category_id',$id)->get();
            return view('post._similars',compact('posts','name','post'));
        }

        //retourne la valeur de size de file en bytes -> en Kb, Mb, Gb

        /**
         * @param $bytes
         * @param int $decimals
         * @return string
         */
        public function human_filesize($bytes, $decimals = 2) {
            $factor = floor((strlen($bytes) - 1) / 3);
            if ($factor > 0) $sz = 'KMGT';
            return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor - 1] . 'B';
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
        public function store(Request $request){
            $ctgr=Category::pluck('id');
            $rules = [
                'name'       => 'max:55',
            ];
            $validator = $request->validate($rules);
            if ($validator) {

                return back()->withErrors($validator);
            } else {
                if($request->file('image')!=null){$post_image = $request->file('image')->store('posts', 'voyager');}
                if($request->title!=''){ $post_title= Input::get('title');}
                if($request->body!=''){$post_body= Input::get('body');}
                if($request->category!=''){$post_category_id= Input::get('category');}
                Post::create(['title'=>$post_title,'slug'=>Str::slug($post_title, '-'),'body'=>$post_body,'image'=>$post_image,'category_id'=>$post_category_id,'author_id'=>Auth::user()->id]);
                // redirect
                return Redirect::to('profile/'.Auth::user()->id)->with('success','Item updated successfully!');
            }
        }

        /**
         * @param \Illuminate\Http\Request $request
         * @return \Illuminate\Http\RedirectResponse
         */
        public function valid(Request $request){
            $ctgr=Category::pluck('id');
            $rules = [
                'name'       => 'max:55',
            ];
            $validator = $request->validate($rules);
            if ($validator) {

                return back()->withErrors($validator);
            } else {
                $post = Post::find($request->post_id);
                if($request->file('image')!='') {
                    Storage::disk('voyager')->delete($post->image);
                    $post->image = $request->file('image')->store('posts', 'voyager');
                }
                if($request->title!='')$post->title       = Input::get('title');
                if($request->body!='')$post->body     = Input::get('body');
                if($request->category!='')$post->category_id      = Input::get('category');

                $post->save();
                // redirect
                return back()->with('success','Item created successfully!');
            }
        }

        /**
         * @param $id
         * @return \Illuminate\Http\RedirectResponse
         */
        public function destroy($id){
            // delete
            $post = Post::find($id);
            $post->delete();

            // redirect
            Session::flash('message', 'le post est bien supprime!');
            return Redirect::to('profile/'.Auth::user()->id);
        }

        /**
         * @param $id
         * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
         */
        public function download($id){
            $post=Post::find($id);;
            $img='storage/'.$post->image;
            return response()->download($img,basename($img),['location'=>'/post/show/'.$post->slug]);
        }

        /**
         * @return \Illuminate\Http\RedirectResponse
         */
        public function showWithDownload(){
            Session::flash('download', 'true');
            return back();
        }
        public function search(Request $request){
            $key=Input::get('search');
            $post= Post::where('title', 'LIKE','%'.$key.'%')
                ->first();
            //retourne size de file
            $size = filesize('storage/'.$post->image); // Storage::size($path) ne fonctionne pas
            //convertie size en valeur plus comprehensible
            $sizeImg = self::human_filesize($size, $decimals = 2);
            return view('post.show', compact('post', 'sizeImg'));
        }
	}
