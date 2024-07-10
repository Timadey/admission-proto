<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Models\PersonalDetail;
use App\Religion;
use App\Title;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PersonalDetailController extends Controller
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
        return view('personal_details.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', Rule::enum(Title::class)],
            'surname' => ['required', 'string', 'max:64'],
            'other_names' => ['required', 'string', 'max:128'],
            'gender' => ['required', Rule::enum(Gender::class)],
            'date_of_birth' => ['required', 'date', 'before:today'],
            'religion' => ['required', Rule::enum(Religion::class)],
            'current_residential_address' => ['required', 'string', 'max:128'],
            'local_government' => ['required', 'string', 'max:128'],
            'state_of_origin' => ['required', 'string', 'max:24'],
            'phone_number' => ['required', 'string', 'max:14'],
            'signature' => ['required', 'image', 'mime:jpg,png', 'max:1024'],
            'signature_url' => [],
            'passport_photograph' => ['required', 'image', 'mime:jpg,png', 'max:1024'],
            'passport_photograph_url' => [],
        ]);

        if ($request->hasFile('signature')){
            $signature = $request->file('signature')->store('signatures');
            $validated['signature_url'] = $signature;
        }

        if ($request->hasFile('passport_photograph')){
            $passport_photograph = $request->file('passport_photograph')->store('passport_photographs');
            $validated['passport_photograph_url'] = $passport_photograph;
        }

        $personalDetail = auth()->user()->application()->personalDetail()->create($validated);
        return redirect(route('application.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonalDetail $personalDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonalDetail $personalDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonalDetail $personalDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalDetail $personalDetail)
    {
        //
    }
}