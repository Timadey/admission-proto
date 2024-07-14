<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Preview Your Application') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                    @if(! $application->completed)
                    <p style="color:red;margin:10px; padding:10px;"> 
                        You are yet to submit your application. When you are done filling the forms, hit the submit button to finish your application process 
                    </p>
                    @endif
                    <div class="p-6 text-gray-900 ">
                        <p>{{ __("Course you are applying for") }}</p>
                        <strong>Form No: {{$application->application_code }} </strong>

                        <div class="mt-4 mb-8 p-4 rounded-md shadow-md">
                            <strong>Course you are applying for </strong>
                            <hr>
                            @if ($application->courseApplication)
                            <div class="block w-full mt-4">
                                <label for="first_choice" class="block mb-2 text-sm font-medium text-gray-600 w-full">First Choice</label>
                                <input id="first_choice" disabled value="{{ $application->courseApplication->first_choice }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                            </div>
                            <div class="block w-full mt-4">
                                <label for="second_choice" class="block mb-2 text-sm font-medium text-gray-600 w-full">Second Choice</label>
                                <input id="second_choice" disabled value="{{ $application->courseApplication->second_choice }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                            </div>
                            @if (! $application->completed)
                                <div class="mt-4 mb-4">
                                    <a style="color:green" href="{{ route('course-application.edit', ['courseApplication' => $application->courseApplication->id ])}}">
                                        <x-primary-button>Edit courses</x-primary-button>
                                    </a>
                                </div>
                            @endif
                            @else
                            <p class="mx-auto mt-4 mb-4">No course application info yet. Please continue you application</p>
                            @endif
                        </div>

                        <div class="mt-4 mb-8 p-4 rounded-md shadow-md">
                            <strong>Applicant Details </strong>
                            <hr>
                            @if ($application->personalDetails)
                            <div class="mx-auto mt-4">
                                <label for="passport" class="block mb-2 text-sm font-medium text-gray-600 w-full">Passport Photograph</label>
                                <img class="w-[40%] h-[40%] rounded-md mb-4 mt-4" src="/{{ $application->personalDetails->passport_photograph_url }}" />
                            </div>
                            <div class="block w-full mt-4">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-600 w-full">Title</label>
                                <input id="title" disabled value="{{ $application->personalDetails->title }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                            </div>
                            <div class="block w-full mt-4">
                                <label for="surname" class="block mb-2 text-sm font-medium text-gray-600 w-full">Surname</label>
                                <input id="surname" disabled value="{{ $application->personalDetails->surname }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                            </div>
                            <div class="block w-full mt-4">
                                <label for="other_names" class="block mb-2 text-sm font-medium text-gray-600 w-full">Other Names</label>
                                <input id="other_names" disabled value="{{ $application->personalDetails->other_names }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                            </div>

                            <div class="block w-full mt-4">
                                <label for="gender" class="block mb-2 text-sm font-medium text-gray-600 w-full">Gender</label>
                                <input id="gender" disabled value="{{ $application->personalDetails->gender }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                            </div>

                            <div class="block w-full mt-4">
                                <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-600 w-full">Date of Birth</label>
                                <input id="date_of_birth" disabled value="{{ $application->personalDetails->date_of_birth }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                            </div>

                            <div class="block w-full mt-4">
                                <label for="religion" class="block mb-2 text-sm font-medium text-gray-600 w-full">Religion</label>
                                <input id="religion" disabled value="{{ $application->personalDetails->religion }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                            </div>

                            <div class="block w-full mt-4">
                                <label for="current_residential_address" class="block mb-2 text-sm font-medium text-gray-600 w-full">Current Residential Address</label>
                                <input id="current_residential_address" disabled value="{{ $application->personalDetails->current_residential_address }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                            </div>

                            <div class="block w-full mt-4">
                                <label for="local_government" class="block mb-2 text-sm font-medium text-gray-600 w-full">Local Government</label>
                                <input id="local_government" disabled value="{{ $application->personalDetails->local_government }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                            </div>

                            <div class="block w-full mt-4">
                                <label for="state_of_origin" class="block mb-2 text-sm font-medium text-gray-600 w-full">State of Origin</label>
                                <input id="state_of_origin" disabled value="{{ $application->personalDetails->state_of_origin }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                            </div>

                            <div class="block w-full mt-4">
                                <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-600 w-full">Phone Number</label>
                                <input id="phone_number" disabled value="{{ $application->personalDetails->phone_number }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                            </div>

                            <div class="mx-auto mt-4">
                                <label for="signature" class="block mb-2 text-sm font-medium text-gray-600 w-full">Signature</label>
                                <img class="w-[40%] h-[40%] rounded-md mb-4 mt-4" src="/{{ $application->personalDetails->signature_url }}" />
                            </div>
                                @if (! $application->completed)
                                    <div class="mt-4 mb-4">
                                        <a style="color:green" href="{{ route('personal-detail.edit', ['personalDetail' => $application->personalDetails->id ])}}">
                                            <x-primary-button>Edit applicant details</x-primary-button>
                                        </a>
                                    </div>
                                @endif
                            @else
                            <p class="mx-auto mt-4 mb-4">No applicant details filled yet. Please continue you application</p>
                            @endif
                        </div>

                        <div class="mt-4 mb-8 p-4 rounded-md shadow-md">
                            <strong>Education and Qualifications </strong>
                            <hr>
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
                                                    @if (! $application->completed)
                                                    <div>
                                                        <a href="{{ route('education.edit', ['education' => $education->id] ) }}">
                                                            <x-primary-button style="margin:10px" type="button"> Edit education </x-primary-button>
                                                        </a>
                                                    </div>
                                                    @endif
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
                                            @if (! $application->completed)
                                                @if($education->grades->count() == 0)
                                                    <a href="{{ route('grade.create', ['education' => $education->id]) }}">
                                                        <x-primary-button style="margin:10px" type="button"> Add grades </x-primary-button>
                                                    </a>
                                                    @else
                                                    <a href="{{ route('grade.edit', ['education' => $education->id] ) }}">
                                                        <x-primary-button style="margin:10px" type="button"> Edit grades </x-primary-button>
                                                    </a>
                                                @endif
                                            @endif
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                            <p class="mx-auto mt-4 mb-4">No education and qualifications info yet. Please continue you application</p>
                            @endif
                        </div>
                        @if(! $application->completed)
                            @if($application->courseApplication && $application->educations->count() > 0 && $application->personalDetails)
                            <a href="{{ route('application.submit')}}">
                                <x-primary-button>Submit your application</x-primary-button>
                            </a>
                            @else
                            <a href="{{ route('application.index')}}">
                                <x-primary-button>Continue your application</x-primary-button>
                            </a>
                            @endif
                        @else
                        <a href="{{ route('application.index')}}">
                            <x-primary-button>Go home</x-primary-button>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
