@extends('layouts.app')
@section('content')
<section class="section"><div class="section-head"><h1>فروشگاه</h1><span class="meta">{{ count($products) }} محصول نمونه</span></div><div class="products">@foreach($products as $product)<a class="product" href="{{ route('product',$product['id']) }}"><div class="product-img">{{ $product['emoji'] }}</div><div class="product-body"><div class="meta">{{ $product['category'] }}</div><div class="product-title">{{ $product['name'] }}</div><div class="price">{{ number_format($product['price']) }} تومان @if($product['old_price'])<span class="old">{{ number_format($product['old_price']) }}</span>@endif</div></div></a>@endforeach</div></section>
@endsection
