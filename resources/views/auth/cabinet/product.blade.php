@extends('layouts.app')


@section('content')

    <div class="container">
        {{--<div class="row">--}}
        <p>
        <h1> {{ $title }} </h1></p>
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


    <div class="container-fluid">
        <table class="table table-bordered">
            <tr class="text-center">
                <td>ID</td>
                <td>Фото</td>
                <td>Бренд</td>
                <td>Модель</td>
                <td>Цена</td>
                <td>Отображение</td>
                <td>Управление</td>
            </tr>
            @foreach( $products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td><img src="{{'..//' . env('ROOT_IMAGE')
                    . $product['images']['0']['location']
                    . 'mini//'
                    . $product['images']['0']['name'] . '.'
                    . $product['images']['0']['ext'] }}"></td>
                    <td>{{ $product['brand']['name'] }}</td>
                    <td>{{ $product['model']['name'] }}</td>
                    <td>{{ $product['items'][0]['price'] }}</td>
                    <td>
                        {{ HelpFD::statusHiddenTable($product['hidden']) }}
                    </td>
                    <td>Управление</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection