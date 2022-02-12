@extends('layouts.master')

@section('title', 'Product')

@section('content')
    <h1> {{ $product }}</h1>
    <h2>Smartphones</h2>
    <p>Price: <b>4449 PLN</b></p>
    <img src="https://pulsar.ee/wp-content/uploads/2018/10/example.jpg">
    <p>Excellent advanced phone with 129 gb memory</p>
    <form action="{{ route('basket-add', $product) }}" method="POST">
        <button type="submit" class="btn btn-success" role="button">Add to Cart</button>
        @csrf
    </form>
@endsection
