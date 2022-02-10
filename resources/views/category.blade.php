@extends('master')

@section('title', 'Category' . $category->name)

@section('content')
    <div class="starter-template">
        <h1>
            {{ $category->name }}
        </h1>
        <h3>
            Number of goods: {{ $category->products->count() }}
        </h3>
        <p>
            {{ $category->description }}
        </p>
        <div class="row">
            @foreach($category->products as $product)
                @include('card', compact('product'))
            @endforeach
        </div>
    </div>
@endsection
