@extends('layouts.front')
@section('title')
    Thankyou
@endsection
@section('content')
    <div class="container" id="product-cards">
        <h1 class="text-center">Thank you for your patronage!</h1>
        <div class="row">

            <form action="{{ url('sms') }}" method="post">
                {{-- {{ csrf_field() }} --}}
                @csrf
                <div class="py-3">
                    <div class="card item">
                        <div class="card-body">
                            {{-- <a href="{{ url('/') }}"id="viewmorebtn"> {{ Auth::user()->name }}</a> --}}
                            <button type="submit" id="viewmorebtn" class="btn btn-primary">{{ Auth::user()->name }}</button>
                            <div class="col-md-4 mb-3" hidden>
                                <label for="zip">Phone number</label>
                                <input type="number" placeholder="Enter number" required id="number" name="number"
                                    class="form-control number" value="{{ Auth::user()->phone }}" />
                            </div>
                            <button type="submit" id="viewmorebtn" class="btn btn-primary">OK</button>
                            </a>
                        </div>
                    </div>
                </div>
                {{-- <button type="submit" class="btn btn-primary">OK</button> --}}
            </form>

            {{-- <div class=" py-3">
                <div class="card item">

                    <div class="card-body">

                        <a href="{{ url('/') }}"id="viewmorebtn"> {{ Auth::user()->name }}</a>
                        <hr />
                        <a id="viewmorebtn"> Thank You</a>
                        </a>


                    </div>
                </div>
                <a href="{{ url('/') }}" id="viewmorebtn">Home</a>
            </div> --}}

        </div>
    </div>
@endsection
