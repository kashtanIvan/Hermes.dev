@extends('layouts.app')

@section('content')

    <form enctype="multipart/form-data" action="add" method="POST">
        {{ csrf_field() }}
        <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла -->
        <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
        <!-- Название элемента input определяет имя в массиве $_FILES -->
        Отправить этот файл: <input name="image" type="file" />
        <input type="submit" value="Send File" />
    </form>
@endsection