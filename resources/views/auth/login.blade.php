<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    @if(session('success'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
        <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                    <div>
                    <p class="font-bold">Check email for application PIN</p>
                    <p class="text-sm">Your payment was successful. Please check your email for your application PIN and Application Form Number</p>
                </div>
            </div>
        </div>
    @endif
    <div class="mx-auto p-4">
        <p> Enter your <b>application form number</b> and <b>application PIN</b> to proceed </p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="application_form_number" :value="__('Application Form Number')" />
            <x-text-input id="application_form_number" class="block mt-1 w-full" type="text" name="application_form_number" :value="old('application_form_number')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('application_form_number')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="application_pin" :value="__('Application PIN')" />

            <x-text-input id="application_pin" class="block mt-1 w-full"
                            type="text"
                            name="application_pin"
                            required autocomplete="current-application_pin" />

            <x-input-error :messages="$errors->get('application_pin')" class="mt-2" />
        </div>

        {{-- <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div> --}}

        <div class="flex items-center justify-end mt-4">
            {{-- @if (Route::has('password.request')) --}}
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 " href="{{ route('register') }}">
                    {{ __('Purchase a new application PIN') }}
                </a>
            {{-- @endif --}}

            <x-primary-button class="ms-3">
                {{ __('Proceed') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
