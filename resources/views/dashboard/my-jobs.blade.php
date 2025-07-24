@extends('layouts.app')
@section('content')
    <h2 class="text-xl font-semibold mb-4">My Job Posts</h2>
    <div class="grid gap-4">
        @foreach($jobs as $job)
            <div class="p-4 bg-white shadow rounded">
                <h3 class="text-lg font-bold">{{ $job->title }}</h3>
                <p>{{ $job->location }} | ${{ $job->salary }}</p>
                <a href="/jobs/{{ $job->id }}/edit" class="text-blue-600 mr-2">Edit</a>
                <form action="/jobs/{{ $job->id }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-600">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
