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
            <p>Merci de votre enregistrement</p>
        </div>
    </div>
@stop