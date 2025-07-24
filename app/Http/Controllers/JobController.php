<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    // List all public jobs
    public function index()
    {
        $jobs = Job::latest()->get();
        return view('jobs.index', compact('jobs'));
    }

    // Show single job
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    // Company: show form to create job
    public function create()
    {
        return view('jobs.create');
    }

    // Company: store new job
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'required|numeric',
            'deadline' => 'required|date|after:today',
        ]);

        Job::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'salary' => $request->salary,
            'deadline' => $request->deadline,
        ]);

        return redirect('/my-jobs')->with('success', 'Job posted successfully!');
    }

    // Company: view own jobs
    public function myJobs()
    {
        $jobs = Job::where('user_id', Auth::id())->get();
        return view('dashboard.my-jobs', compact('jobs'));
    }

    // Company: edit a job
    public function edit(Job $job)
    {
        $this->authorizeJobOwner($job);
        return view('jobs.edit', compact('job'));
    }

    // Company: update job
    public function update(Request $request, Job $job)
    {
        $this->authorizeJobOwner($job);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
            'salary' => 'required|numeric',
            'deadline' => 'required|date|after:today',
        ]);

        $job->update($request->only(['title', 'description', 'location', 'salary', 'deadline']));

        return redirect('/my-jobs')->with('success', 'Job updated.');
    }

    // Company: delete job
    public function destroy(Job $job)
    {
        $this->authorizeJobOwner($job);
        $job->delete();
        return redirect('/my-jobs')->with('success', 'Job deleted.');
    }

    // Job seeker: show application form
    public function applyForm(Job $job)
    {
        return view('jobs.apply', compact('job'));
    }

    // Job seeker: apply to a job
    public function apply(Request $request, Job $job)
    {
        $request->validate([
            'cover_letter' => 'required',
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        $cvPath = $request->file('cv')->store('cvs', 'public');

        Application::create([
            'user_id' => Auth::id(),
            'job_id' => $job->id,
            'cover_letter' => $request->cover_letter,
            'cv_path' => $cvPath,
        ]);

        return redirect('/my-applications')->with('success', 'Application submitted.');
    }

    // Job seeker: view applications
    public function myApplications()
    {
        $applications = Auth::user()->applications()->with('job')->get();
        return view('dashboard.my-applications', compact('applications'));
    }

    // Helper to ensure only job owner (company) can edit/delete
    private function authorizeJobOwner(Job $job)
    {
        if ($job->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
    }
}
