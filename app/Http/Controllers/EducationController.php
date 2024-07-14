<?php

namespace App\Http\Controllers;

use App\ExaminationType;
use App\Models\Education;
use App\Traits\DetermineApplicationStep;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EducationController extends Controller
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
        return view('education.create', [
            'application' => auth()->user()->application,
            'examinationTypes' => ExaminationType::cases(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'examination_type' => ['required', Rule::enum(ExaminationType::class)],
            'year' => ['required', 'date', 'before:today'],
        ]);

        $education = auth()->user()->application->educations()->create($validated);
        return redirect(route('grade.create', ['education' => $education->id]));

    }

    /**
     * Display the specified resource.
     */
    public function show(Education $education)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('education.edit', [
            'education' => $education,
            'examinationTypes' => ExaminationType::cases(),
            'education' => $education,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'examination_type' => ['required', Rule::enum(ExaminationType::class)],
            'year' => ['required', 'date', 'before:today'],
        ]);

        $education = $education->update($validated);
        return redirect(route('education.create'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        //
    }
}
