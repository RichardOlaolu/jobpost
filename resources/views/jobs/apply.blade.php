@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 shadow rounded">
        <h2 class="text-2xl font-bold mb-4">Apply for {{ $job->title }}</h2>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="/jobs/{{ $job->id }}/apply" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div>
                <label class="block text-gray-700 mb-2">Cover Letter</label>
                <textarea name="cover_letter"
                    class="w-full px-3 py-2 border rounded"
                    required>{{ old('cover_letter') }}</textarea>
                @error('cover_letter')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 mb-2">Upload CV (PDF only, max 2MB)</label>
                <input type="file" name="cv"
                    class="block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100"
                    accept=".pdf" required>
                @error('cv')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                Submit Application
            </button>
        </form>
    </div>

    <script>
    document.querySelector('form').addEventListener('submit', function(e) {
        const fileInput = document.querySelector('input[name="cv"]');
        const file = fileInput.files[0];

        if (file && !file.name.toLowerCase().endsWith('.pdf')) {
            e.preventDefault();
            alert('Please upload a PDF file only.');
        }
    });
    </script>
@endsection
