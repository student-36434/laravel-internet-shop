<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels"></div>
        <img src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->price }} PLN</p>
            <p>
            <form action="{{ route('basket') }}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">In basket</button>
                <a href="{{ route('product', [$product->category->code, $product->code]) }}"
                   class="btn btn-default"
                   role="button">More</a>
                <input type="hidden" name="_token" value="TEORe8Mq7X5Awdsp7mVCPBlU6zK2TD83lYuisIdp"></form>
            </p>
        </div>
    </div>
</div>
