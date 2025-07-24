@extends('layouts.app')
@section('content')
    <h2 class="text-xl font-semibold mb-4">My Applications</h2>
    <div class="grid gap-4">
        @foreach($applications as $app)
            <div class="p-4 bg-white shadow rounded">
                <h3 class="font-bold">{{ $app->job->title }}</h3>
                <p>Applied on: {{ $app->created_at->format('Y-m-d') }}</p>
                <a href="/jobs/{{ $app->job->id }}" class="text-blue-600">View Job</a>
            </div>
        @endforeach
    </div>
@endsection
