@extends ('layout')


@section ('content')
    <div class="container object">

        <div id="main-container-image">
            <section class="work">

                @foreach($posts as $post)
                    <figure class="white">
                        <a href="#">
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
    <div id="wrapper-oldnew">
        <div class="oldnew">
            <div class="wrapper-oldnew-prev">
                <div id="oldnew-prev"></div>
            </div>
            <div class="wrapper-oldnew-next">
                <div id="oldnew-next"></div>
            </div>
        </div>
    </div>

    <!--platz-->
    <div id="wrapper-thank">
        <div class="thank">
            <div class="thank-text">pl<span style="letter-spacing:-5px;">a</span>tz</div>
        </div>
    </div>
@endsection