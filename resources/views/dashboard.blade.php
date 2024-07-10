<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center mx-auto mt-4">
                <img class="w-[40%] h-[40%] rounded-md mb-4 mt-4" src="{{ asset('logo.jpg') }}" />
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Welcome to <b>SAMUEL ABIDOYE COLLEGE OF NURSING SCIENCES</b>
                    <a href="{{ route('application.index') }}">
                    <x-primary-button>Go to Application page</x-primary-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
