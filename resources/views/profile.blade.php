@extends ('layouts.layout')

@section('headerLogo')
    <div class="logo"><a href="{{ route( 'home' ) }}"><img src="{{asset('img/logo-burst.png')}}" alt="logo bursty" height="38" width="90"></a></div>
@endsection

@section('title')
    HomePage
@stop

@section('head')
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css'>
@endsection

@section ('content')
    <div class="container">
        <div class="row">
            <section class="col-md-4 p-2">
                <form method="post" action="{{route('profile.edit')}}" class="form-group" enctype="multipart/form-data">
                    @csrf
                    <figure class="white">
                        <img src="{{ Voyager::image( Auth::user()->avatar ) }}" alt="avatar" style="height: 120px;width:120px ; margin: 50px"/><br/>
                        <input type="file" name="avatar" class="form-control">
                        <label>Email :</label>
                        <input type="email" name="email" placeholder="{{auth::user()->email}}" class="form-control">
                        <label>name :</label>
                        <input type="text" name="name" placeholder="{{auth::user()->name}}" class="form-control"><br/>
                        <input type="submit" value="modifier" class="btn btn-primary">
                        <input type="hidden" value="{{auth::user()->id}} " name="user_id" class="form-control">
                    </figure>
                </form>
                <a class="btn btn-primary" href="{{url('/password/reset')}}">Changer le Mot de pass</a></br>
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
                <div class="wrapper-navbouton">
                    <a href="{{route('post.create')}}" class="btn btn-primary">creer un post</a>
                </div>
                    <div id="main-container-image">
                        <section class="work">
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