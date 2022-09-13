<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Featured Product</h2>
                </div>
                <div class="featured__controls">
                    <ul>
                        <li class="active" data-filter="*">All</li>
                        @if ($categories)
                            @foreach ($categories as $category)
                                <li data-filter=".{{ str_replace(' ', '_', $category->category_name) }}">
                                    {{ $category->category_name }}</li>
                            @endforeach
                        @else
                            <li data-filter=".{{ str_replace(' ', '_', $category->category_name) }}">
                                {{ $category->category_name }}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        @livewire('products')
    </div>
</section>
