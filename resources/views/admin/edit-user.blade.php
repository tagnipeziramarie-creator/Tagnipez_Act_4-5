<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Edit Student
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                    Edit Student Information
                </h1>

                <form method="POST" action="{{ route('admin.users.update', $user->id) }}">
                    @csrf
                    @method('PUT')

                    <!-- Name -->
                    <div class="mb-4">
                        <label class="block text-gray-900 dark:text-gray-100 font-semibold mb-1">
                            Full Name
                        </label>
                        <input type="text" name="name" value="{{ old('name', $user->name) }}"
                            class="w-full rounded-md border-gray-300 shadow-sm text-gray-900" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="block text-gray-900 dark:text-gray-100 font-semibold mb-1">
                            Email
                        </label>
                        <input type="email" name="email" value="{{ old('email', $user->email) }}"
                            class="w-full rounded-md border-gray-300 shadow-sm text-gray-900" required>
                    </div>

                    <!-- Student ID and Course -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-gray-900 dark:text-gray-100 font-semibold mb-1">
                                Student ID
                            </label>
                            <input type="text" name="student_id" value="{{ old('student_id', $user->student_id) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm text-gray-900">
                        </div>

                        <div>
                            <label class="block text-gray-900 dark:text-gray-100 font-semibold mb-1">
                                Course
                            </label>
                            <input type="text" name="course" value="{{ old('course', $user->course) }}"
                                class="w-full rounded-md border-gray-300 shadow-sm text-gray-900">
                        </div>
                    </div>

                    <!-- Year and Section -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                        <div>
                            <label class="block text-gray-900 dark:text-gray-100 font-semibold mb-1">
                                Year Level
                            </label>

                            <select name="year_level"
                                class="w-full rounded-md border-gray-300 shadow-sm text-gray-900">
                                <option value="">Select Year Level</option>
                                <option value="1st Year" {{ old('year_level', $user->year_level) == '1st Year' ? 'selected' : '' }}>1st Year</option>
                                <option value="2nd Year" {{ old('year_level', $user->year_level) == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                                <option value="3rd Year" {{ old('year_level', $user->year_level) == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                                <option value="4th Year" {{ old('year_level', $user->year_level) == '4th Year' ? 'selected' : '' }}>4th Year</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-gray-900 dark:text-gray-100 font-semibold mb-1">
                                Section
                            </label>

                            <select name="section"
                                class="w-full rounded-md border-gray-300 shadow-sm text-gray-900">
                                <option value="">Select Section</option>
                                <option value="A" {{ old('section', $user->section) == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ old('section', $user->section) == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ old('section', $user->section) == 'C' ? 'selected' : '' }}>C</option>
                                <option value="D" {{ old('section', $user->section) == 'D' ? 'selected' : '' }}>D</option>
                            </select>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-2">
                        <a href="{{ route('admin.dashboard') }}"
                            class="px-4 py-2 bg-gray-500 text-white rounded-md">
                            Cancel
                        </a>

                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md">
                            Update Student
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
