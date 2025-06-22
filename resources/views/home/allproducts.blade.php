inlcude('home.header')

@foreach($products as $product)
    <div>{{ $product->name }}</div>
    <!-- Add other fields you need here -->
@endforeach

<!-- Pagination links -->
{{ $products->links() }}
