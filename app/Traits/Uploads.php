<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;

trait Uploads
{
    public function getUploadedMediaPath($file, $folder = 'settings')
    {
        $path = '';
        if (!$file || !$file->isValid()) {
            return $path;
        }

        $file_name = $file->getClientOriginalName();
        $file->storeAs($folder, $file_name);
        $path = $folder . '/' . $file_name;
        return $path;
    }
    public function uploadMedia($file, $folder = 'settings',$disk='public')
    {
        if (!$file || !$file->isValid()) {
            return false;
        }
        try
        {
            $file_name = $file->getClientOriginalName();
            $path = $folder.'/'.$file_name;

            $exists = Storage::disk($disk)->exists($path);
            if($exists)
            {
                $file_name = time().$file_name;
                $path = $folder.'/'.$file_name;
            }
            Storage::disk($disk)->putFileAs($folder,$file,$file_name);
            return $path;
        }
        catch (\Exception $e)
        {
            return false;
        }
    }
    public function deleteMedia($path,$disk='public')
    {
        if ($path=='') {  return false; }
        try
        {
            $exists = Storage::disk($disk)->exists($path);
            if($exists)
            {
                Storage::disk($disk)->delete($path);
                return true;
            }
            else
            {
                return false;
            }
        }
        catch (\Exception $e)
        {
            return false;
        }
    }

}
