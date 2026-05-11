<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Student Information Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Logged-in User Info -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-2">
                    Student Profile
                </h3>

                <p class="text-gray-900 dark:text-gray-100"><strong>Name:</strong> {{ Auth::user()->name }}</p>
                <p class="text-gray-900 dark:text-gray-100"><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p class="text-gray-900 dark:text-gray-100"><strong>Student ID:</strong> {{ Auth::user()->student_id }}</p>
                <p class="text-gray-900 dark:text-gray-100"><strong>Course:</strong> {{ Auth::user()->course }}</p>
                <p class="text-gray-900 dark:text-gray-100"><strong>Year:</strong> {{ Auth::user()->year_level }}</p>
                <p class="text-gray-900 dark:text-gray-100"><strong>Section:</strong> {{ Auth::user()->section }}</p>
            </div>

            <!-- Students List -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">
                    Students List
                </h3>

                <!-- Search -->
                <form method="GET" action="{{ route('user.dashboard') }}" class="mb-4 flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Search student..."
                        class="w-full rounded-md border-gray-300 shadow-sm">

                    <button class="px-4 py-2 bg-blue-600 text-white rounded-md">
                        Search
                    </button>

                    <a href="{{ route('user.dashboard') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md">
                        Clear
                    </a>
                </form>

                @php
                    $search = request('search');

                    $users = \App\Models\User::where('role','user')
                        ->when($search, function ($query, $search) {
                            $query->where(function ($q) use ($search) {
                                $q->where('name', 'like', "%{$search}%")
                                  ->orWhere('email', 'like', "%{$search}%")
                                  ->orWhere('student_id', 'like', "%{$search}%")
                                  ->orWhere('course', 'like', "%{$search}%");
                            });
                        })
                        ->get();
                @endphp

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300 dark:border-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="border px-4 py-2 text-gray-900 dark:text-gray-100">ID</th>
                                <th class="border px-4 py-2 text-gray-900 dark:text-gray-100">Name</th>
                                <th class="border px-4 py-2 text-gray-900 dark:text-gray-100">Email</th>
                                <th class="border px-4 py-2 text-gray-900 dark:text-gray-100">Student ID</th>
                                <th class="border px-4 py-2 text-gray-900 dark:text-gray-100">Course</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($users as $user)
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="border px-4 py-2 text-gray-900 dark:text-gray-100">{{ $user->id }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-gray-100">{{ $user->name }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-gray-100">{{ $user->email }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-gray-100">{{ $user->student_id }}</td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-gray-100">{{ $user->course }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-gray-900 dark:text-gray-100">
                                        No students found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- 🔥 PUBLIC API POSTS (ADDED HERE) -->
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4">
                    Public API Posts
                </h3>

                @php
                    try {
                        $response = \Illuminate\Support\Facades\Http::get('https://jsonplaceholder.typicode.com/posts');
                        $posts = array_slice($response->json(), 0, 5);
                    } catch (\Exception $e) {
                        $posts = [];
                    }
                @endphp

                @if(count($posts) > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($posts as $post)
                            <div class="border border-gray-300 dark:border-gray-600 rounded-lg p-4">
                                <h4 class="font-bold text-gray-900 dark:text-gray-100">
                                    {{ $post['title'] }}
                                </h4>

                                <p class="text-gray-700 dark:text-gray-300 mt-2">
                                    {{ $post['body'] }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-red-500">
                        Failed to load posts.
                    </p>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
