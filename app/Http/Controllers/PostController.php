<?php
	
	namespace App\Http\Controllers;
	
	use App\Post;
	use Illuminate\Support\Facades\Response;
	use Illuminate\Support\Facades\Storage;
	use Illuminate\Support\Facades\Session;
	use Illuminate\Support\Facades\Redirect;
	
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
							->select('title', 'posts.image', 'posts.slug', 'posts.body', 'categories.slug as ctgslug', 'categories.image as ctgimage')
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
							->select('title', 'posts.image', 'posts.slug', 'posts.body', 'categories.image as ctgimage')
							->paginate(4);
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
		
        //retourne la valeur de size de file en bytes -> en Kb, Mb, Gb
		
		/**
		 * @param $id
		 * @return \Illuminate\Http\RedirectResponse
		 */
		public function downloadImage($id) {
            $dl = Post::find($id);
            $src = 'storage/'.$dl->image;
            if(!$this->downloadFile($src)){
            	return redirect()->route('post.show', ['slug' => $dl->slug]);
			}
           // return Response::download('storage/'.$dl->image,$dl->title,['content-type'=>'application/image']);

             //header('Location: /post/'.$dl->slug);
            //$h = header('Location: http://www.example.com/');
            /*if($dl){
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="'.basename('storage/'.$dl->image).'"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize('storage/'.$dl->image));
flush(); // Flush system output buffer
readfile('storage/'.$dl->image);
		        //exit;
            };
          //return   Response::download('storage/'.$dl->image, $dl->name,['redirects'=>redirect()->route('post.show', ['slug' => $dl->slug])])       ;
			if($dl){Storage::disk('voyager')->download($dl->image);};
			return redirect()->back();*/
			//Session::flash('download.in.the.next.request', 'storage/'.$dl->image);

			//return redirect()->route('post.show', ['slug' => $dl->slug]);
			//return response()->download('storage/'.$dl->image, $dl->name, ['location' => '/post/'.$dl->slug]);
		}
		
		protected function downloadFile($src){
			if(is_file($src)){
				$finfo = finfo_open(FILEINFO_MIME_TYPE);
				$content_type = finfo_file($finfo,$src);
				finfo_close($finfo);
				$file_name = basename($src).PHP_EOL;
				$size = filesize($src);
				header("Content-Type: $content_type");
				header("Content-Disposition: attachment; filename=$file_name");
				header("Content-Encoding: binary");
				header("Content-Length: $size");
				readfile($src);
				
				/*header('Content-Description: File Transfer');
				header('Content-Type: application/octet-stream');
				header('Cache-Control: must-revalidate');
				header('Pragma: public');
				header('Content-Transfer-Encoding: binary');
				header('Content-Disposition: attachment; filename="test.txt"');
				header('Content-Length: ' . filesize("test.txt"));
				readfile("test.txt");*/
				return true;
			}else{
				return false;
			}
			
			
		}
	}
