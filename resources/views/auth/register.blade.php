@extends('layouts.app')
@section('content')
    <h2 class="text-xl font-semibold mb-4">Register</h2>
    <form method="POST" action="/register" class="space-y-4">
        @csrf
        <input name="name" placeholder="Name" class="w-full border p-2 rounded">
        <input name="email" placeholder="Email" class="w-full border p-2 rounded">
        <input type="password" name="password" placeholder="Password" class="w-full border p-2 rounded">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full border p-2 rounded">
        <select name="role" class="w-full border p-2 rounded">
            <option value="company">Company</option>
            <option value="job_seeker">Job Seeker</option>
        </select>
        <button class="bg-blue-500 text-white px-4 py-2 rounded">Register</button>
    </form>
@endsection
