<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StakeController;
use App\Http\Controllers\SkillController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/health', function () {
    return response()->json([
        'message' => 'Pod responding',
        'pod_ip' => request()->server('SERVER_ADDR'),
        'hostname' => gethostname(),
    ]);
});


Route::get('/portfolio/{portfolio}', [HomeController::class, 'show'])->name('portfolio.show');
Route::get('/job_post/{jobs_post}', [HomeController::class, 'jobPostShow'])->name('job_post.show');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::resource('contacts',ContactController::class);
//admin route

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [DashboardController::class, 'home'])->name('dashboard');
    Route::resource('informations', InformationController::class);
    Route::resource('skills', SkillController::class);
    Route::resource('educations',EducationController::class);
    Route::get('/generate-dummy-education', [EducationController::class, 'generateDummy'])->name('education.generate-dummy');
    Route::resource('experiences',ExperienceController::class);
    Route::resource('projects',ProjectController::class);
    Route::resource('stakes',StakeController::class);
    Route::resource('job_posts',JobPostController::class);
});

# Social login Routes
Route::get('/auth/google/redirect/{userType?}',[RegisteredUserController::class,'redirectToGoogle'])->name('google_authentication');
Route::get('/auth/google/callback',[RegisteredUserController::class,'socialLogin']);


# Email Verification Routes
Route::middleware('auth')->group(function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect()->route('dashboard')->with('verified', true);
    })->middleware('signed')->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');
    })->middleware('throttle:6,1')->name('verification.send');
});
