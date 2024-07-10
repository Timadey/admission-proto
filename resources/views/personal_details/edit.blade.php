<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('2. Fill Applicant Details') }}
        </h2>
    </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">
                        
                            <p>{{ __("Update applicant details") }}</p>
                            <strong>Form No: {{$application_code }} </strong>

                            <form class="mx-auto lg:w-[50%]" action="{{ route('personal-detail.update', ['personalDetail' => $personalDetail])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                {{-- {{ $errors }} --}}
                                <div class="block w-full m-8">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-600 w-full">Title</label>
                                    <select id="title" name="title" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                        <option selected>Choose title</option>
                                        @foreach ($titles as $title)
                                        <option value="{{ $title->value }}" @if (old('title') == $title->value)
                                            selected
                                            @elseif($personalDetail->title == $title->value)
                                            selected
                                        @endif>{{ $title->name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('title')}} </span>
                                </div>
                                <div class="block w-full m-4">
                                    <label for="surname" class="block mb-2 text-sm font-medium text-gray-600 w-full">Surname</label>
                                    <x-text-input id="surname" name="surname" value="{{ old('surname', $personalDetail->surname) }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </x-text-input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('surname')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="other_names" class="block mb-2 text-sm font-medium text-gray-600 w-full">Other Names</label>
                                    <x-text-input id="other_names" name="other_names" value="{{ old('other_names', $personalDetail->other_names) }}"  class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </x-text-input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('other_names')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="gender" class="block mb-2 text-sm font-medium text-gray-600 w-full">Gender</label>
                                    <select id="gender" name="gender" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                        <option selected>Choose your gender</option>
                                        @foreach ($genders as $gender)
                                        <option value="{{ $gender->value }}"@if (old('gender') == $gender->value)
                                            selected
                                            @elseif($personalDetail->gender == $gender->value)
                                            selected
                                        @endif>{{ $gender->name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('gender')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="date_of_birth" class="block mb-2 text-sm font-medium text-gray-600 w-full">Date of Birth</label>
                                    <input type="date" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $personalDetail->date_of_birth) }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('date_of_birth')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="religion" class="block mb-2 text-sm font-medium text-gray-600 w-full">Religion</label>
                                    <select id="religion" name="religion" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                        <option selected>Choose your religion</option>
                                        @foreach ($religions as $religion)
                                        <option value="{{ $religion->value }}" @if (old('religion') == $religion->value)
                                            selected
                                            @elseif($personalDetail->religion == $religion->value)
                                            selected
                                        @endif>{{ $religion->name }} </option>
                                        @endforeach
                                    </select>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('religion')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="current_residential_address" class="block mb-2 text-sm font-medium text-gray-600 w-full">Current Residential Address</label>
                                    <x-text-input id="current_residential_address" value="{{ old('current_residential_address', $personalDetail->current_residential_address) }}" name="current_residential_address" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </x-text-input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('current_residential_address')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="state_of_origin" class="block mb-2 text-sm font-medium text-gray-600 w-full">State of Origin</label>
                                    <x-text-input id="state_of_origin" name="state_of_origin" value="{{ old('state_of_origin', $personalDetail->state_of_origin) }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </x-text-input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('state_of_origin')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="local_government" class="block mb-2 text-sm font-medium text-gray-600 w-full">Local Government</label>
                                    <x-text-input id="local_government" name="local_government" value="{{ old('local_government', $personalDetail->local_government) }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </x-text-input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('local_government')}} </span>
                                </div>

                                <div class="block w-full m-4">
                                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-600 w-full">Phone Number</label>
                                    <x-text-input id="phone_number" name="phone_number" value="{{ old('phone_number', $personalDetail->phone_number) }}" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    </x-text-input>
                                    <span class="text-red-500 text-sm"> {{ $errors->first('phone_number')}} </span>
                                </div>
                                

                                <div class="block w-full m-4">
                                    <label for="passport_photograph" class="block mb-2 text-sm font-medium text-gray-600 w-full">Upload passport photograph</label>
                                    <input type="file" accept="image/png,image/jpeg" id="passport_photograph" name="passport_photograph" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    <span class="text-red-500 text-sm"> {{ $errors->first('passport_photograph')}} </span>
                                </div>
                                    <img class="w-[40%] h-[40%] rounded-sm mb-4 mt-4" src="/{{ $personalDetail->passport_photograph_url }}" />

                                <div class="block w-full m-4">
                                    <label for="signature" class="block mb-2 text-sm font-medium text-gray-600 w-full">Upload signature</label>
                                    <input type="file" accept="image/png,image/jpeg" id="signature" name="signature" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                    <span class="text-red-500 text-sm"> {{ $errors->first('signature')}} </span>
                                </div>
                                <img class="w-[40%] h-[40%] rounded-sm mb-4 mt-4" src="/{{ $personalDetail->signature_url }}" />

                                <x-primary-button type="submit"> Save </x-primary-button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
