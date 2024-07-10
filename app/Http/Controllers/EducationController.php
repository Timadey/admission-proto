<?php

namespace App\Http\Controllers;

use App\ExaminationType;
use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EducationController extends Controller
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
    public function create()
    {
        return view('education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'examination_type' => ['required', Rule::enum(ExaminationType::class)],
            'subject_name' => ['required', 'max:128'],
            'grade' => ['required', 'max:128'],
            'year' => ['required', 'date', 'before:today'],
        ]);

        $education = auth()->user()->application()->education()->create($validated);
        return redirect(route('application.index'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Education $education)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Education $education)
    {
        //
    }
}
