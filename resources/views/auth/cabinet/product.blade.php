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

        @if(session('del'))
           Продукт удален
        @endif

    </div>

    <div class="container-fluid">
        <table class="table text-center table-bordered">
            <tr class="">
                <th class="text-center">ID</th>
                <th class="text-center">Фото</th>
                <th class="text-center">Бренд</th>
                <th class="text-center">Модель</th>
                <th class="text-center">Цена</th>
                <th class="text-center">Отображение</th>
                <th class="text-center">Управление</th>
            </tr>
            @foreach( $products as $product)
                <tr>
                    <td>{{ $product['id'] }}</td>
                    <td><img src="{{'../' . env('ROOT_IMAGE')
                    . $product['images'][0]['location']
                    . 'mini/'
                    . $product['images'][0]['name'] . '.'
                    . $product['images'][0]['ext'] }}"></td>
                    <td>{{ $product['brand']['name'] }}</td>
                    <td>{{ $product['model']['name'] }}</td>
                    <td>{{ $product['items'][0]['price'] or '---' }}</td>
                    <td>
                        {{ HelpFD::statusHiddenTable($product['hidden']) }}
                    </td>
                    <td>
                        {{--                        <a href="{{ route('product.edit',['product' => $product['id']]) }}" style="color:#ba933e;"><i class="fa fa-pencil "></i></a>--}}

                        {!! Form::open(['url' =>route('product.edit',['product' => $product['id']]),'method'=>'GET','style'=>'display:inline-block' ]) !!}
                        {!! Form::hidden('action','edit') !!}
                        {!! Form::button('<i class="fa fa-pencil "></i>',['class'=>'btn btn-brown','type'=>'submit']) !!}
                        {!! Form::close() !!}

                        {!! Form::open(['url' =>route('product.edit',['product' => $product['id']]),'method'=>'GET','style'=>'display:inline-block' ]) !!}
                        {!! Form::hidden('action','show') !!}
                        {!! Form::button('<i class="fa fa-eye "></i>',['class'=>'btn btn-brown','type'=>'submit']) !!}
                        {!! Form::close() !!}

                        {{--<a href="#" style="color:#ba933e;"><i class="fa fa-eye"></i></a>--}}

                        {!! Form::open(['url' =>route('product.destroy',['product' => $product['id']]),'method'=>'DELETE','style'=>'display:inline-block' ]) !!}
                        {!! Form::hidden('action','delete') !!}
                        {!! Form::button('<i class="fa fa-trash "></i>',['class'=>'btn btn-brown','type'=>'submit']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection