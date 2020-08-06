<?php

namespace App\Http\Controllers\filling;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class departmentcontroller extends Controller
{
    public function department()
    {
        $sections = DB::table('public_sections')->where('accessibility','Students')->get();
        return view('e-filling/public',['sections' => $sections]);
    }
    public function personal()
    {
        $sections = DB::table('public_sections')->where('accessibility','Teachers')->get();
        return view('e-filling/public',['sections' => $sections]);
    }
}
