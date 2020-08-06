<?php

namespace App\Http\Controllers\filling;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\public_section;


class publicfoldercontroller extends Controller
{
    public function PublicFolder()
    {
        $sections = DB::table('public_sections')->where('accessibility','Public')->get();
        return view('e-filling/public',['sections' => $sections]);
    }

    public function addsection()
    {
        $section = new public_section();

        $section->section = request('section');
        $section->description = request('description');
        $section->accessibility = request('accessibility');
        $section->capacity = request('capacity');
        $section->capacity_used = 0;

        $section->save();

        return redirect('/e-filling/public-sections')->with('success',request('section').' successfully added');
        
    }
    
    public function files($id)
    {
        $files = DB::table('public_files')->where('section_id',$id)->get();
        $sections = DB::table('public_sections')->where('id',$id)->get();
        return view('e-filling/files',['files' => $files,'sections' => $sections,'id' => $id]);
    }
}
