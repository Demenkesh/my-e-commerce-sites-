{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
@extends('layouts.front')
@section('title')
    Write a review
@endsection
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($verified_purchase->count() > 0)
                            <h5> You are writing a review for <b><q>{{ $product->name }}</q></b> </h5>
                            <form action="{{ url('/add-review') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <textarea class="form-control" name="user_review" rows="5" placeholder="Write your reviews"></textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit Review</button>
                            </form>
                        @else
                            <div class="alert alert-danger">
                                <h5>You are not eligible to review this <q>{{ $product->name }}</q> </h5>
                                <p>
                                    Only customers who has purchased the <b><q>{{ $product->name }}</q></b>  can write a review about it.
                                </p>
                                <a href="{{ url('/') }}" class=" btn btn-primary mt-3">Go back to the home page </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* .navbar-brand {
            display: none;
        } */
    </style>
@endsection
