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
                            <p>{{ __("Edit grades of examination") }}</p>
                            <p> <strong>Form No: {{$education->application->application_code }} </strong> </p>
                            <p> <strong>Examination Type: {{$education->examination_type }} </strong> </p>
                            <p> <strong>Year: {{$education->year }} </strong> </p>

                            <form class="mx-auto lg:w-[50%]" action="{{ route('grade.update', ['education' => $education->id])}}" method="POST">
                                @csrf
                                @method('PATCH')
                               @foreach($education->grades as $i => $exam)
                                    <div id="subject{{ $i + 1 }}">
                                        <p><strong>Subject {{ $i + 1}}</strong></p>
                                        <input hidden name="grades[{{ $i }}][grade_id]" value="{{ $exam->id }}">
                                        <div class="block w-full mt-4 mb-4">
                                            <label for="subject_name_{{ $i }}" class="block mb-2 text-sm font-medium text-gray-600 w-full">Subject Name</label>
                                            <select id="subject_name_{{ $i }}" name="grades[{{ $i }}][subject_name]" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                             <option value="">Choose subject</option>
                                                @foreach ($subjects as $subject)
                                                    <option value="{{ $subject->value }}" @if (old('grades.'.$i.'.subject_name', $exam->subject_name) == $subject->value) selected @endif>{{ $subject->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-red-500 text-sm"> {{ $errors->first('grades.'.$i.'.subject_name')}} </span>
                                        </div>

                                        <div class="block w-full mt-4 mb-4">
                                            <label for="grade_{{ $i }}" class="block mb-2 text-sm font-medium text-gray-600 w-full">Grade</label>
                                            <select id="grade_{{ $i }}" name="grades[{{ $i }}][grade]" class="h-12 border border-gray-300 text-gray-600 text-base rounded-lg block w-full py-2.5 px-4 focus:outline-none">
                                                <option value="">Choose grade</option>
                                                @foreach ($grades as $grade)
                                                    <option value="{{ $grade->value }}" @if (old('grades.'.$i.'.grade', $exam->grade) == $grade->value) selected @endif>{{ $grade->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-red-500 text-sm"> {{ $errors->first('grades.'.$i.'.grade')}} </span>
                                        </div>
                                    </div>
                                @endforeach
                                <x-primary-button type="submit"> Edit grades </x-primary-button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
