@extends('layouts.master')

@section('title', 'Main')

@section('content')
    <h1>All products</h1>

    <div class="row">
        @foreach($products as $product)
            @include('layouts.card', compact('product'))
        @endforeach
    </div>
@endsection
