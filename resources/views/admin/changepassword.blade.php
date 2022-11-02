<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
@extends('layouts.admin')
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
<style>
    /* login */
.login{
    width: 50%;
    margin: 20px;
    font-family: 'Roboto Slab', serif;
}
#side1{
    background-color: #1c1c50;
    height: 76vh;
    border-radius: 5px;
    box-shadow: rgba(100,100,111,0.2) 0px 7px 29px 0px;
}
#side1 h3{
    color: white;
    font-weight: bold;
    text-shadow: 1px 1px 1px black;
    margin-top: 200px;
    align-items: center;
    text-align: center;
}
#side1 p{
    color: white;
    font-weight: bold;
    align-items: center;
    text-align: center;
}
#btn{
    align-items: center;
    text-align: center;
    border: 2px solid white;
    border-radius: 10px;
}
#btn a{
    text-decoration: none;
    color: white;
}
#side2{
    /* background-color: white; */
    border-radius: 5px;
    /* box-shadow: rgba(100,100,111,0.2) 0px 7px 29px 0px; */
    align-items: center;
    text-align: center;
}
#side2 h3{
    margin-top: 50px;
    color: #1c1c50;
    font-weight: bold;
}
#side2 .inp{
    margin-top: 32px;
}
#side2 input{
    width: 500px;
    margin-top: 20px;
    height: 36px;
    align-items: center;
}
#side2 p{
    margin-top: 20px;
    cursor: pointer;
}
#side2 .icons i{
    margin-left: 10px;
    cursor: pointer;
}
#login{
    margin-top: 10px;
}
#login button{
    width: 200px;
    height: 32px;
    color: white;
    background-color: #1c1c50;
    border: none;
    font-weight: bold;
}
@media screen and (max-width:992px){
    #side2 input{
        width: 300px;
    }
}
@media screen and (max-width:330x){
    #side2 input{
        width: 200px;
    }
}
/* login */
</style>
<!-- change password -->
@endsection
