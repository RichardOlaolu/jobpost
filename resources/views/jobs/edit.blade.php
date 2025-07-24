@extends('layouts.app')
@section('content')
    <h2 class="text-xl font-semibold mb-4">Edit Job</h2>
    <form method="POST" action="/jobs/{{ $job->id }}" class="space-y-4">
        @csrf
        @method('PUT')
        <input name="title" value="{{ $job->title }}" class="w-full border p-2 rounded">
        <textarea name="description" class="w-full border p-2 rounded">{{ $job->description }}</textarea>
        <input name="location" value="{{ $job->location }}" class="w-full border p-2 rounded">
        <input name="salary" value="{{ $job->salary }}" class="w-full border p-2 rounded">
        <input type="date" name="deadline" value="{{ $job->deadline }}" class="w-full border p-2 rounded">
        <button class="bg-green-500 text-white px-4 py-2 rounded">Update Job</button>
    </form>
@endsection
