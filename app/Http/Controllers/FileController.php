<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File as FileFacade;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_file', ['files' => File::get()]);
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
            $new_file = new File;
            $new_file->description = $request->input('description');
            $new_file->orig_name = $request->file('fileinput')->getClientOriginalName();
            $new_file->extension = $request->file('fileinput')->extension();
            $new_file->type = $request->input('type');
            $new_file->user_id = Auth::id();
            $new_file->save();
            $request->file('fileinput')->storeAs('public', $new_file->id . '.' . $new_file->extension);
            
            return new Response('Sikeres mentés!');
        } catch (Exception $e) {
            return new Response('Hiba a mentés során!', 500);
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
            $data = File::find($id);
        }

        return view('admin_file_edit', ['data' => $data]);
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
            $file = File::find($id);
            $file->description = $request->input('description');
            $file->type = $request->input('type');
            $file_input = $request->file('fileinput');
            $file->user_id = Auth::id();

            if ($file_input) {
                FileFacade::delete(storage_path('app/public/' . $file->id . '.' . $file->extension));
                $file->orig_name = $request->file('fileinput')->getClientOriginalName();
                $file->extension = $request->file('fileinput')->extension();
                $request->file('fileinput')->storeAs('public', $file->id . '.' . $file->extension);
            }

            $file->save();
        } catch (Exception $e) {
            return new Response('Hiba a mentés során! - ' . $e->getMessage(), 500);
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
            $file = File::find($id);
            $file->delete();
            FileFacade::delete(storage_path('app/public/' . $file->id . '.' . $file->extension));
        } catch (Exception $e) {
            return new Response('Hiba a törlés során!', 500);
        }
    }

}
