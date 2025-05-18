<?php

namespace App\Http\Controllers;

use App\Models\Information;
use App\Models\Stake;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use Intervention\Image\Drivers\Gd\Driver;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::user()->type == 1){
            $informations = Information::orderby('id', 'desc')->get();
        }else{
            $informations = Information::where('user_id', Auth::id())->orderby('id', 'desc')->get();
        }


        return view('admin.information.list', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stakes = Stake::all();
        return view('admin.information.add', compact('stakes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
// dd($request->all());
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'photo' => 'required|image',
            'age' => 'required|integer|min:0',
            'nationality' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255|unique:informations',
            'skype' => 'string|max:255',
            'whatsapp' => 'string|max:255',
            'linkedin' => 'string|max:255',
            'facebook' => 'string|max:255',
            'is_freelancer' => 'boolean',
            'language' => 'required',
            'project' => 'integer|min:0',
            'customer' => 'integer|min:0',
            'description' => 'required|string',
            'stake_id' => 'required|integer',
        ]);

        $data = [
            'user_id' => Auth::id(),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'nationality' => $request->nationality,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'skype' => $request->skype,
            'whatsapp' => $request->whatsapp,
            'linkedin' => $request->linkedin,
            'facebook' => $request->facebook,
            'is_freelancer' => $request->is_freelancer,
            'languages' => json_encode($request->language),
            'project' => $request->project,
            'customer' => $request->customer,
            'color_code' => $request->color_code,
            'description' => $request->description,
            'stake_id' => $request->stake_id,
        ];

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;

            ///image resize
            $manager = new ImageManager(new Driver());
            $photo = $manager->read($file);
            $photo->resize(600, 600)->save(public_path('admin/assets/photo/'. $filename));

            $data['photo'] = $filename;
        }

        Information::create($data);

        $notify = ['message' => 'Information added successfully!', 'alert-type' => 'success'];

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
        $information = Information::findOrFail($id);
        $stakes = Stake::all();

        return view('admin.information.edit', compact('information', 'stakes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $information = Information::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'nationality' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|unique:informations,email,'. $information->id .'|max:255',
            'skype' => 'string|max:255',
            'whatsapp' => 'string|max:255',
            'linkedin' => 'string|max:255',
            'facebook' => 'string|max:255',
            'is_freelancer' => 'boolean',
            'language' => 'required',
            'project' => 'integer|min:0',
            'customer' => 'integer|min:0',
            'description' => 'required|string',
        ]);

        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'age' => $request->age,
            'nationality' => $request->nationality,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'skype' => $request->skype,
            'whatsapp' => $request->whatsapp,
            'linkedin' => $request->linkedin,
            'facebook' => $request->facebook,
            'is_freelancer' => $request->is_freelancer,
            'languages' => json_encode($request->language),
            'project' => $request->project,
            'customer' => $request->customer,
            'color_code' => $request->color_code,
            'description' => $request->description
        ];

        if ($request->hasFile('photo')) {

            if($request->old_photo) {
                File::delete(public_path('admin/assets/photo/' . $request->old_photo));
            }

            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' . $extension;

            ///image resize
            $manager = new ImageManager(new Driver());
            $photo = $manager->read($file);
            $photo->resize(600, 600)->save(public_path('admin/assets/photo/'. $filename));

            $data['photo'] = $filename;
        }

        Information::where('id', $id)->update($data);

        $notify = ['message'=> 'Information Update Successfully', 'alert-type' => 'success'];

        return redirect()->back()->with($notify);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $information = Information::findOrFail($id);

        $information->delete();

        $notify = ['message' => 'Information successfully delete', 'alert-type' => 'error'];

        return redirect()->back()->with($notify);
    }


}
