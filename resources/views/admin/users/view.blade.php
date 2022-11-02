<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@extends('layouts.admin')
@section('title')
    view registered user
@endsection
@section('content')
    <div class="card ">
        <div class="card-header bg-primary">
            <h4>view registered user</h4>
        </div>
        <div class="card-body ">
            <form >
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                            role="tab" aria-controls="home" aria-selected="true">view registered user </button>
                    </li>
                    <a  href="{{url('users')}}" class="btn btn-primary float-right ml-auto">Back</a>
                </ul>
                <hr/>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="col-md-12 ">
                            <label class="form-label">Role</label>
                            <div class="p-2 border">{{ $users->role_as =='0'? 'User':'Admin' }}
                            </div>

                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label class="form-label">First Name</label>
                                <div class="p-2 border">{{ $users->name }}
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Last Name</label>
                                <div class="p-2 border">{{ $users->lastname }}
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label class="form-label">Email</label>
                                <div class="p-2 border">{{ $users->email }}
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Phone</label>
                                <div class="p-2 border">{{ $users->phone }}
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label class="form-label">Home address</label>
                                <div class="p-2 border">{{ $users->address1 }}
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">Country</label>
                                <div class="p-2 border">{{ $users->country }}
                                </div>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col">
                                <label class="form-label">State</label>
                                <div class="p-2 border">{{ $users->state }}
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">City</label>
                                <div class="p-2 border">{{ $users->city }}
                                </div>
                            </div>
                            <div class="col">
                                <label class="form-label">ZipCode</label>
                                <div class="p-2 border">{{ $users->zipcode }}
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div> --}}
                    </div>
                </div>



            </form>

        </div>
    </div>
@endsection
