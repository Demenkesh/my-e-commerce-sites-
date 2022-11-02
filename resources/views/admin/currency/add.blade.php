<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@extends('layouts.admin')
@section('title')
    Add Curreny Page
@endsection
@section('content')
    <div class="card ">
        <div class="card-header">
            <h4>Add Curreny PAGE</h4>
        </div>
        <div class="card-body my-custom-scrollbar">
            @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            <form action="{{ url('insert-currency') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                            type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="row g-3">
                            <div class="col">
                                <label class="form-label">Name</label>
                                <div class="p-2 ">
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                                id="" placeholder="your name">
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Symbol</label>
                                <div class="p-2 ">
                                    <input type="text" name="symbol" value="{{ old('symbol') }}" class="form-control"
                                id="" placeholder="your symbol">
                            @error('symbol')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Exchange_rate</label>
                                <div class="p-2 ">
                                    <input type="text" name="exchange_rate" value="{{ old('exchange_rate') }}" class="form-control"
                                id="" placeholder="exchange_rate">
                            @error('exchange_rate')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label class="form-label">Code</label>
                                <div class="p-2 ">
                                    <input type="text" name="code" value="{{ old('code') }}" class="form-control"
                                id="" placeholder="your code">
                            @error('code')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                                </div>
                            </div>
                            <div class="col" hidden >
                                <label class="form-label">Trending</label>
                                <div class="p-2 ">
                                    <input type="checkbox" name="trending" id="" checked>

                                    @error('trending')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                            </div>
                            <div class="col" >
                                <label class="form-label">on</label>
                                <div class="p-2 ">
                                    <input type="checkbox" name="on" id="" >

                                    @error('on')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                            </div>
                            <div class="col" >
                                <label class="form-label">off</label>
                                <div class="p-2 ">
                                    <input type="checkbox" name="off" id="" >

                                    @error('off')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                            </div>

                        </div>


                        <br />

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                </div>




            </form>
        </div>
    </div>

@endsection
