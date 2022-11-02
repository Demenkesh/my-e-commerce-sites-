<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Mail;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //mail view for contact page
    public function contact()
    {
        return view('frontend.contact');
    }
    //mail send for contact us page
    public function contactsendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'name' => 'required',
            'content' => 'required',
            'phone' => 'required',
        ]);

        $data = [
            'subject' => $request->subject,
            'name' => $request->name,
            'email' => $request->email,
            'content' => $request->content,
            'phone' => $request->phone
        ];

        Mail::send('email-template', $data, function ($message) use ($data) {
            $message->to($data['email'])
                ->subject($data['subject']);
        });

        return back()->with(['message' => 'Email successfully sent!']);
    }
}
