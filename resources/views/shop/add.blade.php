@extends('layouts.app')
@inject('brands', 'App\Services\ProductService')
@inject('brand_models', 'App\Services\ProductService')
@inject('categories', 'App\Services\ProductService')

@section('content')
    {{ Form::open(array('url' => 'product')) }} <br>

    {{ Form::label('brand', 'brand') }}
    <select name="brand">
        <option selected value="0">New Brand</option>
        @foreach($brands->getBrand() as $brand)

            <option value="{{ $brand->id }}">{{ $brand->name }}</option>

        @endforeach
    </select>

    {{ Form::text('newBrand') }} <br>

    {{ Form::label('model', 'model') }}
    <select name="model">
        <option selected value="0" >New Model</option>
        @foreach($brand_models->getBrandModel() as $brand_model)

            <option value="{{ $brand_model->id }}">{{ $brand_model->name }}</option>

        @endforeach
    </select>
    {{ Form::text('newBrandModel') }} <br>

    {{ Form::label('category', 'category') }}
    <select name="category">
        <option selected value="0">New Category</option>
        @foreach($categories->getCategory() as $category)

            <option value="{{ $category->id }}">{{ $category->name }}</option>

        @endforeach
    </select>
    {{ Form::text('newCategory') }} <br>
    <br>

    {{ Form::label('hidden', 'hidden') }}
    {{ Form::checkbox('hidden', '1', true) }} <br>
    {{ Form::label('description', 'description') }}
    {{ Form::text('description', null, ['class'=>'asd']) }} <br>

    {{ Form::label('slug', 'slug') }}
    {{ Form::text('slug') }} <br>

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