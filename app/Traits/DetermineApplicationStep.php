<?php

namespace App\Traits;
use App\Models\AdmissionApplication;

trait DetermineApplicationStep
{
    public function nextStepRoute()
    {
        $application = auth()->user()->application;

        if (! $application->courseApplication){
            return route('course-application.create');
        }
        else if(! $application->personalDetails){
            return route('personal-detail.create');
        }
        else if (!$application->educations) {
            return route('education.create');
        }
        else{
            return route('application.preview');
        }

    }
}
