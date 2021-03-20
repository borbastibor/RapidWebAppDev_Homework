<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images = File::where('type', 'image')->get();

        return view('gallery', ['images' => $images]);
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
            $new_image = new File;
            $new_image->description = $request->input('imagetext');
            $new_image->orig_name = $request->file('image')->getClientOriginalName();
            $new_image->extension = $request->file('image')->extension();
            $new_image->type = 'image';
            $new_image->user_id = Auth::id();
            $new_image->save();
            $request->file('image')->storeAs('public', $new_image->id . '.' . $new_image->extension);
            
            return new Response('Sikeres mentés!');
        } catch (Exception $e) {
            return new Response('Hiba a mentés során!', 500);
        }
    }

    /**
     * Destroy resource in storage.
     *
     * @param int $id
     */
    public function destroy($id) {
        try {
            $file = File::find($id);
            Storage::delete($file->id . $file->extension);
            $file->delete();

            return new Response('Sikeres törlés!');
        } catch (Exception $e) {
            return new Response('Hiba a törlés során!', 500);
        }
        
    }

}