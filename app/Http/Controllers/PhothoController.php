<?php

namespace App\Http\Controllers;

use App\photho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhothoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     $this->validate($request, [
                'photho' => 'required',
                'photho.*' => 'mimes:png,jpeg,gif,jpg'
]);   
 if($request->hasfile('photho'))
         {

            foreach($request->file('photho') as $file)
            {
                $photho=new photho;
                $photho->save();
                $id=$photho->id;
                $extension=$file->getClientOriginalExtension();
                // $path = Storage::putFileAs('public', $file,$id);
                $path =Storage::putFileAs('public',$file,"".$id.".".$extension);
                $photho->path=$path;
                $photho->save();
            }
         }
return response()->json($photho);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\photho  $photho
     * @return \Illuminate\Http\Response
     */
    public function show(photho $photho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\photho  $photho
     * @return \Illuminate\Http\Response
     */
    public function edit(photho $photho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\photho  $photho
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, photho $photho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\photho  $photho
     * @return \Illuminate\Http\Response
     */
    public function destroy(photho $photho)
    {
        //
    }
}
