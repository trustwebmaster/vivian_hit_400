<?php

namespace App\Http\Controllers;

use App\StudentUpload;
use Illuminate\Http\Request;
use App\Http\Requests\Student\CreateUploadsRequest;

class StudentUploadsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = StudentUpload::all();

        return view('student.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.uploaded');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUploadsRequest $request)
    {
        $file = $request->file->store('uploads/student', 'public');

        StudentUpload::create([
            'description' => $request->description,
            'file' => $file
        ]);

        session()->flash('success', 'Assignment upload successfully');

        return redirect(route('uploaded.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(StudentUpload $upload)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $upload = StudentUpload::findOrFail($id);

        return view('student.uploaded', compact('upload'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $upload = StudentUpload::findOrFail($id);

        $data = $request->all();

        $upload->update($data);

        session()->flash('success', 'Assignment updated successfully');

        return redirect(route('uploaded.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $upload = StudentUpload::findOrFail($id);

        $upload->delete();

        session()->flash('success', 'Assignment deleted successfully');

        return redirect(route('uploaded.index'));
    }

    public function download($id){

      $file = StudentUpload::where('id' ,$id)->firstOrFail();
      $pathToFile = storage_path('uploads/student', 'public', $file->file);
      return response()->download($pathToFile);
    }
}
