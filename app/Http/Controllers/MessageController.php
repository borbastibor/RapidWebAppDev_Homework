<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

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
        $data = null;

        if ($id != 0) {
            $data = Message::find($id);
        }

        return view('admin_message_edit', ['data' => $data]);
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
        try {
            $message = Message::find($id);
            $message->name = $request->input('name');
            $message->email = $request->input('email');
            $message->message = $request->input('message');
            $message->save();
        } catch (Exception $e) {
            return new Response('Hiba a mentés során!'.$e->getMessage(), 500);
        }
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
        } catch (Exception $e) {
            return new Response('Hiba a törléskor!', 500);
        }
    }

    /**
     * Return ordered data
     * 
     * @param string $dir
     * @return Collection
     */
    public function order_data($dir) {
        return DB::table('messages')->orderBy('created_at', $dir)->get();
    }
}
