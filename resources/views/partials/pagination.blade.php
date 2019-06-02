    <div id="wrapper-oldnew">
        <div class="oldnew">

            <!-- Previous Page Link -->
            <div class="wrapper-oldnew-prev">
            @if ($posts->onFirstPage())
                <div class="disabled" id="oldnew-prev"></div>
            @else
                <a href="{{ $posts->previousPageUrl() }}" rel="prev"><div id="oldnew-prev"></div></a>
            @endif
            </div>

            <!-- Pagination Elements -->
            @foreach ($posts as $post)
                <!-- "Three Dots" Separator -->
                @if (is_string($post))
                    <li class="disabled"><span>{{ $post }}</span></li>
                @endif

                <!-- Array Of Links -->
                @if (is_array($post))
                    @foreach ($post as $page => $url)
                        @if ($page == $post->currentPage())
                            <li class="active"><span>{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            <!-- Next Page Link -->
            <div class="wrapper-oldnew-next">
                @if ($posts->hasMorePages())
                    <a href="{{ $posts->nextPageUrl() }}" rel="next"><div id="oldnew-next"></div></a>
                @else
                    <div class="disabled" id="oldnew-next"></div>
                    <script>
                       // $( "#oldnew-next" ).off('touchstart mouseover');
                        $(document).off('touchstart mouseover', '#oldnew-next');//marche pas....
                    </script>
                @endif
            </div>

        </div>
    </div>



