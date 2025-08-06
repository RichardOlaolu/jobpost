@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 shadow rounded">
        <h2 class="text-2xl font-bold mb-2">{{ $job->title }}</h2>
        <p class="mb-1"><strong>Location:</strong> {{ $job->location }}</p>
        <p class="mb-1"><strong>Salary:</strong> ${{ $job->salary }}</p>
        <p class="mb-1"><strong>Deadline:</strong> {{ $job->deadline }}</p>
        <p class="mt-4">{{ $job->description }}</p>

        @auth
            @if(Auth::user()->role === 'job_seeker')
                <a href="/jobs/{{ $job->id }}/apply" class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                    Apply Now
                </a>
            @else
                <button class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded opacity-50 cursor-not-allowed" disabled title="Only job seekers can apply">
                    Apply Now
                </button>
                @if(Auth::user()->role === 'company')
                    <p class="text-sm text-gray-500 mt-2">You're logged in as a company. Job seekers can apply for this position.</p>
                @endif
            @endif
        @else
            <a href="{{ route('login') }}" class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                Sign up/Login to Apply
            </a>
            <p class="text-sm text-gray-500 mt-2">Create a job seeker account to apply for this position.</p>
        @endauth
    </div>
@endsection
