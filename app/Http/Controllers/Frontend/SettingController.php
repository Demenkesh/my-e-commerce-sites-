<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::where('user_id', Auth::id())->get();
        return view('frontend.setting', compact('setting'));
    }
    public function settings(Request $request)
    {
        $setting = new Setting();
        $setting->user_id = Auth::id();
        $setting->firstname = $request->input('firstname');
        $setting->lastname = $request->input('lastname');
        $setting->email = $request->input('email');
        $setting->phone = $request->input('phone');
        $setting->address1 = $request->input('address1');
        $setting->city = $request->input('city');
        $setting->state = $request->input('state');
        $setting->country = $request->input('country');
        $setting->zipcode = $request->input('zipcode');
        $setting->save();

        // if (Auth::user()->address1 == NULL) {
        $user = User::where('id', Auth::id())->first();
        $user->name = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address1 = $request->input('address1');
        $user->city = $request->input('city');
        $user->state = $request->input('state');
        $user->country = $request->input('country');
        $user->zipcode = $request->input('zipcode');
        $user->update();
        // }
        return redirect('/')->with('message', 'setting updated ');
    }
    public function cpassword()
    {
        return view('frontend.change');
    }
    public function adminpassword()
    {
        return view('admin.changepassword');
    }
    public function upassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed'
        ]);
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect('/login')->with('message', 'Password changed successfully ');
        }else{
            return redirect()->back()->with('error', 'Current password is invalid');
        }
    }
}
