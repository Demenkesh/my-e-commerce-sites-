<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@extends('layouts.admin')
@section('title')
    Welcome to E-shop Admin
@endsection
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">
                Dashboard
            </li>
        </ol>
        <div data-bs-spy="scroll" data-bs-offset="0" class="scrollspy-example" tabindex="0">
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-body text-dark mb-4">
                        <div class="card-body">Admin <h2>{{ $admin }}</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="{{ url('users') }}">view Details</a>
                            <div class="small text-dark"> <i class="bi bi-arrow-right-circle-fill"></i></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body">Total Category <h2>{{ $category }}</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ url('categories') }}">view Details</a>
                            <div class="small text-dark"> <i class="bi bi-arrow-right-circle-fill"></i></div>
                        </div>

                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-dark mb-4">
                        <div class="card-body">Total Product <h2>{{ $product }}</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="{{ url('products') }}">view Details</a>
                            <div class="small text-dark"> <i class="bi bi-arrow-right-circle-fill"></i></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Total User <h2>{{ $user }}</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ url('users') }}">view Details</a>
                            <div class="small text-dark"> <i class="bi bi-arrow-right-circle-fill"></i></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Total completed Sale <h2>{{ $sale }}</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ url('order-history') }}">view Details</a>
                            <div class="small text-dark"> <i class="bi bi-arrow-right-circle-fill"></i></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-dark mb-4">
                        <div class="card-body">Total inprogrss Sale <h2>{{ $sales }}</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="{{ url('orders') }}">view Details</a>
                            <div class="small text-dark"> <i class="bi bi-arrow-right-circle-fill"></i></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-info text-dark mb-4">
                        <div class="card-body">Product in cart <h2>{{ $cart }}</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-dark stretched-link" href="#">view Details</a>
                            <div class="small text-dark"> <i class="bi bi-arrow-right-circle-fill"></i></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-secondary text-white mb-4">
                        <div class="card-body">Out of Stock <h2>{{ $outstock }}</h2></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="{{ url('products') }}">view Details</a>
                            <div class="small text-dark"> <i class="bi bi-arrow-right-circle-fill"></i></div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    <style>
        /* .footer {

            bottom: -1rem;
        } */

        body {
            position: relative;
        }

        .scrollspy-example {
            height: 400px;
        }
    </style>
@endsection
