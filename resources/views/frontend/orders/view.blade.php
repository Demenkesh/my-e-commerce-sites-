@extends('layouts.front')
@section('title')
    My orders
@endsection
@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Order Views
                            <a href="{{ url('my-orders') }}"><button type="submit"
                                    class="btn btn-primary btn-submit-fix float-end">back</button>
                            </a>

                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h4>Shopping Details<p class=" float-end">Order Details</p>
                            </h4>
                            <hr />
                            <div class="col-md-6  fw-bold fa-2xs">
                                <label for="">First Name</label>
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <div class="border p-2">{{ $orders->firstname }}</div>
                                <hr />
                                <label for="">Last Name</label>
                                <br />
                                <br />
                                <br />
                                <div class="border p-2">{{ $orders->lastname }}</div>
                                <hr />
                                <label for="">Email</label>
                                <br />
                                <br />
                                <br />
                                <div class="border p-2">{{ $orders->email }}</div>
                                <hr />
                                <label for="">Phone No.</label>
                                <br />
                                <br />
                                <br />
                                <br />
                                <div class="border p-2">{{ $orders->phone }}</div>
                                <hr />
                                <label for="">Shipping Address</label>
                                <br />
                                <br />
                                <br />
                                <br />
                                <div class="border p-2">
                                    {{ $orders->address1 }},
                                    {{ $orders->city }},
                                    {{ $orders->state }},
                                    {{ $orders->country }}.
                                </div>
                                <hr />
                                <label for="">Zipcode</label>
                                <br />
                                <br />
                                <br />
                                <br />
                                <div class="border p-2">{{ $orders->zipcode }}</div>

                            </div>
                            {{-- <h4>Shopping Details</h4> --}}

                            <div class="col-md-6">
                                {{-- <h4>Shopping Details</h4>
                                <hr/> --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset($item->product->productImages[0]->image) }}"
                                                        width="50px" alt="ProductImage">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="btn btn-primary btn-submit-fix float-end">Total: {{ $orders->total_price }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
