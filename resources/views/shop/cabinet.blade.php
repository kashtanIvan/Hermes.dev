@extends('layouts.app')


@section('content')

    <div>{{ $title }}</div>
    <ul>
        <li><a href="{{ route('product.index') }}">Товары</a> </li>
        <li><a href="{{ route('product.create') }}">Добавить товар</a> </li>
    </ul>
    Profile dashboard <br>
    Email: {{$user->email}}

    <br>

    {{ Form::open(array('url' => 'password/email', 'method' => 'post')) }}

    {{ Form::submit('change password') }}
    {{ Form::close() }}


@endsection
