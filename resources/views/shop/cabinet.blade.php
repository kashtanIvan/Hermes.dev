@extends('layouts.app')


@section('content')

    <div class="container">
        {{--<div class="row">--}}
            <p><h1> {{ $title }} </h1></p>
        {{--</div>--}}
        <div class="row">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('product.index') }}">Товары</a></li>
                <li><a href="{{ route('product.create') }}">Добавить товар</a></li>
            </ul>
        </div>
        Profile dashboard <br>
        Email: {{$user->email}}

        <br>

        {{ Form::open(array('url' => 'password/email', 'method' => 'post')) }}

        {{ Form::submit('change password') }}
        {{ Form::close() }}

    </div>

@endsection
