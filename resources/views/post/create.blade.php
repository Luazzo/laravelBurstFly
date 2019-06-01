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
            <form method="post" action="{{route('post.store')}}" enctype="multipart/form-data" class="form-group">
                titre : <input placeholder="titre de post" name="title" type="text" class="form-control"><br/><br/><br/>
                    @csrf
                <label for="image">image de post : </label>
                <input type="file" name="image" class="form-control"> </br><br/><br/>

                            <div class="icon-file"><img src="{{asset('img/category.jpg')}}" alt="" style="width: 21px;height: 21px;"/>   Category : </div>
                            <select style="margin-top: 8px;" name="category">
                                @foreach(\App\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select><br/><br/>
                        <div class="wrapper-desc">
                            <div class="icon-desc"><img src="{{asset('img/icon-desc.svg')}}" alt="" width="24" height="24"/></div>
                            <textarea class="text-desc"name="body" style="" placeholder="body de post"></textarea>
                        </div>
                        <br/>
                        <input type="submit" class="btn btn-primary form-control" value="cree">
        </form>
    </div>
@stop
