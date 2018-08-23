<?php

namespace App\Http\Controllers;

use App\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function profile()
    {

        $user_id = auth()->user()->id;


            $reserve = Reserve::with(['apartment', 'user'])
                ->where('user_id', $user_id)
                ->orderBy('reservation_day', 'desc')
                ->get();


            return view('pages.profile')->with('reserves', $reserve);

    }


    public function postContact(Request $request)
    {


        $this->validate($request,[
            'email' => 'required|email',
            'subject' => 'min:3|max:50',
            'message' => 'min:10|max:500'
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

  //      dd($data);die;

        Mail::send('email.index', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('aleksandarkastro@gmail.com');
            $message->subject($data['subject']);

        });

        Session::flush('success','Your send a message.');

        return redirect('/');

    }

}
