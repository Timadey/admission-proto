<?php

namespace App\Http\Controllers;

use App\Grade as GradeEnum;
use App\Subject;
use App\Models\Grade;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GradeController extends Controller
{
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
    public function create(Education $education)
    {
        return view('education.grade.create', [
            'education' => $education,
            'subjects' => Subject::cases(),
            'grades' => GradeEnum::cases(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Education $education)
    {
        $validated = $request->validate([
            'grades.*.subject_name' => ['required', 'max:128', Rule::enum(Subject::class)],
            'grades.*.grade' => ['required', 'max:128', Rule::enum(GradeEnum::class)],
        ]);

        $grades = $validated['grades'];
        foreach ($grades as $grade){
            $education->grades()->create($grade);
        }


        return redirect(route('education.create'))->with('success', 'Added grades sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Education $education)
    {
        return view('education.grade.edit', [
            'education' => $education,
            'subjects' => Subject::cases(),
            'grades' => GradeEnum::cases(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        $validated = $request->validate([
            'grades.*.grade_id' => ['required', 'exists:grades,id'],
            'grades.*.subject_name' => ['required', 'max:128', Rule::enum(Subject::class)],
            'grades.*.grade' => ['required', 'max:128', Rule::enum(GradeEnum::class)],
        ]);

        $grades = $validated['grades'];
        foreach ($grades as $grade) {
            $exam = $education->grades()->where('id', $grade['grade_id'])->first();
            $exam->update([
                'subject_name' => $grade['subject_name'],
                'grade' => $grade['grade'],
            ]);
        }


        return redirect(route('education.create'))->with('success', 'Edited grades sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
