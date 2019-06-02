<?php
use App\Http\Controllers\CategoryController;
$categories = CategoryController::index();
?>
<a name="ancre"></a>

<!-- CACHE -->
<div class="cache"></div>

<!-- HEADER -->
<div id="wrapper-header">
    <div id="main-header" class="object">

        @yield('headerLogo')

        <div id="main_tip_search">
            <form method="post" action="{{route('post.search')}}">
                @csrf
                <input type="text" name="search" id="tip_search_input" list="search" autocomplete=off required>
                <input class="btn btn-primary" type="submit" value="Go!" name="submit">
            </form>
        </div>
        <div id="stripes"></div>
    </div>
</div>

<!-- NAVBAR -->
<div id="wrapper-navbar">
    <div class="navbar object">

        <div id="wrapper-bouton-icon" style="display: inline;">


            @foreach($categories as $category)

                <div class="bouton-ai"  data-filter=".{{$category->slug}}">
                    <a href="{{ route( 'category.posts', ['slug' => $category->slug] ) }}">
                        <img src="{{ Voyager::image( $category->image ) }}" alt="{{ $category->name }}" title="{{ $category->name }}" height="28" width="28">
                    </a>
                </div>

            @endforeach


            @guest
                <div class="bouton-log">
                    <a href="{{ route('register')}}">
                        <img src="{{ asset('img/register.png') }}" alt="register.png" title="Register" height="28" width="28">
                    </a>
                </div>
                <div class="bouton-log">
                    <a href="{{ route('login')}}">
                        <img src="{{ asset('img/login.png') }}" alt="login.png" title="Login" height="28" width="28">
                    </a>
                </div>
            @else
                <div class="bouton-log">
                    <a href="{{ route('profile', auth()->id()) }}">
                        <img src="{{ asset('img/profile.png') }}" alt="profile.png" title="Profil" height="28" width="28">
                    </a>
                </div>
                <div class="bouton-log">
                    <a href="{{ route('logout')}}">
                        <img src="{{ asset('img/logout.png') }}" alt="logout.png" title="Logout" height="28" width="28">
                    </a>
                </div>
            @endguest
        </div>
    </div>
</div>
