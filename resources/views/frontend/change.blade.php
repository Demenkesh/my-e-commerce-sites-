@extends('layouts.front')
@section('title')
    Change Password
@endsection
@section('content')
    <!-- change password-->
    <div class="container login">
        <div class="row">
            <form action="{{ url('password/update') }}" method="POST">
                @csrf
            <div class="col-md-12" id="side2">
                <h3>Change Password</h3>
                <div class="inp">
                    <input type="password" name="oldpassword" placeholder="Current password" required>
                    @error('oldpassword')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="inp">
                    <input type="password" name="password" placeholder="New Password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="inp">
                    <input type="password" name="password_confirmation" placeholder="Corfirm Password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <br />
                <div id="login"><button>Change</button></div>
                <br />
            </div>
        </form>
        </div>
    </div>
    <!-- change password -->
@endsection
