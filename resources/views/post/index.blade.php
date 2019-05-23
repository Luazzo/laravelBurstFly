@extends ('layouts.layout')

@section('headerLogo')
    <div class="logo"><a href="{{ route( 'index' ) }}"><img src="img/logo-burst.png" alt="logo bursty" height="38" width="90"></a></div>
@endsection

@section('title')
    HomePage
@stop

@section('head')
    <link href="{{asset('css/style.css')}}" rel='stylesheet' type='text/css'>
@endsection

@section ('content')
    <div class="container object">

        <div id="main-container-image">
            <section class="work">

                @foreach($posts as $post)
                    <figure class="white">
                        <a href="{{route('postShow',['slug'=>$post->slug])}}">
                            <img src="{{ Voyager::image( $post->image ) }}" alt="" />
                            <dl>
                                <dt>{{ $post->title }}</dt>
                                <dd>{!! $post->body !!}</dd>
                            </dl>
                        </a>
                        <div id="wrapper-part-info">
                            <div class="part-info-image"><img src="{{ Voyager::image( $post->ctgimage ) }}" alt="" width="28" height="28"/></div>
                            <div id="part-info">{{$post->title}}</div>
                        </div>
                    </figure>
                @endforeach

            </section>

        </div>

    </div>


    <!--pagination-->
    {{ $posts->links('partials.pagination', ['posts'=>$posts]) }}


    <!--platz-->
    <div id="wrapper-thank">
        <div class="thank">
            <div class="thank-text">pl<span style="letter-spacing:-5px;">a</span>tz</div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript" src="{{asset('js/indexPost.js')}}"></script>
@endsection