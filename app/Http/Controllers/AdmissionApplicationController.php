<?php

namespace App\Http\Controllers;

use App\Mail\ApplicationCodeMail;
use App\Models\AdmissionApplication;
use App\Traits\CollectsPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdmissionApplicationController extends Controller
{
    use CollectsPayment;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $application = auth()->user()->application;

        return view('application.index', [
            'application' => $application
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Check if there is payment involved
        $price = "25000";
        if ( (int) $price > 0){
            $data = [
                'email' => auth()->user()->email,
                'name' => auth()->user()->name
            ];
            $flw = $this->makePayment($data, $price, route('application.confirm-app-payment'));
            return redirect($flw->data->link);

        }
    }

    /**
     * Confirm Payment and make booking
     */
    public function confirmAppPayment(Request $request)
    {

        return $this->confirmPayment($request, function ($data) {
            return $this->makeApplication($data);
        } );
    }

    public function makeApplication($data){
        $application = auth()->user()->application()->create([
            'application_code' => time(),
        ]);
        Mail::to(auth()->user()->email)->send(new ApplicationCodeMail($application->application_code));

        return redirect(route('application.index'));
    }

    /**
     * Display the specified resource.
     */
    public function preview()
    {
        return view ('application.preview', ['application' => auth()->user()->application]);
    }

    public function submitApplication()
    {
        $application = auth()->user()->application;

        if ($application->courseApplication && $application->education && $application->personalDetails)
        {
            $application->update(['completed' => !$application->completed]);
        }

        dd($application);
        return redirect(route('application.index'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdmissionApplication $admissionApplication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdmissionApplication $admissionApplication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdmissionApplication $admissionApplication)
    {
        //
    }
}
