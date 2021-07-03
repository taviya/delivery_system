<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Session;
use Validator;
use DB;
use App\User;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberMail;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class SubscriberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::pluck('email')->toArray();
        $subscribers = Subscriber::pluck('email')->toArray();

        $data['emails'] = array_merge($users,$subscribers);
        
        return view('admin.subscribers.index',$data);
    }

    public function mailtosubsc(Request $request) {
        $validatedRequest = $request->validate([
            'subject' => 'required',
            'body' => 'required'
        ]);
        $users = User::pluck('email')->toArray();
        $subscribers = Subscriber::pluck('email')->toArray();

        $emails = array_merge($users,$subscribers);
        $senddata = $request->all();
        foreach ($emails as $subscriber) {
            $to = $subscriber;
            $name = 'Administration';
            $subject = $request->subject;
            $message = $request->message;
            // Mail::to($subscriber)->send(new SubscriberMail($senddata));
        }
        Session::flash('success', 'Mail sent to all subscribers.');
        return redirect()->back();
    }

}
