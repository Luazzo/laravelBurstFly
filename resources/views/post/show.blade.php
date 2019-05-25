@extends ('layouts.layout')

@section('headerLogo')
    <a href="{{route('home')}}"><div id="logo"><img src="img/logo-burst.svg" alt="logo burstfly" height="38" width="90"></div></a>
@endsection

@section('title')
    PostShow
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


            </div>
        </div>
        <div class="col-md-2">
            @comments(['model' => $post])
            @endcomments
        </div>
    </div>
@stop


@section('script')
@endsection