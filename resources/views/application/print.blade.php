@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SACNS APPLICATION FORM </title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css'>
    <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>

    <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js'></script>
    <link rel="stylesheet" href="{{ asset('print.css') }}" />
  </head>
  <body>
    <div class='container-fluid'>
        <div class='row'>
            <div class='col l1'></div>
            <div id='main-content' class='col l10'>
                <div id='preview-content'>
                    <div id='content-header'>
                        <div id='indus'>SAMUEL ABIDOYE COLLEGE OF NURSING SCIENCES</div>
                        <div id='ui-below'><i>Old Ogbomoso/Ilorin Expressway, Falade Village,</i></div>
                        <div id='ui-below'><i>Orile-Igon, Surulere Local Government Area, Oyo State</i></div>
                        <div id='ui-logo'><img src="{{ asset('logo.jpg' )}}" alt="sacns logo"></div>
                        <div id='passport-block'><img id='passport' src="/{{ $application->personalDetails->passport_photograph_url }}" alt="passport" ></div>
                    </div>
                    <div id='student-indus'>
                        <div class='center-align'><span id='student-indus-span'>APPLICATION FORM</span></div>
                        <div style='font-size:90%;text-align:center'>FORM NO: {{ $application->application_code }}</div>
                    </div>

                    <div class="form-section">Section 1: Course Applying For</div>
                    <div id='indus-content'>
                            <div id='surname'>
                                <div>
                                    <div class='text-bold'>First Choice</div> 
                                    <div>{{ $application->courseApplication->first_choice }}</div>
                                </div>
                            </div>


                            <div>
                                <div class='text-bold'>Second Choice</div> 
                                <div>{{ $application->courseApplication->second_choice }}</div>
                            </div>
                    </div>
                    <div class="form-section">Section 2: Applicant Details</div>
                    <div id='indus-content'>
                        <div>
                            <div>
                                <div class='text-bold'>Title</div> 
                                <div>{{ $application->personalDetails->title }}</div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class='text-bold'>Surname</div> 
                                <div>{{ $application->personalDetails->surname }}</div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class='text-bold'>Other Names</div> 
                                <div>{{ $application->personalDetails->other_names }}</div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class='text-bold'>Gender</div> 
                                <div>{{ $application->personalDetails->gender }}</div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class='text-bold'>Date of Birth</div> 
                                <div>{{ Carbon::parse($application->personalDetails->date_of_birth)->format('jS F, Y') }}</div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class='text-bold'>Religion</div> 
                                <div>{{ $application->personalDetails->religion }}</div>
                            </div>
                        </div>

                        <div>
                            <div>
                                <div class='text-bold'>Current Residential Address</div> 
                                <div>{{ $application->personalDetails->current_residential_address }}</div>
                            </div>
                        </div>

                        <div>
                            <div class='text-bold'>Local Government</div> 
                            <div>{{ $application->personalDetails->local_government }}</div>
                        </div>
                        <div>
                            <div>
                                <div class='text-bold'>State of Origin</div> 
                                <div>{{ $application->personalDetails->state_of_origin }}</div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class='text-bold'>Telephone Number</div> 
                                <div>{{ $application->personalDetails->phone_number }}</div>
                            </div>
                        </div>
                        <div>
                            <div>
                                <div class='text-bold'>Email</div> 
                                <div>{{ $application->user->email }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">Section 3: Education</div>
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
                        </div>
                        @endforeach
                    </div>
                    </div>
    
                    <div id='indus-footer'>
                        <div>
                            <div><span class='text-bold'>DATE SUBMITTED</span>{{ Carbon::parse($application->applied_at)->format('jS F, Y') }}</div>
                        </div>
    
                        {{-- <div>
                            <div style='display:flex;align-items:flex-end;'><span class='text-bold'>SIGNATURE</span> <img src="/{{ $application->personalDetails->signature_url }}"></div>
                        </div> --}}
                    </div>
    
                    <button class='btn waves-effect waves-light pulse btn-floating' id='print'><i class='large material-icons'>print</i> </button>
    
    
                </div>
        
            
    
            <div class='col l1'></div>
    
        </div>    
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script src="{{ asset('print.js')}}" type="module"></script>

  </body>
  </html>