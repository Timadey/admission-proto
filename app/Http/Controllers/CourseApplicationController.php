<?php

namespace App\Http\Controllers;

use App\Models\CourseApplication;
use App\Program;
use App\Traits\DetermineApplicationStep;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CourseApplicationController extends Controller
{
    use DetermineApplicationStep;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $application = auth()->user()->application;

        if ($application->courseApplication){
            return redirect($this->nextStepRoute());
        }

        return view('course_application.create', [
            'application' => $application,
            'programs' => Program::cases()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_choice' => ['required', Rule::enum(Program::class)],
            'second_choice' => ['required', Rule::enum(Program::class)],
        ]);

        $application = auth()->user()->application;
        // $validated['application_code'] = $application->application_code;
        $application->courseApplication()->create($validated);
        return redirect($this->nextStepRoute($application));
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseApplication $courseApplication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseApplication $courseApplication)
    {
        return view('course_application.update', [
            'courseApplication' => $courseApplication,
            'programs' => Program::cases(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CourseApplication $courseApplication)
    {
        $validated = $request->validate([
            'first_choice' => ['required', Rule::enum(Program::class)],
            'second_choice' => ['required', Rule::enum(Program::class)],
        ]);

        $courseApplication->update($validated);
        return redirect($this->nextStepRoute());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseApplication $courseApplication)
    {
        //
    }
}
