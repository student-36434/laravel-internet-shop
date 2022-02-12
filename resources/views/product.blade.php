@extends('layouts.master')

@section('title', 'Product')

@section('content')
    <h1> {{ $product }}</h1>
    <h2>Smartphones</h2>
    <p>Price: <b>4449 PLN</b></p>
    <img src="https://pulsar.ee/wp-content/uploads/2018/10/example.jpg">
    <p>Excellent advanced phone with 129 gb memory</p>
    <form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
        <button type="submit" class="btn btn-success" role="button">Add to Cart</button>
        <input type="hidden" name="_token" value="h6JrjWWt5ede3r1iCZKRcTDvRTAm0zu6KzvTJQRj">
    </form>
@endsection
