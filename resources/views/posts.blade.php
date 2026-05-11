<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Public API Data (Posts)
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- ERROR MESSAGE -->
            @if($error)
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    {{ $error }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                    Student Announcements from Public API
                </h1>

                <div class="overflow-x-auto">
                    <table class="w-full border border-gray-300 dark:border-gray-600">
                        <thead class="bg-gray-100 dark:bg-gray-700">
                            <tr>
                                <th class="border px-4 py-2 text-left text-gray-900 dark:text-gray-100">Title</th>
                                <th class="border px-4 py-2 text-left text-gray-900 dark:text-gray-100">Body</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($posts as $post)
                                <tr class="bg-white dark:bg-gray-800">
                                    <td class="border px-4 py-2 text-gray-900 dark:text-gray-100">
                                        {{ $post['title'] }}
                                    </td>
                                    <td class="border px-4 py-2 text-gray-900 dark:text-gray-100">
                                        {{ $post['body'] }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
