<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Laravel\Socialite\Facades\Socialite;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function recruiter_register(): View
    {
        return view('auth.recruiter_register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => 2,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect(route('verification.notice'));
    }

    public function redirectToGoogle($userType = null): RedirectResponse
    {
        $url = Socialite::driver('google')->redirect()->getTargetUrl();

        $parsedUrl = parse_url($url);
        parse_str($parsedUrl['query'], $queryParams);
        $state = $queryParams['state'] ?? null;
        if ($userType) {
            Cache::put($state, $userType, now()->addSeconds(30));
        }

        return redirect()->away($url);
    }

    public function socialLogin(Request $request): RedirectResponse
    {
        $state = $request->get('state');
        $socialUser = Socialite::driver('google')->stateless()->user();
        $userData = User::where('email', $socialUser->email)->first();
        if ($userData) {
            Auth::login($userData);
            return redirect(route('dashboard', absolute: false));
        }


        $user = User::create([
            'name' => $socialUser->name,
            'email' => $socialUser->email,
            'type' => Cache::get($state),
            'password' => '',
            'email_verified_at' => now(),
            'is_social_login' => 1,
        ]);

        event(new Registered($user));
        Auth::login($user);
        return redirect(route('dashboard', absolute: false));
    }

    public function recruiterStore(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'location' => ['required', 'string', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg'],
        ]);

        // Handle logo upload
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $filename = time() . '_' . $logo->getClientOriginalName();

            // Move logo to public/admin/assets/logos
            $destinationPath = public_path('admin/assets/logos');
            $logo->move($destinationPath, $filename);

            // Save the relative path
            $logoPath = 'admin/assets/logos/' . $filename;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => 3,
            'password' => Hash::make($request->password),
            'location' => $request->location,
            'logo' => $logoPath,
        ]);


        event(new Registered($user));
        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
