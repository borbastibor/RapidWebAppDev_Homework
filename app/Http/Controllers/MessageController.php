<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        return view('admin_message', ['messages' => Message::get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $new_message = new Message();
            $new_message->name = $request->input('name');
            $new_message->email = $request->input('email');
            $new_message->message = $request->input('message');
            $new_message->save();

            return new Response('Sikeres mentés!');
        } catch (Exception $e) {
            return new Response('Hiba a mentéskor!', 500);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $message = Message::find($id);
            $message->delete();

            return new Response('Sikeres törlés!');
        } catch (Exception $e) {
            return new Response('Hiba a törléskor!', 500);
        }
    }
}
