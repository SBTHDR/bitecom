<ul>
	@foreach($products as $item)
	<li> <img src="{{ asset('upload/products/' . $item->product_thumbnail) }}" style="width: 30px; height: 30px;"> {{ $item->product_name }}  </li>
	@endforeach

</ul> 