<?php

namespace App\Http\Controllers;

use App\Events\BookingCreated;
use App\Http\Requests\BookingRequest;
use App\Models\Booking;
use App\Models\MeetingSession;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Ramsey\Uuid\Uuid;
use App\Traits\CollectsPayment;

class BookingController extends Controller
{
    use CollectsPayment;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Booking::orderBy('created_at', 'desc')->get();
        return Inertia::render('Admin/Bookings/Index', ['bookings' => $bookings]);
    }

    /**
     * Update a booking
     */
    public function update(BookingRequest $request, Booking $booking){

        $validated = $request->validated();

        $booking->update($validated);

        return $booking;
    }

    /**
     * Delete a booking
     */
    public function destroy(Booking $booking){

        Booking::destroy($booking->id);

        return Inertia::location(route('bookings.index'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingRequest $request)
    {
        $validated = $request->validated();

        // Check if there is payment involved
        $price = $validated['price'];
        if ( (int) $price > 0){
            session([$validated['email'] => $validated]);
            $data = [
                'email' => $validated['email'],
                'name' => $validated['first_name'] . " " . $validated['last_name']
            ];
            $flw = $this->makePayment($data, $price, route('confirm-booking'));
            return Inertia::location($flw->data->link);
        }

        return $this->makeBooking($validated);
    }

    /**
     * Success page for booking
     */
    public function bookingSuccess(Request $request)
    {
        if ($request->session()->has('success')){
            
            return Inertia::render('Public/SuccessPage', [
                'heading' => 'Success',
                'title' => 'Booking created successfully',
                'message' => 'You have successfully booked a meeting with us.
                Please check your email for next steps and a copy of the meeting info',
                'btnLabel' => 'Go home',
                'btnLink' => route('homepage')
            ]);
        }
        return Inertia::location(route('homepage'));
    }

    /**
     * Make and store a booking
     * 
     * @future move this to a service
     */
    public function makeBooking($validated){

        if (! array_key_exists('meeting_id', $validated)){
            // Create a new meeting if meeting id does not exists
            $meeting = MeetingSession::create([
                'title' => "Consultation Meeting with " . $validated['first_name']. " " . $validated['last_name'],
                'type' => $validated['session_type'],
                'price' => $validated['price'],
                'date' => $validated['date'],
                'time' => $validated['time'],
                'expert_id' => $validated['expert_id'],
            ]);
            $validated['meeting_id'] = $meeting->id;
        };
        $booking = Booking::create($validated);
        event(new BookingCreated($booking));
        return redirect()->route('booking-success')
        ->with('success', 'Booking created successfully.');
    }

    /**
     * Confirm Payment and make booking
     */
    public function confirmBooking(Request $request)
    {

        return $this->confirmPayment($request, function ($data) {
            return $this->makeBooking($data);
        } );
    }
}
