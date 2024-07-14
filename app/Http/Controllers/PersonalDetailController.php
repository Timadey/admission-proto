<?php

namespace App\Http\Controllers;

use App\Gender;
use App\Models\PersonalDetail;
use App\Religion;
use App\Title;
use App\Traits\DetermineApplicationStep;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PersonalDetailController extends Controller
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

        if ($application->personalDetails){
            return redirect($this->nextStepRoute());
        }
        return view('personal_details.create', [
            'application' => $application,
            'titles' => Title::cases(),
            'genders' => Gender::cases(),
            'religions' => Religion::cases(),

        ]);
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
            'signature' => ['required', 'image', 'max:1024', 'nullable'],
            'signature_url' => [],
            'passport_photograph' => ['required', 'image', 'max:1024', 'nullable'],
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

        $personalDetail = auth()->user()->application->personalDetails()->create($validated);
        return redirect($this->nextStepRoute());
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
        return view('personal_details.edit', [
            'application_code' => auth()->user()->application->application_code,
            'titles' => Title::cases(),
            'genders' => Gender::cases(),
            'religions' => Religion::cases(),
            'personalDetail' => $personalDetail,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonalDetail $personalDetail)
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
            'signature' => ['sometimes', 'nullable', 'image', 'max:1024'],
            'signature_url' => [],
            'passport_photograph' => ['sometimes', 'nullable', 'image', 'max:1024'],
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

        $personalDetail = $personalDetail->update($validated);
        return redirect($this->nextStepRoute());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonalDetail $personalDetail)
    {
        //
    }
}
