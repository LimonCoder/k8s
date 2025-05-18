<?php

namespace App\Http\Controllers;

use App\Mail\DataCreatedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Information;
use App\Models\JobPost;
use App\Models\Stake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use voku\helper\ASCII;
use Illuminate\Support\Facades\Log;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user()->type == 1) {
            // Admin: show all job posts
            $jobPosts = JobPost::with('userInfo')->orderBy('id', 'desc')->get();
        } else {
            // Normal user: show only their own job posts
            $jobPosts = JobPost::with('userInfo')
                ->where('user_id', Auth::id())
                ->orderBy('id', 'desc')
                ->get();
        }

        return view('admin.job_post.list', compact('jobPosts'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $stacks = Stake::all();
        return view('admin.job_post.add', compact('stacks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the request
        $validated = $request->validate([
            'job_title' => 'required|string|max:255',
            'stack_id' => 'required|string|max:100',
            'applied_date' => 'nullable|date',
            'vacancy' => 'required|integer|min:1',
            'education' => 'nullable|string|max:255',
            'salary' => 'nullable|string|max:255',
            'experience' => 'nullable|string',
            'additional_requirement' => 'nullable|string',
            'responsibilities' => 'nullable|string',
            'benefits' => 'nullable|string',
            'employee_status' => 'required|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();

        $jobPost = JobPost::create($validated);

        $stackWiseInformation = Information::with('stake')
        ->where('stake_id', $validated['stack_id'])
        ->get();

        // dd($stackWiseInformation);

        foreach ($stackWiseInformation as $info) {
            try {
                Mail::to($info->email)->send(new DataCreatedMail([
                    'stake_name' => $info->stake->name ?? 'N/A',
                    'description' => $info->stake->description ?? 'No description',
                    'job_title' => $jobPost->job_title,
                    'vacancy' => $jobPost->vacancy,
                    'salary' => $jobPost->salary,
                    'applied_date' => $jobPost->applied_date,
                    'employee_status' => $jobPost->employee_status,
                    'education' => $jobPost->education,
                    'experience' => $jobPost->experience,
                ]));

                Log::info("$info->email Job post mail successfully sent", [
                    'email' => $info->email,
                    'stake_name' => $info->stake->name ?? 'N/A',
                    'stake_description' => $info->stake->description ?? 'No description',
                    'job_title' => $jobPost->job_title,
                    'vacancy' => $jobPost->vacancy,
                    'salary' => $jobPost->salary,
                    'applied_date' => $jobPost->applied_date,
                    'employee_status' => $jobPost->employee_status,
                    'education' => $jobPost->education,
                    'experience' => $jobPost->experience,
                    'user_id' => $jobPost->user_id,
                    'job_post_id' => $jobPost->id,
                    'sent_at' => now()->toDateTimeString(),
                ]);

            } catch (\Exception $e) {
                Log::error("$info->email Failed to send job post mail", [
                    'email' => $info->email,
                    'error_message' => $e->getMessage(),
                    'job_post_id' => $jobPost->id,
                    'user_id' => $jobPost->user_id,
                ]);
            }
        }

        // Redirect or return response
        return redirect()->route('job_posts.index')->with('success', 'Job post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(JobPost $jobPost)
    {
       dd($jobPost);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JobPost $jobPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JobPost $jobPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JobPost $jobPost)
    {
        //
    }
}
