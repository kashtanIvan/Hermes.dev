@extends('layouts.app')


@section('content')

    Profile dashboard <br>
    Email: {{$user->email}}

    <br>

    {{ Form::open(array('url' => 'password/email', 'method' => 'post')) }}

    {{ Form::submit('change password') }}
    {{ Form::close() }}


@endsection
