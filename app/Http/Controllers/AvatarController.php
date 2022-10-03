<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\avatar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $avatars = avatar::all();
        return view('backoffice.avatars', compact('avatars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $avatar = new avatar;

        Storage::put('public/avatars', $request->file('url'));
        $avatar -> name = $request->name;
        $avatar -> url = $request->file('url')->hashName();
        $avatar->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function show(avatar $avatar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function edit(avatar $avatar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, avatar $avatar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\avatar  $avatar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $avatar = avatar::find($id);
        $users = User::where("avatar_id","=",$id)->get();
        foreach ($users as $user) {
            $user->avatar_id = 1;
            $user->save();
        }
        Storage::delete('public/avatars/' . $avatar->url);
        $avatar->delete();
        return redirect()->back();
    }
}
