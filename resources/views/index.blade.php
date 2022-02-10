@extends('master')

@section('title', 'Main')

@section('content')
    <div class="starter-template">
        <h1>All products</h1>

        <div class="row">
            @foreach($products as $product)
                @include('card', compact('product'))
            @endforeach
        </div>
    </div>
@endsection
