@extends('layouts.app')
@section('content')
<section class="section"><div class="grid-2"><div class="box" style="display:flex;align-items:center;justify-content:center;font-size:150px;background:#f1f5f9">{{ $product['emoji'] }}</div><div class="box"><div class="meta">{{ $product['category'] }}</div><h1>{{ $product['name'] }}</h1><p>این صفحه نمونه محصول است. در مراحل بعدی اطلاعات واقعی، موجودی، تصاویر، ویژگی‌ها و دکمه افزودن به سبد خرید را به دیتابیس متصل می‌کنیم.</p><div class="price" style="font-size:28px;margin:20px 0">{{ number_format($product['price']) }} تومان</div><a class="btn" href="{{ route('cart') }}">افزودن به سبد خرید</a></div></div></section>
@endsection
