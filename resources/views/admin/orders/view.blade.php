<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Orders view Page</title>
@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    @if (session('error'))
                        <div class="alert alert-success">{{ session('error') }}</div>
                    @endif
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Order Views
                            <a href="{{ url('orders') }}"><button type="submit"
                                    class="btn btn-primary btn-submit-fix float-end">back</button>
                            </a>
                            <a href="{{ url('invoice-order/' . $orders->id . '/mail') }}"><button type="submit"
                                    class="btn btn-info btn-submit-fix float-end">send to email</button>
                            </a>
                            <a href="{{ url('invoice-order/' . $orders->id) }}"><button type="submit"
                                    class="btn btn-warning btn-submit-fix float-end">View</button>
                            </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <h4>Shopping Details<p class=" float-end">Order Details</p>
                            </h4>
                            <hr />
                            <div class="col-md-6  ">
                                <label for="">First Name</label>

                                <br />
                                <div class="border p-2">{{ $orders->firstname }}</div>
                                <hr />
                                <label for="">Last Name</label>

                                <br />
                                <div class="border p-2">{{ $orders->lastname }}</div>
                                <hr />
                                <label for="">Email</label>

                                <br />
                                <div class="border p-2">{{ $orders->email }}</div>
                                <hr />
                                <label for="">Phone No.</label>

                                <br />
                                <div class="border p-2">{{ $orders->phone }}</div>
                                <hr />
                                <label for="">Shipping Address</label>

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
                                <div class="border p-2">{{ $orders->zipcode }}</div>

                            </div>
                            {{-- <h4>Shopping Details</h4> --}}

                            <div class="col-md-6">

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

                                <div class="mt-3 mt-5">
                                    <label for="">Order Status if it has been verified or not;</label>

                                    <div class="col-md-6  ">
                                        <label for=""> <b><q>Where 1 is confirm and 0 is not
                                                    confirm;</q></b></label>
                                        <br />
                                        <div class="border p-2"><b>
                                                <td>{{ $orders->status }}</td>
                                            </b></div>
                                        <hr />
                                    </div>
                                </div>
                                <div class="mt-3 mt-5">
                                    <label for="">Order Status</label>
                                    <form action="{{ url('update-order/' . $orders->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="order_status">
                                            <option selected>Open this select menu</option>
                                            <option {{ $orders->status == 'Not-confirm' ? 'selected' : '' }}
                                                value="0">Pending
                                            </option>
                                            <option {{ $orders->status == 'Confirm' ? 'selected' : '' }} value="1">
                                                Completed
                                            </option>
                                        </select>
                                        <br />
                                        <button type="submit"
                                            class="btn btn-primary btn-submit-fix float-end">Update</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    {{-- @endsection --}}
