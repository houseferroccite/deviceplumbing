<tr>
    <td>
        <a href="{{route('products.show',$product)}}">
            <img height="60px"
                 src="{{ Storage::url($product->image) }}">
            {{ $product->name }}
        </a>
    </td>
    <td>{{$product->price}} руб.</td>
</tr>


