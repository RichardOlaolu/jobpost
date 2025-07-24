@extends('layouts.app')
@section('content')
    <h2 class="text-xl font-semibold mb-4">Post a New Job</h2>
    <form method="POST" action="/jobs" class="space-y-4">
        @csrf
        <input name="title" placeholder="Job Title" class="w-full border p-2 rounded">
        <textarea name="description" placeholder="Job Description" class="w-full border p-2 rounded"></textarea>
        <input name="location" placeholder="Location" class="w-full border p-2 rounded">
        <input name="salary" placeholder="Salary" class="w-full border p-2 rounded">
        <input type="date" name="deadline" class="w-full border p-2 rounded">
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Create Job</button>
    </form>
@endsection
