<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role"
                class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Student</option>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Student ID and Course -->
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-input-label for="student_id" :value="__('Student ID')" />
                <x-text-input id="student_id" class="block mt-1 w-full" type="text" name="student_id"
                    :value="old('student_id')" />
                <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="course" :value="__('Course')" />
                <x-text-input id="course" class="block mt-1 w-full" type="text" name="course"
                    :value="old('course')" placeholder="Example: BSIT" />
                <x-input-error :messages="$errors->get('course')" class="mt-2" />
            </div>
        </div>

        <!-- Year Level and Section -->
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-input-label for="year_level" :value="__('Year Level')" />
                <select id="year_level" name="year_level"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Select Year Level</option>
                    <option value="1st Year" {{ old('year_level') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                    <option value="2nd Year" {{ old('year_level') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                    <option value="3rd Year" {{ old('year_level') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                    <option value="4th Year" {{ old('year_level') == '4th Year' ? 'selected' : '' }}>4th Year</option>
                </select>
                <x-input-error :messages="$errors->get('year_level')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="section" :value="__('Section')" />
                <select id="section" name="section"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    <option value="">Select Section</option>
                    <option value="A" {{ old('section') == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ old('section') == 'B' ? 'selected' : '' }}>B</option>
                    <option value="C" {{ old('section') == 'C' ? 'selected' : '' }}>C</option>
                    <option value="D" {{ old('section') == 'D' ? 'selected' : '' }}>D</option>
                </select>
                <x-input-error :messages="$errors->get('section')" class="mt-2" />
            </div>
        </div>

        <!-- Password and Confirm Password -->
        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full"
                    type="password"
                    name="password"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
