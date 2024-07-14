<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800  leading-tight">
            {{ __('Application Form') }}
        </h2>
    </x-slot>

    <div x-data="{ modelOpen: false }">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white  overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 ">
                        @if ($application)
                            @if($application->completed == true)
                            <p class="mb-4 text-green-600" >{{ __("Your application has been submitted and undergoing processing. You can view your submission in the meantime") }}</p>
                            @else
                            <p class="mb-4 text-green-600">{{ __("Application fee paid successfully. View or continue your application") }}</p>
                            <p class="mb-4">{{ __("You can fill the forms seperately. When you are done, click the submit application button") }}</p>
                            @endif

                            @if(! $application->completed)
                            <div class = "mx-auto my-8 px-8 py-8 shadow-md">
                                <ol class=" overflow-hidden space-y-8">
                                    <li class="mb-4 relative flex-1 after:content-['']  after:w-0.5 after:h-full @if($application->courseApplication) after:bg-indigo-600 @else after:bg-gray-200 @endif after:inline-block after:absolute after:-bottom-11 after:left-4 lg:after:left-5">
                                        <a  href=" @if($application->courseApplication){{ route('course-application.edit', ['courseApplication' => $application->courseApplication->id])}} @else {{ route('course-application.create')}} @endif" class="flex items-center font-medium w-full  ">
                                            <span class="w-8 h-8 @if($application->courseApplication) bg-indigo-600 @else bg-indigo-50 @endif border-2 border-transparent rounded-full flex justify-center items-center mr-3 text-sm @if($application->courseApplication) text-white @else text-indigo-600 @endif lg:w-10 lg:h-10">
                                                @if($application->courseApplication)
                                                <svg class="w-5 h-5 stroke-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 12L9.28722 16.2923C9.62045 16.6259 9.78706 16.7927 9.99421 16.7928C10.2014 16.7929 10.3681 16.6262 10.7016 16.2929L20 7" stroke="stroke-current" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="my-path"></path>
                                                </svg>
                                                @else
                                                1
                                                @endif
                                            </span>
                                            <div class="block">
                                                <h4 class="text-lg  @if($application->courseApplication) text-green-600 @else text-indigo-600 @endif">Step 1</h4>
                                                <span class="text-sm">Choose Program Offering</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class=" mb-4 relative flex-1 after:content-['']  after:w-0.5 after:h-full @if($application->personalDetails) after:bg-indigo-600 @else after:bg-gray-200 @endif after:inline-block after:absolute after:-bottom-11 after:left-4 lg:after:left-5">
                                        <a  href=" @if($application->personalDetails){{ route('personal-detail.edit', ['personalDetail' => $application->personalDetails->id])}} @else {{ route('personal-detail.create')}} @endif" class="flex items-center font-medium w-full  ">
                                            <span class="w-8 h-8 @if($application->personalDetails) bg-indigo-600 @else bg-indigo-50 @endif border-2 border-transparent rounded-full flex justify-center items-center mr-3 text-sm @if($application->personalDetails) text-white @else text-indigo-600 @endif lg:w-10 lg:h-10">
                                                @if($application->personalDetails)
                                                <svg class="w-5 h-5 stroke-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 12L9.28722 16.2923C9.62045 16.6259 9.78706 16.7927 9.99421 16.7928C10.2014 16.7929 10.3681 16.6262 10.7016 16.2929L20 7" stroke="stroke-current" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="my-path"></path>
                                                </svg>
                                                @else
                                                2
                                                @endif
                                            </span>
                                            <div class="block">
                                                <h4 class="text-lg @if($application->personalDetails) text-green-600 @else text-indigo-600 @endif">Step 2</h4>
                                                <span class="text-sm">Fill Applicant Details</span>
                                            </div>
                                        </a>
                                    </li>

                                    <li class="relative flex-1 after:content-['']  after:w-0.5 after:h-full @if($application->educations->count() > 0) after:bg-indigo-600 @else after:bg-gray-200 @endif after:inline-block after:absolute after:-bottom-11 after:left-4 lg:after:left-5">
                                        <a  href="{{ route('education.create')}}" class="flex items-center font-medium w-full  ">
                                            <span class="w-8 h-8 @if($application->educations->count() > 0) bg-indigo-600 @else bg-indigo-50 @endif border-2 border-transparent rounded-full flex justify-center items-center mr-3 text-sm @if($application->educations->count() > 0) text-white @else text-indigo-600 @endif lg:w-10 lg:h-10">
                                                @if($application->educations->count() > 0)
                                                <svg class="w-5 h-5 stroke-white" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M5 12L9.28722 16.2923C9.62045 16.6259 9.78706 16.7927 9.99421 16.7928C10.2014 16.7929 10.3681 16.6262 10.7016 16.2929L20 7" stroke="stroke-current" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" class="my-path"></path>
                                                </svg>
                                                @else
                                                3
                                                @endif
                                            </span>
                                            <div class="block">
                                                <h4 class="text-lg  @if($application->educations->count() > 0) text-green-600 @else text-indigo-600 @endif">Step 3</h4>
                                                <span class="text-sm">Education and Qualification</span>
                                            </div>
                                        </a>
                                    </li>

                                </ol>
                            </div>
                            @endif
                            
                            @if ($application->completed)
                            <a class="mt-4 mb-4" href="{{ route('application.print', ['application_code' => $application->application_code]) }}" >
                                <x-primary-button >{{__('Print your application form')}}</x-primary-button>
                            </a>
                            @else
                            <a class="mt-4 mb-4" href="{{ route('application.preview') }}" >
                                <x-primary-button >{{ __('Preview your application') }}</x-primary-button>
                            </a>
                            @endif

                        @else
                            <p>{{ __("Application fee payment pending. Pay your application fee to proceed with your registration.") }}</p>
                            <x-primary-button x-on:click="modelOpen = !modelOpen">{{ __('Pay Application Fee') }}</x-primary-button>
                            <div x-show="modelOpen" class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                <div class="flex items-end justify-center min-h-screen px-4 text-center md:items-center sm:block sm:p-0">
                                    <div x-cloak @click="modelOpen = false" x-show="modelOpen" 
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0" 
                                        x-transition:enter-end="opacity-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100" 
                                        x-transition:leave-end="opacity-0"
                                        class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-40" aria-hidden="true"
                                    ></div>
                    
                                    <div x-cloak x-show="modelOpen" 
                                        x-transition:enter="transition ease-out duration-300 transform"
                                        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" 
                                        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                        x-transition:leave="transition ease-in duration-200 transform"
                                        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" 
                                        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                        class="inline-block w-full max-w-xl p-8 my-20 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl 2xl:max-w-2xl"
                                    >
                                        <div class="flex items-center justify-between space-x-4">
                                            <h1 class="text-xl font-medium text-gray-800 ">Pay Application Fee</h1>
                    
                                            <button @click="modelOpen = false" class="text-gray-600 focus:outline-none hover:text-gray-700">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </button>
                                        </div>
                    
                                        <div class="space-y-2 p-2">
                                            <div class="p-4 space-y-2 text-center ">
                                                <p class="text-gray-700">
                                                    FEE: NGN 25000
                                                </p>
                                                <p class="text-gray-700">
                                                    NAME: {{ auth()->user()->name }}
                                                </p>
                                                <p class="text-gray-700">
                                                    EMAIL: {{ auth()->user()->email }}
                                                </p>
                                                <p class="text-gray-500">
                                                    Are you sure you would like to proceed with the payment? Please confirm details below
                                                </p>
                                            </div>
                                        </div>
                        
                                        <div class="space-y-2">
                                            <div aria-hidden="true" class="border-t  px-2"></div>
                        
                                            <div class="px-6 py-2">
                                                <div class="grid gap-2 grid-cols-[repeat(auto-fit,minmax(0,1fr))]">
                                                    <button type="button"
                                                    class="inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-red-600 hover:bg-red-500 focus:bg-red-700 focus:ring-offset-red-700"
                                                        x-on:click="showModal = false">
                                                        <span class="flex items-center gap-1">
                                                            <span>
                                                                Cancel
                                                            </span>
                                                        </span>
                                                    </button>
                        
                                                    
                                                    <x-primary-button
                                                            class="inline-flex items-center justify-center py-1 gap-1 font-medium rounded-lg border transition-colors outline-none focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm text-white shadow focus:ring-white border-transparent bg-green-700 hover:bg-green-500 focus:bg-green-800 focus:ring-offset-green-700">
                                                        <a href="{{ route('application.store') }}">
                                                        <span class="flex items-center gap-1">
                                                            <span>
                                                                Confirm
                                                            </span>
                                                        </span>
                                                        </a>
                                                    </x-primary-button>
                                                </div>
                                            </div>
                                        </div>
                    
                                        
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</x-app-layout>
