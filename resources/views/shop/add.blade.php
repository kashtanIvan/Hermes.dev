@extends('layouts.app')
@inject('brands', 'App\Services\ProductService')
@inject('brand_models', 'App\Services\ProductService')
@inject('categories', 'App\Services\ProductService')

@section('content')
    {{ Form::open(array('url' => 'panel/product', 'enctype' => 'multipart/form-data')) }} <br>

    {{ Form::label('category', 'category') }}
    <select name="category">
        <option selected disabled>New Category</option>
        @foreach($categories->getCategory() as $category)

            <option value="{{ $category->id }}">{{ $category->name }}</option>

        @endforeach
    </select>
    {{ Form::text('newCategory') }} <br>

    {{ Form::label('brand', 'brand') }}
    <select name="brand">
        <option selected disabled>New Brand</option>
        @foreach($brands->getBrand() as $brand)

            <option value="{{ $brand->id }}">{{ $brand->name }}</option>

        @endforeach
    </select>

    {{ Form::text('newBrand') }} <br>

    {{ Form::label('newBrandModel', 'model') }}
    {{ Form::text('newBrandModel') }} <br>


    <br>

    {{ Form::label('hidden', 'hidden') }}
    {{ Form::checkbox('hidden', '1', true) }} <br>
    {{ Form::label('description', 'description') }}
    {{ Form::text('description', null, ['class'=>'asd']) }} <br>

    {{ Form::label('slug', 'slug') }}
    {{ Form::text('slug') }} <br>

    Отправить этот файл: <input name="image" type="file" />

    <!--{{ Form::macro('myMacro', function(){
        return '<input type="some" id = "s">';
    })
    }}
    {{ Form::label('s', 'myMacro') }}
    {!! Form::myMacro() !!}
            <br>-->
    {{ Form::submit('Submit') }}
    {{ Form::close() }}
@endsection