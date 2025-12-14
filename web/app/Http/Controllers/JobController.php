<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $query = Job::where('is_active', true);

        // Search functionality
        if(request('search')) {
            $search = request('search');
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('category', 'like', "%{$search}%")
                  ->orWhere('skills', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if(request('category')) {
            $query->where('category', 'like', '%' . request('category') . '%');
        }

        // Filter by rate type
        if(request('rate_type')) {
            $query->where('rate_type', request('rate_type'));
        }

        // Filter by rate range
        if(request('min_rate')) {
            $query->where('rate', '>=', request('min_rate'));
        }
        if(request('max_rate')) {
            $query->where('rate', '<=', request('max_rate'));
        }

        // Filter by employment type
        if(request('job_type')) {
            $query->where('job_type', request('job_type'));
        }

        // Filter by location
        if(request('location')) {
            $query->where('location', 'like', '%' . request('location') . '%');
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
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'scope' => 'nullable|string',
            'category' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'rate' => 'nullable|numeric|min:0',
            'rate_type' => 'nullable|in:fixed,hourly',
            'estimated_hours' => 'nullable|integer|min:1',
            'skills' => 'nullable|string',
            'job_type' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();
        $validated['is_active'] = true;

        Job::create($validated);

        return redirect()->route('jobs.index')->with('success', 'Service posted successfully');
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
}
