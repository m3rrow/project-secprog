<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the user's profile
     */
    public function show()
    {
        $user = Auth::user();
        
        if ($user->role === 'freelancer') {
            return view('freelancer-profile', ['user' => $user]);
        }
        
        return view('user-profile', ['user' => $user]);
    }

    /**
     * Update user profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        
        try {
            // Validate input
            $validated = $request->validate([
                'fullname' => 'nullable|string|max:255|regex:/^[a-zA-Z\s]+$/',
                'phone' => 'nullable|string|max:20|regex:/^[\d\+\-\s\(\)]+$/',
                'address' => 'nullable|string|max:255',
                'company_name' => 'nullable|string|max:255',
                'about_me' => 'nullable|string|max:1000',
                'skills' => 'nullable|string|max:500',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'cv' => 'nullable|file|mimes:pdf,doc,docx|max:5120',
                'portfolio' => 'nullable|file|mimes:pdf,zip,rar|max:10240',
                'government_id' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            ], [
                'fullname.regex' => 'Name can only contain letters and spaces.',
                'phone.regex' => 'Phone number format is invalid.',
                'profile_picture.max' => 'Profile picture must not exceed 2MB.',
                'profile_picture.image' => 'Profile picture must be a valid image file.',
                'cv.max' => 'CV file must not exceed 5MB.',
                'portfolio.max' => 'Portfolio file must not exceed 10MB.',
                'government_id.max' => 'Government ID must not exceed 2MB.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Re-throw validation exceptions so Laravel can handle them properly
            throw $e;
        } catch (\Exception $e) {
            // Handle any other file upload errors
            return back()
                ->withInput()
                ->withErrors([
                    'file_upload' => 'An error occurred while uploading files. Please ensure your files are not too large and try again.'
                ]);
        }

        try {
            // Handle profile picture upload
            if ($request->hasFile('profile_picture')) {
                // Delete old profile picture if exists
                if ($user->profile_picture) {
                    \Storage::disk('public')->delete($user->profile_picture);
                }
                $path = $request->file('profile_picture')->store('profile_pictures', 'public');
                $validated['profile_picture'] = $path;
            }

            // Handle CV upload
            if ($request->hasFile('cv')) {
                if ($user->cv) {
                    \Storage::disk('public')->delete($user->cv);
                }
                $path = $request->file('cv')->store('documents/cv', 'public');
                $validated['cv'] = $path;
            }

            // Handle Portfolio upload
            if ($request->hasFile('portfolio')) {
                if ($user->portfolio) {
                    \Storage::disk('public')->delete($user->portfolio);
                }
                $path = $request->file('portfolio')->store('documents/portfolio', 'public');
                $validated['portfolio'] = $path;
            }

            // Handle Government ID upload
            if ($request->hasFile('government_id')) {
                if ($user->government_id) {
                    \Storage::disk('public')->delete($user->government_id);
                }
                $path = $request->file('government_id')->store('documents/government_id', 'public');
                $validated['government_id'] = $path;
            }

            // Map fullname to name for the database column
            if (isset($validated['fullname'])) {
                $validated['name'] = $validated['fullname'];
                unset($validated['fullname']);
            }

            // Update user with validated data
            $user->update($validated);

            return back()->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            // Handle storage errors
            return back()
                ->withInput()
                ->withErrors([
                    'file_upload' => 'An error occurred while saving files. Please try again.'
                ]);
        }
    }

    /**
     * Change user password
     */
    public function changePassword(Request $request)
    {
        $user = Auth::user();

        // Validate password change
        $validated = $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Current password is incorrect.');
                    }
                },
            ],
            'new_password' => [
                'required',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/',
                'confirmed',
            ],
        ], [
            'new_password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
            'new_password.min' => 'Password must be at least 8 characters long.',
        ]);

        // Update password
        $user->update([
            'password' => Hash::make($validated['new_password']),
        ]);

        return back()->with('success', 'Password changed successfully!');
    }
}
