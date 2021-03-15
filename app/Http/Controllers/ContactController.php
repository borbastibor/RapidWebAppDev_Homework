<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_message = new Message();
        $new_message->name = $request->input('name');
        $new_message->email = $request->input('email');
        $new_message->message = $request->input('message');
        $new_message->save();
    }
}