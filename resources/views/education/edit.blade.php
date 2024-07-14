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
                            <p class="my-4">{{ __("Edit Education and Qaulification.") }}</p>
                            <div class="flex">
                                <div>
                                    <strong>Form No: {{$education->application->application_code }} </strong>
                                </div>
                                <div>
                                    @if($education->grades->count() == 0)
                                    <a href="{{ route('grade.create', ['education' => $education->id]) }}">
                                        <x-primary-button style="margin:10px" type="button"> Add grades </x-primary-button>
                                    </a>
                                    @else
                                    <a href="{{ route('grade.edit', ['education' => $education->id] ) }}">
                                        <x-primary-button style="margin:10px" type="button"> Edit grades </x-primary-button>
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <form class="mx-auto lg:w-[50%]" action="{{ route('education.update', ['education' => $education->id ])}}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="block w-full mb-4 mt-4">
                                    <label for="examination_type" class="block mb-2 text-sm font-medium text-gray-600 w-full">Type of Examination</label>
                                    <select id="examination_type" name="examination_type" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                        <option selected>Choose your examination type</option>
                                        @foreach ($examinationTypes as $examinationType)
                                        <option value="{{ $examinationType->value }}" @if (old('examination_type', $education->examination_type) == $examinationType->value)
                                            selected
                                        @endif>{{ $examinationType->name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('examination_type')}} </span>
                                </div>
                                <div class="block w-full m-4">
                                    <label for="year" class="block mb-2 text-sm font-medium text-gray-600 w-full">Year</label>
                                    <input type="date" id="year" name="year" value="{{ old('year',  $education->year) }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('year')}} </span>
                                </div>

                                <x-primary-button type="submit"> Edit education </x-primary-button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
