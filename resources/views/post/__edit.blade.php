<div id="main-container-image">
            <div class="title-item">
                <div class="title-icon" style="background: url({{Voyager::image( $post->category->image ) }} ) no-repeat; background-size: 68px 68px; "></div>
                <div class="title-text"><input placeholder="{{$post->title}}" name="title" class="form-control"  type="text"> </div>
                <div class="title-text-2">{{$post->created_at->format('M d, Y')}} by {{$post->authorId->name}}</div>
            </div>
            <div class="work">
                <form method="post" action="{{route('post.valid')}}" enctype="multipart/form-data" class="form-group">
                    <input name="post_id" type="hidden" value="{{$post->id}}">
                    @csrf
                <figure class="white">
                    <img src="{{ Voyager::image( $post->image ) }}" alt="{{$post->title}}" />
                    <br/><figcaption><input type="file" class="form-control" name="image"></figcaption>
                </figure>
                <div class="wrapper-text-description">
                    <div class="wrapper-file">
                        <div class="icon-file"><img src="{{asset('img/category.jpg')}}" alt="" style="width: 21px;height: 21px;"/>   Category : </div>
                        <select style="margin-top: 8px;" class="form-control" name="category">
                            @foreach(\App\Category::all() as $category)
                                <option value="{{$category->id}}"
                                    @if($category == $post->category)
                                    selected="selected"
                                    @endif
                                >{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="wrapper-desc">
                        <div class="icon-desc"><img src="{{asset('img/icon-desc.svg')}}" alt="" width="24" height="24"/></div>
                        <textarea class="text-desc"name="body" class="form-control" style="">{!! $post->body !!}</textarea>
                    </div>
                    <br/>
                    <input type="submit" class="btn btn-primary form-control" value="modifier">
                </div>
            </form>
            </div>
            <div class="wrapper-navbouton">
                <form action="{{route('post.delete',$post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" style="background-color: #e3342f;" value="Supprimer">
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
                </form>
            </div>
        </div>
<form method="post" action="{{route('post.valid')}}" enctype="multipart/form-data" class="form-group">
            <div class="row">
                <section class="col-md-6 p-2">
                    <figure class="white">
                        <img style=" width:535px; margin: 50px" src="{{ Voyager::image( $post->image ) }}" alt="{{$post->title}}" />
                        <br/><figcaption><input type="file" class="form-control" name="image"></figcaption>
                    </figure>
                </section>
                <aside class="col-md-6">
                    <div class="title-item">
                        <div class="title-icon" style="background: url({{Voyager::image( $post->category->image ) }} ) no-repeat; background-size: 68px 68px; "></div>
                        <div class="title-text"><input placeholder="{{$post->title}}" name="title" class="form-control"  type="text"> </div>
                        <div class="title-text-2">{{$post->created_at->format('M d, Y')}} by {{$post->authorId->name}}</div>
                    </div>
                </aside>
            </div>
        </form>