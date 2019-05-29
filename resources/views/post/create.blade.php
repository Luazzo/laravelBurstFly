@extends ('layouts.layout')
@section('headerLogo')
    <a href="{{route('home')}}"><div id="logo"><img src="{{asset('img/logo-burst.svg')}}" alt="logo burstfly" height="38" width="90"></div></a>
@endsection
@section('title')
    Post-edit
@endsection
@section('head')
    <link href="{{asset('css/app.css')}}" rel='stylesheet' type='text/css'>
@endsection
@section ('content')
    <div class="container object">
        <div id="main-container-image">
            <form method="post" action="{{route('post.create')}}" enctype="multipart/form-data" class="form-group">
            <div class="title-item">
                <input placeholder="{{$post->title}}" name="title" type="text" class="form-control">
            </div>
            <div class="work">
                    @csrf
                <input type="file" class="form-control">
                    <div class="wrapper-text-description">
                        <div class="wrapper-file">
                            <div class="icon-file"><img src="{{asset('img/category.jpg')}}" alt="" style="width: 21px;height: 21px;"/>   Category : </div>
                            <select style="margin-top: 8px;" name="category">
                                @foreach(\App\Category::all()->pluck('name') as $category)
                                    <option value="{{$category}}"
                                            @if($category == $post->category->name)
                                            selected="selected"
                                            @endif
                                    >{{$category}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="wrapper-desc">
                            <div class="icon-desc"><img src="{{asset('img/icon-desc.svg')}}" alt="" width="24" height="24"/></div>
                            <textarea class="text-desc"name="body" style="">{!! $post->body !!}</textarea>
                        </div>
                        <br/>
                        <input type="submit" class="btn btn-primary form-control" value="cree">
                    </div>
            </div>
        </form>
    </div>
@stop
