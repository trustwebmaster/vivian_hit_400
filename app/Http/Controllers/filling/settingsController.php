<?php
namespace App\Http\Controllers\filling;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\shelve;
use App\section;
use Exception;
use Illuminate\Database\QueryException;

class settingsController extends Controller
{
    public function folders()
    {
        $shelves = DB::table('shelves')->get();
        $sections = DB::table('sections')->get();
        return view('e-filling/folders',['shelves' => $shelves,'sections' => $sections]);
    }
    public function addshelve()
    {
        $shelve = new shelve();

        $shelve->shelve = request('shelve');
        $shelve->description = request('description');
        $shelve->accessibility = request('accessibility');
        $shelve->attributes = request('attributes');
        $shelve->contents = 0;
        $shelve->capacity = request('capacity');
        $shelve->allocated_capacity = 0;

        if($shelve->save())
        {
            return redirect('/e-filling/settings/shelves')->with('success', 'shelve successfully added !!'); 
        }
        else{
            return redirect('/e-filling/settings/shelves')->with('danger', 'Failed please ensure all fields are completed before trying again !!'); 
        }

        
    }
    public function sections()
    {
        $shelves = DB::table('shelves')->get();
        $sections = DB::table('shelves')
                    ->join('sections','sections.shelve_id','=','shelves.id')
                    ->get();
        return view('e-filling/sections',['sections' => $sections,'shelves' => $shelves]);
    }
    public function addsection()
    {
        $section = new section();

        $section->shelve_id = request('shelve');
        $section->section = request('section');
        $section->description = request('description');
        $section->accessibility = request('accessibility');
        $section->attributes = request('attributes');
        $section->contents = 0;
        $section->capacity = request('capacity');
        $section->used_capacity = 0;

        if($section->save())
        {
            return redirect('/e-filling/settings/sections')->with('success', 'shelve successfully added !!'); 
        }
        else{
            return redirect('/e-filling/settings/sections')->with('danger', 'Failed please ensure all fields are completed before trying again !!'); 
        }
    }
}
