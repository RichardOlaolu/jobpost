@extends('layouts.app')
@section('content')
    <h2 class="text-xl font-semibold mb-4">Apply for {{ $job->title }}</h2>
    <form method="POST" action="/jobs/{{ $job->id }}/apply" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block">Cover Letter</label>
            <textarea name="cover_letter" class="w-full border p-2 rounded"></textarea>
        </div>
        <div>
            <label class="block">Upload CV (PDF only)</label>
            <input type="file" name="cv" class="w-full border p-2 rounded">
        </div>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Submit Application</button>
    </form>
@endsection
