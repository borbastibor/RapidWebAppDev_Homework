<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\File;
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
            if (User::where('name', $request->input('name'))->exists()) {
                return new Response('A megadott név már létezik!', 500);
            }

            if (User::where('email', $request->input('email'))->exists()) {
                return new Response('A megadott e-mail már létezik!', 500);
            }

            $new_user = new User;
            $new_user->name = $request->input('name');
            $new_user->email = $request->input('email');
            $new_user->password = Hash::make($request->input('password'));
            $new_user->save();
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
            $user = User::find($id);

            if (User::where('name', $request->input('name'))->where('id', '<>', $id)->exists()) {
                return new Response('A megadott név már létezik!', 500);
            }

            if (User::where('email', $request->input('email'))->where('id', '<>', $id)->exists()) {
                return new Response('A megadott e-mail már létezik!', 500);
            }

            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
        } catch (Exception $e) {
            return new Response('Hiba a mentés során!' . $e->getMessage(), 500);
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
            $files = File::where('user_id', $id)->get();

            foreach ($files as $file) { 
                $file->user_id = null;
                $file->save();
            }
            
            $user->delete();
        } catch (Exception $e) {
            return new Response('Hiba a törléskor!', 500);
        }
    }

    /**
     * Return ordered data
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return Collection
     */
    public function order_data(Request $request) {
        return User::orderBy($request->input('column'), $request->input('dir'))->get();
    }
}