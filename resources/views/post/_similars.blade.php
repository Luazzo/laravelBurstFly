<div class="wrapper-morefrom">
    <div class="text-morefrom">More from {{$name}} </div>
    <div class="image-morefrom">
        @foreach ($posts->slice(1,4) as $pst)
            @if($pst->id!=$post)
                    <a href="{{route('postShow',['slug'=>$pst->slug])}}">
                        <div class="image-morefrom-{{$loop->iteration}}">
                            <img src="{{ Voyager::image( $pst->image ) }}" alt="{{$pst->slug}}" width="430" height="330"/>
                        </div>
                    </a>
            @endif
        @endforeach
    </div>
</div>