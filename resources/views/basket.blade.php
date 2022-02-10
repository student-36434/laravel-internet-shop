@extends('master')

@section('title', 'Basket')

@section('content')
    <div class="starter-template">
        <p class="alert alert-success">Added item </p>
        <h1>Basket</h1>
        <p>Order confirmation</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Count</th>
                    <th>Price</th>
                    <th>Cost</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href=" {{ route('product', [$product->category->code, $product->code]) }}">
                                <img height="56px" src="http://internet-shop.tmweb.ru/storage/products/iphone_x.jpg">
                                {{ $product->name }}
                            </a>
                        </td>
                        <td><span class="badge">1</span>
                            <div class="btn-group form-inline">
                                <form action="http://internet-shop.tmweb.ru/basket/remove/1" method="POST">
                                    <button type="submit" class="btn btn-danger" href=""><span
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                                <form action="{{ route('basket-add', $product) }}" method="POST">
                                    <button type="submit" class="btn btn-success"
                                            href=""><span
                                            class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td>{{ $product->price }} PLN</td>
                        <td>{{ $product->price }} PLN</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">Total cost:</td>
                    <td>71990 PLN</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="http://internet-shop.tmweb.ru/basket/place">Order confirmation</a>
            </div>
        </div>
    </div>
@endsection
