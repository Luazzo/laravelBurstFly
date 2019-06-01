@extends ('layouts.layout')

@section('headerLogo')
    <a href="{{route('home')}}"><div id="logo"><img src="img/logo-burst.svg" alt="logo burstfly" height="38" width="90"></div></a>
@endsection

@section('title')
    Post-show
@endsection

@section('head')
    <link href="{{asset('css/app.css')}}" rel='stylesheet' type='text/css'>
@endsection
@section ('content')

    <div class="container object">

        <div id="main-container-image">

            <div class="title-item">
                <div class="title-icon" style="background: url({{Voyager::image( $post->category->image ) }} ) no-repeat; background-size: 68px 68px; "></div>
                <div class="title-text">{{$post->title}}</div>
                <div class="title-text-2">{{$post->created_at->format('M d, Y')}} by {{$post->authorId->name}}</div>
            </div>


            <div class="work">
                <figure class="white">
                    <img src="{{ Voyager::image( $post->image ) }}" alt="{{$post->title}}" />

                </figure>

                <div class="wrapper-text-description">


                    <div class="wrapper-file">
                        <div class="icon-file"><img src="{{asset('img/icon-psdfile.svg')}}" alt="" width="21" height="21"/></div>
                        <div class="text-file">{{$post->category->name}}</div>
                    </div>

                    <div class="wrapper-weight">
                        <div class="icon-weight"><img src="{{asset('img/icon-weight.svg')}}" alt="" width="20" height="23"/></div>
                        <div class="text-weight">{{$post->featured}}</div>
                    </div>

                    <div class="wrapper-desc">
                        <div class="icon-desc"><img src="{{asset('img/icon-desc.svg')}}" alt="" width="24" height="24"/></div>
                        <div class="text-desc">{!! $post->body !!}</div>
                    </div>

                    <div class="wrapper-download">
                        <div class="icon-download"><img src="{{asset('img/icon-download.svg')}}" alt="" width="19" height="26"/></div>
                        <div class="text-download"><a href="#"><b>Download</b></a></div>
                    </div>
                    {!! \App\Http\Controllers\PostController::similars($post->category->id,$post->category->name,$post->id) !!}
                </div>

                <!--COMMENTS LIST-->
                {!! \App\Http\Controllers\CommentController::commentsPost($post->id) !!}


                @auth
                    <div class="post-send">
                        <div id="main-post-send">
                            <div id="title-post-send">Add your comment</div>
                            <form id="contact" method="post" action="{{ route('login') }}">
                                @csrf
                                <input id="user" name="user" type="hidden" value="{{Auth::user()->id}}">
                                <input id="post" name="post" type="hidden" value="{{$post->id}}">
                                <fieldset>
                                    <p><textarea id="body" name="body" maxlength="500" placeholder="Votre Message" tabindex="5" cols="30" rows="4"></textarea></p>
                                </fieldset>
                                <div style="text-align:center;"><input type="submit" name="envoi" value="Envoyer" /></div>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <div class="post-send">
                        <div id="main-post-send">
                            <div id="title-post-send">Pour mettre un comment il faut se logger</div>
                            <form id="login" method="get" action="{{ route('login') }}">
                                @csrf
                                <input type="submit" name="envoi" value="Se logger" />
                            </form>
                        </div>
                    </div>
                @endguest

            </div>
        </div>

    </div>
@stop


@section('script')
    <script type="text/javascript" src="{{asset('js/showPost.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/ajaxComment.js')}}"></script>
@endsection