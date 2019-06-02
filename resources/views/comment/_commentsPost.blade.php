@if(count($comments )>0)
    @foreach ($comments as $comment)
        @if($loop->first)
            <div class="post-reply">
        @else
            <div class="post-reply-2">
        @endif
                <div class="image-reply-post"><img src="{{ Voyager::image( $comment->user->avatar ) }}" alt="comment"></div>
                <div class="name-reply-post-2">{{$comment->user->name}}</div>
                <div class="text-reply-post-2">{{$comment->body}}</div>
            </div>
    @endforeach
@endif
