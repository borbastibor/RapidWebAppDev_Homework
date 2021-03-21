<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_user', ['users' => User::get()]);
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
            if ($this->name_exists($request->input('name'))) {
                return new Response('A megadott név már létezik!', 500);
            }

            if ($this->email_exists($request->input('email'))) {
                return new Response('A megadott e-mail már létezik!', 500);
            }

            $new_user = new User;
            $new_user->name = $request->input('name');
            $new_user->email = $request->input('email');
            $new_user->password = Hash::make($request->input('password'));
            $new_user->save();

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
        $data = null;

        if ($id != 0) {
            $data = User::find($id);
        }

        return view('admin_user_edit', ['data' => $data]);
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
            if ($this->name_exists($request->input('name'))) {
                return new Response('A megadott név már létezik!', 500);
            }

            if ($this->email_exists($request->input('email'))) {
                return new Response('A megadott e-mail már létezik!', 500);
            }

            $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();

            return new Response('Sikeres mentés!');
        } catch (Exception $e) {
            return new Response('Hiba a mentés során!', 500);
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
            $user = User::find($id);
            $messages = Message::where('user_id')->get();

            foreach ($messages as $message) { 
                $message->user_id = null;
                $message->save();
            }
            
            $user->delete();

            return new Response('Sikeres törlés!');
        } catch (Exception $e) {
            return new Response('Hiba a törléskor!', 500);
        }
    }

    private function name_exists(string $name): bool {
        if (User::where('name', $name)->get()) {
            return true;
        }

        return false;
    }

    private function email_exists(string $email): bool {
        if (User::where('email', $email)->get()) {
            return true;
        }

        return false;
    }
}