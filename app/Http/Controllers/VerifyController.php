<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use App\Models\Verify;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = Department::all();
        $dean = User::where('role','dean')->get();
        return view('verify.create')->with(compact('departments','dean'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'file' => 'required|file|mimes:pdf|max:2048', // only PDF allowed
        ]);

        // Store file
        $filePath = $request->file('file')->store('verify_files', 'public');

        $item = new Verify();
        $item->emp_id = $request->emp_id;
        $item->emp_name = $request->name;
        $item->emp_email = $request->email;
        $item->department = $request->department;
        $item->hod_name = $request->hod_id;
        $item->dean_name = $request->dean_name;
        $item->file_name = $filePath;
        $item->status = 'pending';
        $item->save();

        return redirect('/');
    }

    public function getHodDean($department_id)
    {
    $hod = User::where('role', 'hod')->where('department', $department_id)->first();
 
    return response()->json([
        'hod_name' => $hod?->name,
        'hod_id'   => $hod?->id,
    ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Verify $verify)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Verify $verify)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Verify $verify)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Verify $verify)
    {
        //
    }
}
