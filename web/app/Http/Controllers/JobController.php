<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::latest()->paginate(10);
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
            'company' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'salary' => 'nullable|string|max:255',
        ]);

        $validated['user_id'] = Auth::id();

        Job::create($validated);

        return redirect()->route('jobs.index')->with('success', 'Job posted successfully');
    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return view('jobs.job-details', ['job' => $job]);
    }}