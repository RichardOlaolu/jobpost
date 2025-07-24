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
                <a href="/jobs/{{ $job->id }}/apply" class="mt-4 inline-block bg-green-500 text-white px-4 py-2 rounded">Apply</a>
            @endif
        @endauth
    </div>
@endsection
