<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Mail;

class ContactController extends Controller
{
    public function contactForm()
    {
        return view('contact');
    }

    public function storeContactForm(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobile_number' => 'required|digits:10|numeric',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $input = $request->all();
        // print_r($input);die;
        //  Contact::create($input);

        //  Send mail to admin
        Mail::send(
            'contactMail',
            array(
                'name' => $input['name'],
                'mobile_number' => $input['mobile_number'],
                'email' => $input['email'],
                'messages' => $input['message']
            ),
            function ($message) use ($request) {
                $message->from($request->email);
                // $message ->From($request->get('email'));
                $message->to('doracabspdy@gmail.com', 'Admin')->subject($request->get('message'));
            }
        );

        return redirect()->back()->with(['success' => 'Contact Form Submit & Email Send Successfully, We Will Contact You Shortly']);
    }
}
