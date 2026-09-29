@extends('layouts.app')

@section('content')

<section class="hero">
    <div class="hero-content">
        <span class="hero-badge">🛍️ فروشگاه آنلاین</span>

        <h1>خرید آسان، سریع و مطمئن</h1>

        <p>
            محصولات متنوع را با قیمت مناسب پیدا کن،
            انتخاب کن و سفارش خودت را ثبت کن.
        </p>

        <div class="hero-actions">
            <a class="btn" href="{{ route('shop') }}">مشاهده محصولات</a>
            <a class="btn btn-light" href="#categories">دسته‌بندی‌ها</a>
        </div>

        <div class="hero-features">
            <span>✓ تنوع محصولات</span>
            <span>✓ قیمت مناسب</span>
            <span>✓ خرید آسان</span>
        </div>
    </div>

    <div class="hero-visual">
        <div class="hero-icon">🛍️</div>
        <div class="hero-circle circle-1"></div>
        <div class="hero-circle circle-2"></div>
    </div>
</section>

<section class="section" id="categories">

    <div class="section-head">
        <div>
            <span class="section-label">دسته‌بندی‌ها</span>
            <h2>از کجا خرید را شروع کنیم؟</h2>
        </div>

        <a href="{{ route('shop') }}" class="section-link">
            همه محصولات ←
        </a>
    </div>

    <div class="categories">
        @foreach($categories as $category)
            <a class="category" href="{{ route('category', $category['slug']) }}">
                <span class="icon">{{ $category['icon'] }}</span>
                <strong>{{ $category['name'] }}</strong>
                <span class="category-arrow">←</span>
            </a>
        @endforeach
    </div>

</section>

<section class="section">

    <div class="section-head">
        <div>
            <span class="section-label">پیشنهاد ویژه</span>
            <h2>محصولات پیشنهادی</h2>
        </div>

        <a href="{{ route('shop') }}" class="section-link">
            مشاهده همه ←
        </a>
    </div>

    <div class="products">

        @foreach(array_slice($products, 0, 8) as $product)

            <a class="product" href="{{ route('product', $product['id']) }}">

                <div class="product-img">

                    @if($product['old_price'])
                        <span class="discount-badge">
                            {{ round((1 - ($product['price'] / $product['old_price'])) * 100) }}٪ تخفیف
                        </span>
                    @endif

                    <span class="product-emoji">
                        {{ $product['emoji'] }}
                    </span>

                </div>

                <div class="product-body">

                    <div class="meta">
                        {{ $product['category'] }}
                    </div>

                    <div class="product-title">
                        {{ $product['name'] }}
                    </div>

                    <div class="product-bottom">

                        <div class="price-box">
                            <div class="price">
                                {{ number_format($product['price']) }}
                                <span>تومان</span>
                            </div>

                            @if($product['old_price'])
                                <div class="old">
                                    {{ number_format($product['old_price']) }}
                                </div>
                            @endif
                        </div>

                        <span class="product-arrow">←</span>

                    </div>

                </div>

            </a>

        @endforeach

    </div>

</section>

<section class="trust-section">

    <div class="trust-item">
        <span>🚚</span>
        <div>
            <strong>ارسال سریع</strong>
            <small>تحویل سریع سفارش‌ها</small>
        </div>
    </div>

    <div class="trust-item">
        <span>🔒</span>
        <div>
            <strong>خرید امن</strong>
            <small>پرداخت و سفارش مطمئن</small>
        </div>
    </div>

    <div class="trust-item">
        <span>💬</span>
        <div>
            <strong>پشتیبانی</strong>
            <small>همراه شما در خرید</small>
        </div>
    </div>

    <div class="trust-item">
        <span>↩️</span>
        <div>
            <strong>مرجوعی آسان</strong>
            <small>خرید با خیال راحت</small>
        </div>
    </div>

</section>

@endsection
