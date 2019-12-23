<?php 

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\photho;
use Illuminate\Http\Request;

trait UploadTrait
{
    public function uploadOne(UploadedFile $file)
    {
        $photho=new photho;
        $photho->save();
        $id=$photho->id;
        $extension=$file->getClientOriginalExtension();
        // $path = Storage::putFileAs('public', $file,$id);
        $path =Storage::putFileAs('public',$file,"".$id.".".$extension);
        $photho->path=$path;
        
        $photho->save();
        // $photho->addMediaFromDisk($path'public')->toMediaCollection();
        return $photho;
    }

     
}