@extends('layouts.app')

@section('content')
    <h2 class="text-xl font-semibold mb-4">My Job Posts</h2>
    <div class="grid gap-4">
        @foreach($jobs as $job)
            <div class="p-4 bg-white shadow rounded">
                <h3 class="text-lg font-bold">{{ $job->title }}</h3>
                <p class="mb-2">{{ $job->location }} | ${{ $job->salary }}</p>

                <div class="flex items-center space-x-2 mb-2">
                    <a href="/jobs/{{ $job->id }}/edit" class="text-blue-600 hover:text-blue-800">Edit</a>
                    <span class="text-gray-400">|</span>
                    <form action="/jobs/{{ $job->id }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                    </form>
                </div>

                <div class="mt-2">
                    <a href="{{ route('jobs.applicants', $job) }}"
                       class="inline-block text-blue-500 hover:text-blue-700">
                        View Applicants ({{ $job->applications()->count() }})
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
