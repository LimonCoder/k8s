<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Experience;
use App\Models\Information;
use App\Models\JobPost;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function home()
    {
        $isAdmin = Auth::user()->type;


        if ($isAdmin == 1) {
            $baseQueryInformation = new Information;
            $baseQuerySkill = new Skill;
            $baseQueryEducation = new Education;
            $baseQueryExperience = new Experience;
            $baseQueryProject = new Project;
            $baseQueryJobPost = new JobPost;
            $todayJobPostQuery = new JobPost; // Admin sees all job posts created today
        } elseif ($isAdmin == 2 || $isAdmin == 3) {
            $baseQueryInformation = Information::where('user_id', Auth::id());
            $baseQuerySkill = Skill::where('user_id', Auth::id());
            $baseQueryEducation = Education::where('user_id', Auth::id());
            $baseQueryExperience = Experience::where('user_id', Auth::id());
            $baseQueryProject = Project::where('user_id', Auth::id());
            $baseQueryJobPost = JobPost::where('user_id', Auth::id());
            $todayJobPostQuery = JobPost::where('user_id', Auth::id()); // Non-admin sees their own job posts created today
        } else {
            return 'test';
        }




        $information_count = $baseQueryInformation->count() ?? 0.00;
        $skill_count = $baseQuerySkill->count() ?? 0.00;
        $education_count = $baseQueryEducation->count() ?? 0.00;
        $experience_count = $baseQueryExperience->count() ?? 0.00;
        $project_count = $baseQueryProject->count() ?? 0.00;
        $job_count = $baseQueryJobPost->count() ?? 0.00;
        $today_job_count = $todayJobPostQuery->whereDate('created_at', today())->count() ?? 0.00;

        return view('admin.dashboard', compact('information_count', 'skill_count', 'education_count', 'experience_count', 'project_count', 'job_count', 'today_job_count'));
    }

}
