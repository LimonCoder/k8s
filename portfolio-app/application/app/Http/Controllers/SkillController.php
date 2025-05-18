<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->type == 1) {
            $skills = Skill::with('information')->latest()->get();

            $informations = Information::latest()->get();

        }else {
            $skills = Skill::with('information')->where('user_id', Auth::id())->latest()->get();

            $informations = Information::where('user_id', Auth::id())->latest()->get();
        }

        return view('admin.skill', compact('skills', 'informations'));
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
            'information_id' => 'bail|required|integer',
            'skill_name' => 'bail|required|string',
            'percentage' => 'bail|required',
        ]);

        $data = [
            'user_id' => Auth::id(),
            'information_id' => $request->information_id,
            'skill_name' => $request->skill_name,
            'percentage' => $request->percentage
        ];

        Skill::create($data);

        $notify = ['message' => 'Skill added successfully!', 'alert-type' => 'success'];

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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'information_id' => 'bail|required|integer',
            'skill_name' => 'bail|required|string',
            'percentage' => 'bail|required',
        ]);

        $data = [
            'information_id' => $request->information_id,
            'skill_name' => $request->skill_name,
            'percentage' => $request->percentage,
        ];

        Skill::where('id', $id)->update($data);

        $notify = ['message' => 'Skill updated successfully!', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::findOrfail($id);

        $skill->delete();

        $notify = ['message' => 'Skill deleted successfully!', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }
}
