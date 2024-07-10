<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('2. Filla Applicant Details') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">
                        
                            <p>{{ __("Course you are applying for") }}</p>
                            <strong>Form No: {{$application->application_code }} </strong>

                            <form class="mx-auto lg:w-[50%]" action="{{ route('personal-detail.store')}}" method="POST">
                                @csrf
                                <div class="block w-full m-4">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-600 w-full">Titke</label>
                                    <select id="title" name="title" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                        <option selected>Choose title</option>
                                        @foreach ($titles as $title)
                                        <option value="{{ $title->value }}">{{ $title->name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('title')}} </span>
                                </div>
                                <div class="block w-full m-4">
                                    <label for="surname" class="block mb-2 text-sm font-medium text-gray-600 w-full">Surname</label>
                                    <x-text-input id="surname" name="surname" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </x-text-input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('surname')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="other_names" class="block mb-2 text-sm font-medium text-gray-600 w-full">Other Names</label>
                                    <x-text-input id="other_names" name="other_names" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </x-text-input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('other_names')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-600 w-full">Gender</label>
                                    <select id="gender" name="gender" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                        <option selected>Choose your gender</option>
                                        @foreach ($genders as $gender)
                                        <option value="{{ $gender->value }}">{{ $gender->name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('gender')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-600 w-full">Date of Birth</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('date_of_birth')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="religion" class="block mb-2 text-sm font-medium text-gray-600 w-full">Religion</label>
                                    <select id="religion" name="religion" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                        <option selected>Choose your religion</option>
                                        @foreach ($religions as $religion)
                                        <option value="{{ $religion->value }}">{{ $religion->name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('religion')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="current_residential_address" class="block mb-2 text-sm font-medium text-gray-600 w-full">Current Residential Address</label>
                                    <x-text-input id="current_residential_address" name="current_residential_address" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </x-text-input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('current_residential_address')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="local_government" class="block mb-2 text-sm font-medium text-gray-600 w-full">Local Government</label>
                                    <x-text-input id="local_government" name="local_government" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </x-text-input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('local_government')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="passport" class="block mb-2 text-sm font-medium text-gray-600 w-full">Upload passport</label>
                                    <input type="file" id="passport" name="passport" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('passport')}} </span>
                                </div>

                                <x-primary-button type="submit"> Save </x-primary-button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
