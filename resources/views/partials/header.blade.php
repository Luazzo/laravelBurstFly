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
            <form>
                <input type="text" name="search" id="tip_search_input" list="search" autocomplete=off required>
            </form>
        </div>
        <div id="stripes"></div>
    </div>
</div>

<!-- NAVBAR -->
<div id="wrapper-navbar">
    <div class="navbar object">

        <div id="wrapper-bouton-icon">


            @foreach($categories as $category)

                <div class="bouton-ai"  data-filter=".{{$category->slug}}">
                    <a href="{{ route( 'category.posts', ['slug' => $category->slug] ) }}">
                        <img src="{{ Voyager::image( $category->image ) }}" alt="{{ $category->name }}" title="{{ $category->name }}" height="28" width="28">
                    </a>
                </div>

            @endforeach
            @guest
            @else
                <div id="bouton-ai">
                    <a href="{{ route('profile', auth()->id()) }}">
                        <img src="{{ asset('img/profile.png') }}" alt="user-profile" title="user-profile" height="28" width="28">
                    </a>
                </div>
            @endguest
        </div>
    </div>
</div>

<!-- FILTER -->

<div id="main-container-menu" class="object">
    <div class="container-menu">

        <div id="main-cross">
            <div id="cross-menu"></div>
        </div>

        <div id="main-small-logo">
            <div class="small-logo"></div>
        </div>

        <div id="main-premium-ressource">
            <div class="premium-ressource"><a href="#">Premium resources</a></div>
        </div>

        <div id="main-themes">
            <div class="themes"><a href="#">Latest themes</a></div>
        </div>

        <div id="main-psd">
            <div class="psd"><a href="#">PSD goodies</a></div>
        </div>

        <div id="main-ai">
            <div class="ai"><a href="#">Illustrator freebies</a></div>
        </div>

        <div id="main-font">
            <div class="font"><a href="#">Free fonts</a></div>
        </div>

        <div id="main-photo">
            <div class="photo"><a href="#">Free stock photos</a></div>
        </div>

    </div>
</div>