<?php
namespace App\Traits;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


trait StorageImageTrait{
    public function storageTraitUpload($request,$fileNameUpload,$fodelName)
    {
        if($request->hasFile($fileNameUpload))
        {
            $file = $request->$fileNameUpload;
            $fileName = $file->getClientOriginalName();
            $fileNameHash = Str::random(20). '.' .$file->getClientOriginalExtension();
            $filePath = $request->file($fileNameUpload)->storeAs('public/'.$fodelName.'/'.auth()->id(),$fileNameHash);
            $dataUpload = [
                'image_path' => Storage::url($filePath),
                'image_name' => $fileName
            ];
            return $dataUpload;
        }
        return null;
    }
    public function storageTraitMutiUpload($file, $fodelName)
    {
        $fileName = $file->getClientOriginalName();
        $fileNameHash = Str::random(20). '.' .$file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/'.$fodelName.'/'.auth()->id(),$fileNameHash);
        $dataUpload = [
            'image_path' => Storage::url($filePath),
            'image_name' => $fileName
        ];
        return $dataUpload;
    }
}
