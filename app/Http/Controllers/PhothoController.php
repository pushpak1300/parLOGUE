<?php

namespace App\Http\Controllers;

use App\photho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\Datatables\Datatables;
use App\Traits\UploadTrait;

class PhothoController extends Controller
{
    use UploadTrait;   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photho=photho::all();
        return view('photho.index',['photho'=>$photho]);
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
// return response()->json($request->hasfile('photho'));
 if($request->hasfile('photho'))
         {
            // return response()->json($photho);
            foreach($request->file('photho') as $file)
            {
               $photho=$this->uploadOne($file); 
            }
            
         }
         return response()->json($photho);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\photho  $photho
     * @return \Illuminate\Http\Response
     */
    public function destroy(photho $photho)
    {
        $photho->delete();
        return redirect()->back();
    }
     /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        $photho=photho::all();
        return Datatables::of($photho)
            ->addColumn('thumbnail', function (photho $photho) {
            return '<img class="text-center" width=60px; height=80px; src="'.$photho->path.'">';
            })
            ->addColumn('delete', function(photho $photho) {
                return '<button id="'.$photho->id.'" class="delete fa fa-trash btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal"></button>';
            })
            ->addColumn('view', function(photho $photho) {
                return '<button id="'.$photho->path.'" class="view fa fa-search-plus btn-sm btn-success" data-toggle="modal" data-target="#viewModal"></button>';
            })
            ->addColumn('add', function(photho $photho) {
                return '<button id="'.$photho->id.'" class="add fa fa-plus btn-sm btn-success" data-toggle="modal" data-target="#addModal"></button>';
            })
            ->rawColumns(['delete','view', 'thumbnail','add'])
            ->make(true);
    }
}
