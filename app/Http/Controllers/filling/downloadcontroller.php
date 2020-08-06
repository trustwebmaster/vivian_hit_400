<?php

namespace App\Http\Controllers\filling;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\download_audit_trail;

class downloadcontroller extends Controller
{
    public function download($id)
    {

        if(!empty($_SERVER['HTTP_CLIENT_IP'])){
            //ip from share internet
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            //ip pass from proxy
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        $download = new download_audit_trail();

        $download->user = "Teachers";
        $download->file = DB::table('public_files')->where('id',$id)->value('file');
        $download->computer = $ip;

        $download->save();

        return response()->download(DB::table('public_files')->where('id',$id)->value('path'));
    }
}
