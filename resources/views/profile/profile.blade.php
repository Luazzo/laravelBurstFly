@extends ('layouts.layout')

@section('headerLogo')
    <div class="logo"><a href="{{ route( 'home' ) }}"><img src="{{asset('img/logo-burst.png')}}" alt="logo bursty" height="38" width="90"></a></div>
@endsection

@section('title')
    HomePage
@stop

@section('head')
    <link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css'>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <section class="col-md-4 p-2">
                <div class="row">
                    <form method="post" action="{{route('profile.edit')}}" class="form-group" enctype="multipart/form-data">
                        @csrf
                        <figure class="white">
                            <img src="{{ Voyager::image( Auth::user()->avatar ) }}" alt="avatar" style="height: 220px; width:220px; margin: 50px"/><br/>
                        </figure>

                        <input type="file" name="avatar" style="box-sizing: border-box;" class="form-control">
                        <label>Email :</label>
                        <input type="email" name="email" style="box-sizing: border-box;" placeholder="{{auth::user()->email}}" class="form-control">
                        <label>name :</label>
                        <input type="text" name="name" style="box-sizing: border-box;" placeholder="{{auth::user()->name}}" class="form-control"><br/>
                        <input type="submit" value="Modifier" class="btn btn-primary">
                        <input type="hidden" value="{{auth::user()->id}} " name="user_id" class="form-control">
                    </form>
                </div>
                <div class="row" style="margin-top: 40px; float: right; padding-right: 40px;">
                    <a class="btn btn-primary" href="{{url('/password/reset')}}">Changer le Mot de pass</a></br>
                </div>
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </section>
            <aside class="col-md-8">
                    <div id="main-container-image">
                        <section class="work">
                            <div class="row">
                            <h1 style="">Vos posts</h1>
                            <div class="addPost" style="">
                                <a href="{{route('post.create')}}" class="btn btn-primary">Créer un post</a>
                            </div>

                            </div>
                            @foreach($posts as $post)
                                <figure class="white">
                                    <a href="{{route('post.edit',['id'=>$post->id])}}">
                                        <img src="{{ Voyager::image( $post->image ) }}" alt="" />
                                        <dl>
                                            <dt>{{$post->title}}</dt>
                                        </dl>
                                    </a>
                                    <div id="wrapper-part-info">
                                        <div class="part-info-image"><img src="{{ Voyager::image( $post->ctgimage ) }}" alt="" width="28" height="28"/></div>
                                        <div id="part-info">{{ str_limit($post->title,5)}}</div>
                                    </div>
                                </figure>
                            @endforeach
                        </section>
                    </div>
                <!--pagination-->
                {{ $posts->links('partials.pagination', ['posts'=>$posts]) }}
            </aside>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript" src="{{asset('js/indexPost.js')}}"></script>
@endsection