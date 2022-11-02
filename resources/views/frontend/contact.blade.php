@extends('layouts.front')
@section('title')
    Contact us
@endsection
@section('content')
    <!-- contact -->
    <div class="container" id="contact">
        <h1 class="text-center">CONTACT US</h1>
        <div class="row" style="margin-top: 50px;">
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <i class="fas fa-phone"> Phone</i>
                    <h6>+00000000000000000</h6>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <i class="fa-solid fa-envelope"> Email</i>
                    <h6>example@gmail.com</h6>
                </div>
            </div>
            <div class="col-md-4 py-3 py-md-0">
                <div class="card">
                    <i class="fa-solid fa-location-dot"> Address</i>
                    <h6>Karachi Sinfh Pakistan</h6>
                </div>
            </div>
        </div>
        <form action="{{ url('contacts') }}" method="post">
            @csrf
            <div class="row" style="margin-top: 30px;">
                <div class="col-md-4 py-3 py-md-0">
                    <input type="text" class="form-control form-control" name="name" required placeholder="Name">
                    @error('name')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <input type="text" class="form-control form-control" name="subject" required
                        placeholder="Enter subject">
                    @error('subject')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="col-md-4 py-3 py-md-0">
                    <input type="text" class="form-control form-control" name="email" required placeholder="Email">
                    @error('email')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class=" form-group col-md-4 py-3 ">
                    <input type="number" class="form-control form-control" name="phone" required placeholder="Phone">
                    @error('phone')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div class="form-group" style="margin-top: 30px;">
                    <textarea class="form-control" id=""rows="5" name="content" required placeholder="Message"></textarea>
                    @error('content')
                        <span class="text-danger"> {{ $message }} </span>
                    @enderror
                </div>
                <div id="messagebtn" class="text-center">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-paper-plane"></i> Send</button>
                </div>
            </div>
        </form>
    </div>
    <!-- contact -->
@endsection

