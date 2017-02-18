@inject('menus', 'App\Services\MainMenuService')
<div id="back-top">
    <button class="btn"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></button>
</div>

<!-- h-nav begin -->
<section id="h-nav">
    <div class="container">
        <div class="block-auth fl-r">
            @if(!Sentinel::check())
                <a href="{{ route('login') }}">Login</a>
                <span class="separator">/</span>
                <a href="{{ route('register') }}">Registration</a>
            @else
                <a href="{{ route('logout') }}">Logout</a>
                <span class="separator">/</span>
                <a href="{{ route('profile') }}">Profile</a>
            @endif
        </div>
    </div>
</section>
<!-- h-nav end -->


<!-- header begin -->
<header id="header">
    <div class="container">
        <a href="{{ route('home') }}">
            <div class="logo">
                HERMES
            </div>
        </a>
        <div class="menu">
            <ul class="main-menu">
                @foreach($menus->getMenus() as $menu)
                    <li @if(Route::currentRouteName() === $menu->slug)
                        class="active"
                            @endif
                    ><a href="{{ route($menu->slug) }}">{{ $menu->name }}</a></li>
                @endforeach
            </ul>
        </div>
        <div class="icon-menu">
            <div class="clearfix">
                <a href="#">
                    <div class="cart fl-r">
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                    <span class="counts">

                    </span>
                    </div>
                </a>

                <div class="search fl-r">
                    <i class="fa fa-search" aria-hidden="true"></i>
                </div>


            </div>

        </div>
    </div>
</header>
<!-- header end -->