<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('3. Education and Qualifications') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">
                        
                            <p>{{ __("Course you are applying for") }}</p>
                            <strong>Form No: {{$application_code }} </strong>

                            <form class="mx-auto lg:w-[50%]" action="{{ route('education.store')}}" method="POST">
                                @csrf
                                <div class="block w-full mb-4 mt-4">
                                    <label for="examination_type" class="block mb-2 text-sm font-medium text-gray-600 w-full">Type of Examination</label>
                                    <select id="examination_type" name="examination_type" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                        <option selected>Choose your examination type</option>
                                        @foreach ($examinationTypes as $examinationType)
                                        <option value="{{ $examinationType->value }}" @if (old('examination_type') == $examinationType->value)
                                            selected
                                        @endif>{{ $examinationType->name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('examination_type')}} </span>
                                </div>

                                <div class="block w-full mt-4 mb-4">
                                    <label for="subject_name" class="block mb-2 text-sm font-medium text-gray-600 w-full">Subject Name</label>
                                    <x-text-input id="subject_name" name="subject_name" value="{{ old('subject_name', '') }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </x-text-input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('subject_name')}} </span>
                                </div>

                                <div class="block w-full mt-4 mb-4">
                                    <label for="grade" class="block mb-2 text-sm font-medium text-gray-600 w-full">Grade</label>
                                    <x-text-input id="grade" name="grade" value="{{ old('grade', '') }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </x-text-input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('grade')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="year" class="block mb-2 text-sm font-medium text-gray-600 w-full">Year</label>
                                    <input type="date" id="year" name="year" value="{{ old('year', '') }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('year')}} </span>
                                </div>

                                <x-primary-button type="submit"> Save </x-primary-button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
