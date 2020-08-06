<?php

namespace App\Http\Controllers\filling;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use App\public_file;

class uploadcontroller extends Controller
{
    public function public_upload( Request $request)
    {
        // dd(request())/\;
        $upload = new public_file();

        $upload->section_id = request('section_id');
        $upload->file = request('filename');
        $upload->description = request('description');
        // 
        $path = 'Uploads-';
        $filename = 'File-'. '.' . request()->file('fileToUpload')->getClientOriginalExtension();
        request()->file('fileToUpload')->storeAs($path,$filename);
        $path2 = Storage::disk('local')->getAdapter()->applyPathPrefix($path.'/'.$filename);
        // 
        // $target_dir = "/Uploads/";
        // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        // $uploadOk = 1;
        // $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // $upload->format = $imageFileType;

        // if (file_exists($target_file))
        // {
        //     return back()->with('danger','File already exist');
        //     $uploadOk = 0;
        // }

        // Check file size
        // if ($_FILES["fileToUpload"]["size"] > 50000000) {
        //     return back()->with('success', "Operation failed !! The file ". basename( $_FILES["fileToUpload"]["name"]). "size is not Recommended");
        //     $uploadOk = 0;
        // }

        // if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //     $filename = basename($_FILES['fileToUpload']['name']);
        //     $filepath = $target_dir.$filename;

            $upload->path = $path2;
            $upload->size = 5;
            $upload->uploaded_by = "Teachers";
            $upload->format = "hidden";
            $upload->save();

            return back()->with('success','File successfully uploaded');
           
        }

    
    }