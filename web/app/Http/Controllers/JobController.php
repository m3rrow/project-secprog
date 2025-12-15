<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        // Validate all input parameters
        $validated = request()->validate([
            'search' => 'nullable|string|max:255',
            'category' => 'nullable|string|max:100',
            'rate_type' => 'nullable|in:fixed,hourly',
            'min_rate' => 'nullable|numeric|min:0|max:1000000',
            'max_rate' => 'nullable|numeric|min:0|max:1000000',
            'job_type' => 'nullable|string|max:100',
            'location' => 'nullable|string|max:255',
        ]);

        $query = Job::where('is_active', true);

        // Search functionality
        if($validated['search'] ?? null) {
            $search = $validated['search'];
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('skills', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if($validated['category'] ?? null) {
            $query->where('category', $validated['category']);
        }

        // Filter by rate type
        if($validated['rate_type'] ?? null) {
            $query->where('rate_type', $validated['rate_type']);
        }

        // Filter by rate range
        if($validated['min_rate'] ?? null) {
            $query->where('rate', '>=', $validated['min_rate']);
        }
        if($validated['max_rate'] ?? null) {
            $query->where('rate', '<=', $validated['max_rate']);
        }

        // Filter by employment type
        if($validated['job_type'] ?? null) {
            $query->where('job_type', $validated['job_type']);
        }

        // Filter by location
        if($validated['location'] ?? null) {
            $query->where('location', 'like', '%' . $validated['location'] . '%');
        }

        $jobs = $query->latest()->paginate(10);
        return view('jobs.jobs-listing', ['jobs' => $jobs]);
    }

    public function create()
    {
        return view('jobs.post-jobs');
    }

    public function store(Request $request)
    {
        // Authorize: Only freelancers can post services
        if (Auth::user()->role !== 'freelancer') {
            return redirect('/')->with('error', 'Only freelancers can post services');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'scope' => 'nullable|string|max:500',
            'category' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'rate' => 'nullable|numeric|min:0|max:1000000',
            'rate_type' => 'nullable|in:fixed,hourly',
            'estimated_hours' => 'nullable|integer|min:1|max:10000',
            'skills' => 'nullable|string|max:500',
            'job_type' => 'nullable|string|max:100',
            'experience' => 'nullable|string|max:255',
        ]);

        // Sanitize description to prevent XSS
        if($validated['description'] ?? null) {
            $validated['description'] = strip_tags($validated['description']);
        }

        $validated['user_id'] = Auth::id();
        $validated['is_active'] = true;

        Job::create($validated);

        return redirect()->route('freelancer.dashboard')->with('success', 'Service posted successfully');
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.job-details', ['job' => $job]);
    }

    public function checkout($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.checkout', ['job' => $job]);
    }

    /**
     * Edit job listing page
     */
    public function edit($id)
    {
        $job = Job::findOrFail($id);

        // Authorize: User must own this job
        if ($job->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        return view('jobs.edit-job', ['job' => $job]);
    }

    /**
     * Update existing job listing
     */
    public function update(Request $request, $id)
    {
        $job = Job::findOrFail($id);

        // Authorize: User must own this job
        if ($job->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:5000',
            'scope' => 'nullable|string|max:500',
            'category' => 'nullable|string|max:100',
            'company' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'rate' => 'nullable|numeric|min:0|max:1000000',
            'rate_type' => 'nullable|in:fixed,hourly',
            'estimated_hours' => 'nullable|integer|min:1|max:10000',
            'skills' => 'nullable|string|max:500',
            'job_type' => 'nullable|string|max:100',
            'experience' => 'nullable|string|max:255',
        ]);

        // Sanitize description
        if($validated['description'] ?? null) {
            $validated['description'] = strip_tags($validated['description']);
        }

        $job->update($validated);

        return redirect()->route('jobs.show', $job->id)
            ->with('success', 'Service updated successfully');
    }

    /**
     * Delete job listing
     */
    public function destroy($id)
    {
        $job = Job::findOrFail($id);

        // Authorize: User must own this job
        if ($job->user_id !== Auth::id()) {
            abort(403, 'Unauthorized');
        }

        $job->delete();

        return redirect()->route('freelancer.dashboard')
            ->with('success', 'Service deleted successfully');
    }
}
