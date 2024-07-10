<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('1. Choose program offering') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">
                        
                            <p>{{ __("Update the course you are applying for") }}</p>
                            <strong>Form No: {{$courseApplication->application->application_code }} </strong>

                            <form class="mx-auto lg:w-[50%]" action="{{ route('course-application.update', ['courseApplication' => $courseApplication->id])}}" method="POST">
                                @method('PATCH')
                                @csrf
                                <div class="block w-full m-4">
                                    <label for="first_choice" class="block mb-2 text-sm font-medium text-gray-600 w-full">First Choice</label>
                                    <select id="first_choice" name="first_choice" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                        <option>Update your first choice</option>
                                        @foreach ($programs as $program)
                                        <option value="{{ $program->value }}" @if($courseApplication->first_choice == $program->value) selected @endif>{{ $program->name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('first_choice')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="second_choice" class="block mb-2 text-sm font-medium text-gray-600 w-full">Second Choice</label>
                                    <select id="second_choice" name="second_choice" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                        <option>Choose your second choice</option>
                                        @foreach ($programs as $program)
                                        <option value="{{ $program->value }}" @if($courseApplication->second_choice == $program->value) selected @endif>{{ $program->name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('second_choice')}} </span>
                                </div>
                                <x-primary-button type="submit"> Update </x-primary-button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
