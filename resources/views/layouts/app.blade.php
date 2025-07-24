<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Board</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow p-4">
        <div class="container mx-auto flex justify-between">
            <a href="/" class="text-lg font-bold">Job Board</a>
            <div>
                @auth
                    @if(Auth::user()->role === 'company')
                        <a href="/my-jobs" class="mx-2">My Jobs</a>
                        <a href="/jobs/create" class="mx-2">Post a Job</a>
                    @elseif(Auth::user()->role === 'job_seeker')
                        <a href="/my-applications" class="mx-2">My Applications</a>
                    @endif
                    <form method="POST" action="/logout" class="inline">
                        @csrf
                        <button class="mx-2 text-red-500">Logout</button>
                    </form>
                @else
                    <a href="/login" class="mx-2">Login</a>
                    <a href="/register" class="mx-2">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>
</body>
</html>
