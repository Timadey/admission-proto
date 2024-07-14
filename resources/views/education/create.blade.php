<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('3. Education and Qualifications') }}
        </h2>
    </x-slot>
        @if ($application->educations->count() > 0)
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach ($application->educations as $index => $education)
                <div class="bg-white my-4 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">
                        <div class="flex">
                            <div>
                                <p>{{ __("Examination No. ".$index + 1) }}</p>
                                <p><strong>Examination Type: {{$education->examination_type }} </strong></p>
                                <p><strong>Examination Year: {{$education->year }} </strong></p>
                            </div>
                            <div>
                                <a href="{{ route('education.edit', ['education' => $education->id] ) }}">
                                    <x-primary-button style="margin:10px" type="button"> Edit education </x-primary-button>
                                </a>
                            </div>
                        </div>

                        <div class="flex flex-col">
                            <div class=" overflow-x-auto">
                                <div class="min-w-full inline-block align-middle">
                                    <div class="overflow-hidden border rounded-lg border-gray-300">
                                        <table class=" min-w-full rounded-xl">
                                            <thead>
                                                <tr class="bg-gray-50">
                                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize"> S/N </th>
                                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize"> Subject Name </th>
                                                    <th scope="col" class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize"> Grade </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($education->grades as $sn => $grade )
                                                <tr class="odd:bg-white even:bg-gray-100">
                                                    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 "> {{ $sn + 1 }}</td>
                                                    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{ $grade->subject_name }} </td>
                                                    <td class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900"> {{ $grade->grade }} </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                @endforeach
                    <a href="{{ route('application.preview') }}">
                        <x-primary-button style="margin:10px" type="button"> Continue application </x-primary-button>
                    </a>
            </div>
        </div>
        @endif
        @if ($application->educations->count() < 2)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 ">
                                <p class="my-4">{{ __("Add New Education and Qaulification.") }}</p>
                                <p class="my-4">{{ __("You can add up two sittings of examinations ") }}</p>

                                <strong>Form No: {{$application->application_code }} </strong>

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
                                    <div class="block w-full m-4">
                                        <label for="year" class="block mb-2 text-sm font-medium text-gray-600 w-full">Year</label>
                                        <input type="date" id="year" name="year" value="{{ old('year', '') }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                        </input>
                                        <span class="text-red-500 text-sm"> {{ $errors->first('year')}} </span>
                                    </div>

                                    <x-primary-button type="submit"> Next </x-primary-button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
