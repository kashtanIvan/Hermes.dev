<ul>
    @foreach($items as $item)
        <li> name {{$item['id']}} , qty {{ $item['qty'] }}, data {{ $item['data'] }}</li>
    @endforeach
</ul>

Ит