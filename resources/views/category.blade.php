@extends('layouts.app')
@section('content')
<section class="section"><div class="section-head"><h1>{{ $category['icon'] }} {{ $category['name'] }}</h1><a href="{{ route('shop') }}">← فروشگاه</a></div>@if(count($products))<div class="products">@foreach($products as $product)<a class="product" href="{{ route('product',$product['id']) }}"><div class="product-img">{{ $product['emoji'] }}</div><div class="product-body"><div class="product-title">{{ $product['name'] }}</div><div class="price">{{ number_format($product['price']) }} تومان</div></div></a>@endforeach</div>@else<div class="empty">هنوز محصولی در این دسته‌بندی قرار نگرفته است.</div>@endif</section>
@endsection
