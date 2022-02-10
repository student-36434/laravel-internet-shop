@extends('layouts.master')

@section('title', 'To order')

@section('content')
    <h1>Order confirmation</h1>
    <div class="container">
        <div class="row justify-content-center">
            <p>Total price: <b>{{ $order->getFullPrice() }} PLN.</b></p>
            <form action="{{ route('basket-confirm') }}" method="POST">
                <div>
                    <p>Enter your name and phone number so that our manager can contact you:</p>

                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Name: </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Phone number: </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Email: </label>
                            <div class="col-lg-4">
                                <input type="text" name="email" id="email" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    @csrf
                    <input type="submit" class="btn btn-success" value="Confirm order">
                </div>
            </form>
        </div>
    </div>
@endsection
