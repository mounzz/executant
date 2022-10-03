<?php

namespace App\Http\Controllers;

use App\Models\images;
use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = categorie::all();
        return view('backoffice.images', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $images = images::paginate(3);
        return view('galerie', compact('images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = new images;
        Storage::put('public/images', $request->file('url'));
        $image -> categorie_id = $request->categorie_id;
        $image -> url = $request->file('url')->hashName();
        $image->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\images  $images
     * @return \Illuminate\Http\Response
     */
    public function show(images $images)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\images  $images
     * @return \Illuminate\Http\Response
     */
    public function edit(images $images)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\images  $images
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, images $images)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\images  $images
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = images::find($id);
        Storage::delete('public/images/' . $image->url);
        $image->delete();
        return redirect()->back();
    }

    public function download($id){
        $download = images::find($id);
        return Storage::download('public/images/' .$download->url);
    }
}
