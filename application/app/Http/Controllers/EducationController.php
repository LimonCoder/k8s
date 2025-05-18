<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       if (Auth::user()->type == 1){

           $educations = Education::with('information')->latest()->get();

           $informations = Information::latest()->get();
       }else {
           $educations = Education::with('information')->where('user_id', Auth::id())->latest()->get();

           $informations = Information::where('user_id', Auth::id())->latest()->get();
       }

        return view('admin.education', compact('educations','informations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "information_id" => "bail|required",
            "campus_name" => "bail|required",
            "degree" => "bail|required",
            "department" => "bail|required",
            "passing_year" => "bail|required",
        ]);

        $data = [
            "user_id" => Auth::id(),
            "information_id" => $request->information_id,
            "campus_name" => $request->campus_name,
            "degree" => $request->degree,
            "department" => $request->department,
            "passing_year" => $request->passing_year,
        ];

        Education::create($data);

        $notify = ['message' => 'Education added successfully!', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            "information_id" => "bail|required",
            "campus_name" => "bail|required",
            "degree" => "bail|required",
            "department" => "bail|required",
            "passing_year" => "bail|required",
        ]);

        $data = [
            "information_id" => $request->information_id,
            "campus_name" => $request->campus_name,
            "degree" => $request->degree,
            "department" => $request->department,
            "passing_year" => $request->passing_year,
        ];

        Education::where('id', $id)->update($data);

        $notify = ['message' => 'Education Update successfully!', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::findOrfail($id);

        $education->delete();

        $notify = ['message' => 'Education deleted successfully!', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }

    /**
     * Generate dummy education data
     */
    public function generateDummy()
    {
        try {
            Education::factory()->count(5)->create();

            return response()->json([
                'message' => '5 dummy education records created successfully!',
                'status' => 'success'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating dummy data: ' . $e->getMessage(),
                'status' => 'error'
            ]);
        }
    }
}
