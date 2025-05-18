<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (Auth::user()->type == 1) {
            $experiences = Experience::with('information')->latest()->get();

            $informations = Information::latest()->get();
        }else {

            $experiences = Experience::with('information')->where('user_id', Auth::id())->latest()->get();

            $informations = Information::where('user_id', Auth::id())->latest()->get();
        }


        return view('admin.experience', compact('informations', 'experiences'));
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
            'information_id' => 'bail|required',
            'company_name' => 'bail|required',
            'designation' => 'bail|required',
            'start_date' => 'bail|required|date',
            'responsibility' => 'bail|required',
        ]);

        $data = [
            'user_id' => Auth::id(),
            'information_id' => $request->information_id,
            'company_name' => $request->company_name,
            'designation' => $request->designation,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'responsibility' => $request->responsibility,
        ];

        Experience::create($data);

        $notify = ['message' => 'Experience added successfully!', 'alert-type' => 'success'];

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
            'information_id' => 'bail|required',
            'company_name' => 'bail|required',
            'designation' => 'bail|required',
            'start_date' => 'bail|required|date',
            'responsibility' => 'bail|required',
        ]);

        $data = [
            'information_id' => $request->information_id,
            'company_name' => $request->company_name,
            'designation' => $request->designation,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'responsibility' => $request->responsibility,
        ];

        Experience::where('id', $id)->update($data);

        $notify = ['message' => 'Experience update successfully!', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $experience = Experience::findOrfail($id);

        $experience->delete();

        $notify = ['message' => 'Experience deleted successfully!', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }
}
