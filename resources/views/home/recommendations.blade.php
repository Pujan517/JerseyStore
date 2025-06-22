@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Recommended for You</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-6">
        @forelse($products as $product)
            <div class="bg-white rounded-lg shadow p-4 flex flex-col items-center">
                <a href="{{ url('product_details', $product->id) }}">
                    <img src="{{ asset('product/'.$product->image) }}" alt="{{ $product->title }}" class="w-32 h-32 object-cover mb-2">
                    <h3 class="font-semibold text-lg">{{ $product->title }}</h3>
                </a>
                <p class="text-gray-600 mb-2">{{ $product->category ?? $product->catagory }}</p>
                <p class="text-green-600 font-bold mb-2">
                    @if($product->discount_price)
                        Rs.{{ $product->discount_price }} <span class="text-muted text-decoration-line-through">Rs.{{ $product->price }}</span>
                    @else
                        Rs.{{ $product->price }}
                    @endif
                </p>
                <a href="{{ url('product_details', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View</a>
            </div>
        @empty
            <p>No recommendations available at this time.</p>
        @endforelse
    </div>
</div>
@endsection
