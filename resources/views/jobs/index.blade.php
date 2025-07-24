@extends('layouts.app')
@section('content')
    <h2 class="text-2xl font-semibold mb-4">Job Listings</h2>
    <div class="grid gap-4">
        @foreach($jobs as $job)
            <div class="p-4 bg-white shadow rounded">
                <h3 class="text-xl font-bold">{{ $job->title }}</h3>
                <p>{{ $job->location }} | ${{ $job->salary }}</p>
                <p>Deadline: {{ $job->deadline }}</p>
                <a href="/jobs/{{ $job->id }}" class="text-blue-600">View Details</a>
            </div>
        @endforeach
    </div>
@endsection
