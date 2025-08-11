@extends('layouts.app')

@section('content')
<div class="container">
    <h2>おすすめ商品</h2>

    @if(isset($recommendedProducts) && $recommendedProducts->isNotEmpty())
    <div class="row">
        @foreach ($recommendedProducts as $product)
        <div class="col-md-3">
            <div class="card mb-4">
                <img src="{{ $product->storage ?? asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">{{ Str::limit($product->description, 50) }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-outline-primary mt-2">{{ $product->name }}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p>おすすめ商品はありません。</p>
    @endif
</div>
@endsection