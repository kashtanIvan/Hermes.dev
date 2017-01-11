@extends('layouts.app')

@section('title')
   Home PAGE
@endsection
@section('banner')
    <!-- main-banner begin -->
    <section id="main-banner">
        <!-- Swiper -->
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="container">
                        <div class="block1">
                            <h3>design.</h3>
                            <p class="brown">best & creative</p>
                            <p class="small">It’s a long established... fact that a reader will be distracted.</p>
                            <a href="#" class="btn">view now</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="container">
                        <div class="block1">
                            <h3>design.</h3>
                            <p class="brown">best & creative</p>
                            <p class="small">It’s a long established... fact that a reader will be distracted.</p>
                            <a href="#" class="btn">view now</a>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="container">
                        <div class="block1">
                            <h3>design.</h3>
                            <p class="brown">best & creative</p>
                            <p class="small">It’s a long established... fact that a reader will be distracted.</p>
                            <a href="#" class="btn">view now</a>
                        </div>
                    </div>
                </div>


            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>

            <!-- Add Arrows -->
            <div class="swiper-button-next"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></div>
            <div class="swiper-button-prev"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></div>
        </div>
    </section>
    <!-- main-banner end -->
@endsection



@section('content')
    <!-- product-list begin -->
    <section class="product-list">

        <div class="section-head">
            <h2>Hello Hermes</h2>
            <p class="small">Some text</p>
        </div>

        <div class="category-list clearfix">
            <ul class="list">
                <li class="active"><a href="#">All</a></li>

                <li ><a href="#">Some Category</a></li>


            </ul>
        </div>

        <div class="row">


                    <div class="item">
                        <div class="thumb no-img">
                            <div class="shares">
                                <span class="new">New</span>

                            </div>

                            <div class="quick-view">
                                <button class="btn" data-articul="">Quick view</button>
                            </div>
                        </div>
                        <div class="name">
                            <a href="#"></a>
                        </div>
                        <div class="price">
                            <span class="current-price"> $ </span> <span class="old-price">$ </span>
                        </div>

                        <div class="actions clearfix">
                            <button data-articul="#" class="btn btn-buy fl-l"><i class="fa fa-plus" aria-hidden="true"></i> ADD TO CART</button>
                            <button data-articul="#" class="btn btn-addtowishlist fl-r"><i class="fa fa-heart-o" aria-hidden="true"></i></button>
                            <button data-articul="#" class="btn btn-addtocompare fl-r"><i class="fa fa-compress" aria-hidden="true"></i></button>
                        </div>
                    </div>

        </div>
    </section>

@endsection