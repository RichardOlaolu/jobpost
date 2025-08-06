@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 shadow rounded">
        <h1 class="text-2xl font-bold mb-4">Applicants for: {{ $job->title }}</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Applicant Name</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Applied At</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($applications as $application)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $application->user->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $application->user->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $application->created_at->format('M d, Y') }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ Storage::url($application->cv_path) }}"
                                   class="text-blue-500 hover:text-blue-700 mr-2"
                                   download="CV_{{ $application->user->name }}.pdf">
                                    Download CV
                                </a>
                                <a href="{{ route('applications.show', $application) }}"
                                   class="text-green-500 hover:text-green-700">
                                    View Application
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 px-4 text-center text-gray-500">No applicants yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="{{ route('my.jobs') }}" class="text-blue-500 hover:text-blue-700">
                ← Back to My Jobs
            </a>
        </div>
    </div>
@endsection
