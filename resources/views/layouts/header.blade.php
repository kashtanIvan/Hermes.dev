<div id="back-top">
    <button class="btn"><i class="fa fa-long-arrow-up" aria-hidden="true"></i></button>
</div>

<!-- h-nav begin -->
<section id="h-nav">
    <div class="container">
        <div class="block-auth fl-r">

                <a href="#">Login</a>
                <span class="separator">/</span>
                <a href="#">Registration</a>

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

               <li class="active"><a href="{{ route('home') }}">Home</a></li>
               <li><a href="{{ route('man') }}">Man</a></li>
               <li><a href="{{ route('woman') }}">Woman</a></li>
               <li><a href="{{ route('accessories') }}">Accessories</a></li>
               <li><a href="{{ route('about') }}">About</a></li>

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