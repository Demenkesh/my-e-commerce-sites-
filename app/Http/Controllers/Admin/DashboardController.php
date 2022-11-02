<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function users()
    {
        $users = new  User();
        $users = User::where(  $users->name)->paginate(4);
        return view('admin.users.index',compact('users'));
    }
    public function viewuser($id)
    {
        $users = new  User();
        $users =User::where('id',$id)->first();
        return view('admin.users.view',compact('users'));
    }
}
