{{-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> --}}
@extends('layouts.front')
@section('title')
    Edit your review
@endsection
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        <h5> You are writing a review for <b><q>{{ $review->product->name }}</q></b> </h5>
                        <form action="{{ url('/update-review') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="review_id" value="{{ $review->id }}">
                            <textarea class="form-control" name="user_review" rows="5" placeholder="Write your reviews">{{ $review->user_review }}</textarea>
                            <button type="submit" class="btn btn-primary mt-3">Update Review</button>
                        </form>

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
