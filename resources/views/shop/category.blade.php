@extends('layouts.app')

@section('title')
    {{$title}}
@endsection

@section('breadcrumbs')
    @include('layouts.breadcrumbs')
@endsection

@section('content')
    <section class="category-description">
        <div class="thumb no-img">

        </div>
    </section>




        <section class="sortBar">
            <p class="results-showing"><span>Showing 1-12 of 30 relults</span></p>
        </section>
        <!-- product-list begin -->
        <section class="product-list">
            <div class="row">

                    <div class="item">
                        <div class="thumb no-img">
                            <div class="shares">
                                <span class="new">New</span>

                            </div>

                            <div class="addtocart">
                                <button data-articul="" class="btn btn-addtocart">Add to cart</button>
                            </div>
                        </div>
                        <div class="name">

                        </div>
                        <div class="price">
                            <span class="current-price"> $ </span> <span class="old-price">$ </span>
                        </div>




                    </div>

            </div>
        </section>
        <!-- product-list end -->




        <div class="navBarBottom clearfix">
            <div class="paginator fl-l">



           <ul class="pagination">
                <li class="active"><a href="#">01</a></li>
                <li><a href="#">02</a></li>
                <li><a href="#">03</a></li>

                <li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            </ul>
            </div>
            <p class="results-showing fl-r"><span>Showing 1-12 of 30 relults</span></p>
        </div>

@endsection