@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 shadow rounded">
        <h1 class="text-2xl font-bold mb-4">Application Details</h1>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">For Job: {{ $application->job->title }}</h2>
            <p><strong>Applicant:</strong> {{ $application->user->name }}</p>
            <p><strong>Email:</strong> {{ $application->user->email }}</p>
            <p><strong>Applied on:</strong> {{ $application->created_at->format('M d, Y') }}</p>
        </div>

        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2">Cover Letter</h3>
            <div class="p-4 bg-gray-50 rounded">
                {!! nl2br(e($application->cover_letter)) !!}
            </div>
        </div>

        <div class="mb-6">
            <a href="{{ Storage::url($application->cv_path) }}"
               class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
               download="CV_{{ $application->user->name }}.pdf">
                Download CV
            </a>
        </div>

        <a href="{{ route('jobs.applicants', $application->job) }}"
           class="text-blue-500 hover:text-blue-700">
            ← Back to Applicants
        </a>
    </div>
@endsection
