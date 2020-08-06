<?php
namespace App\Http\Controllers\filling;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class dashboardController extends Controller
{
	public function __construct(){
		return $this->middleware('auth');
	}

    public function dashboard()
    {
        $files =  DB::table('public_files')
        ->join('public_sections','public_sections.id','public_files.section_id')
        ->where('public_sections.accessibility','Public')
        ->count();

        $personalfiles = DB::table('public_files')
        ->join('public_sections','public_sections.id','public_files.section_id')
        ->Where('public_sections.accessibility','lads-private:'.Auth::User()->id)
        ->count();

        // dd($personalfiles);

        return view('e-filling/index' , compact('files'));
    }
}
 