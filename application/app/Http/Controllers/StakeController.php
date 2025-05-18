<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Stake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stakes = []; 
    
        if (Auth::check() && Auth::user()->type == 1) {
            $stakes = Stake::all();
        }
    
        return view('admin.stake', compact('stakes'));
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
            'name' => 'bail|required|string',
            'description' => 'bail|required|string',
        ]);
    
        $data = [
            'name' => $request->name, 
            'description' => $request->description,
        ];
    
        Stake::create($data);
    
        $notify = ['message' => 'Stake added successfully!', 'alert-type' => 'success'];
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
            'name' => 'bail|required|string',
            'description' => 'bail|required|string',
        ]);

        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        Stake::where('id', $id)->update($data);

        $notify = ['message' => 'Stake updated successfully!', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stake = Stake::findOrfail($id);

        $stake->delete();

        $notify = ['message' => 'Stake deleted successfully!', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }
}
