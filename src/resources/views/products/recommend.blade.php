@extends('layouts.app')

@section('styles')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h2>おすすめ商品</h2>

    @if(isset($recommendedProducts) && $recommendedProducts->isNotEmpty())
    <div class="item-list">
        @foreach ($recommendedProducts as $product)
            <img src="{{ $product->storage ?? asset('storage/' . $product->image) }}" class="product-image" alt="{{ $product->name }}">
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary mt-2">{{ $product->name }}</a>
            </div>
        </div>
        @endforeach
        @else
        <p>おすすめ商品はありません。</p>
        @endif
    </div>
</div>
@endsection