<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->type == 1) {
            $projects = Project::with('information')->latest()->get();
            $informations = Information::latest()->get();
        }else {
            $projects = Project::with('information')->where('user_id', Auth::id())->latest()->get();
            $informations = Information::where('user_id', Auth::id())->latest()->get();
        }

        return view('admin.project', compact('informations', 'projects'));
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
            'title' => 'bail|required',
            'technology' => 'bail|required',
        ]);

        $data = [
            'user_id' => Auth::id(),
            'information_id' => $request->information_id,
            'title' => $request->title,
            'client' => $request->client,
            'technology' => $request->technology,
            'url' => $request->url,
        ];

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = "PR". time(). '.' . $extension;

            ///image resize
            $manager = new ImageManager(new Driver());
            $photo = $manager->read($file);
            $photo->resize(400, 200)->save(public_path('admin/assets/photo/project/'. $filename));

            $data['image'] = $filename;
        }

        Project::create($data);

        $notify = ['message'=> 'Project Save Successfully', 'alert-type' => 'success'];

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
            'title' => 'bail|required',
            'technology' => 'bail|required',
        ]);

        $project = Project::findOrFail($id);

        $data = [
            'information_id' => $request->information_id,
            'title' => $request->title,
            'client' => $request->client,
            'technology' => $request->technology,
            'url' => $request->url,
        ];

        if ($request->hasFile('image')) {

            // Delete the old image if it exists
            if (!empty($request->old_image)) {
                File::delete(public_path('admin/assets/photo/project/' . $request->old_image));
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = "PR". time() . '.' . $extension;

            $manager = new ImageManager(new Driver());
            $photo = $manager->read($file);
            $photo->resize(400, 200)->save(public_path('admin/assets/photo/project/' . $filename));

            $data['image'] = $filename;
        }

        // Update the project with new data
        $project->update($data);

        $notify = ['message' => 'Project Updated Successfully', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrfail($id);

        $project->delete();

        $notify = ['message'=> 'Project Delete Successfully', 'alert-type' => 'success'];
        return redirect()->back()->with($notify);
    }
}
