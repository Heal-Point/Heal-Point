<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $appointments = Appointment::with('doctor', 'patient')->paginate(10);
        $doctors = Doctor::all(); // Assuming you have a Doctor model
        $patients = Patient::all(); // Assuming you have a Patient model

        return view('admin.appointments', compact('appointments', 'doctors', 'patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $doctors = \App\Models\Doctor::all();
        $patients = \App\Models\Patient::all();

        return view('admin.appointments.create', compact('doctors', 'patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $validated = $request->validated();
        Appointment::create($validated);

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        $appointment->load('doctor', 'patient');

        return view('admin.appointments.show', compact('appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        $doctors = \App\Models\Doctor::all();
        $patients = \App\Models\Patient::all();

        return view('admin.appointments.edit', compact('appointment', 'doctors', 'patients'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    // {
    //     // $validated = $request->validated();
    //     // $appointment->update($validated);

    //     // return redirect()->route('admin.appointments.index')->with('success', 'Appointment updated successfully.');
    // }

    public function rules()
    {
        return [
            'doctor_id' => 'required|exists:doctors,id',
            'patient_id' => 'nullable|exists:patients,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,canceled',
            'payment_status' => 'required|in:paid,unpaid',
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        // $appointment->delete();

        // return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully.');
    }

    public function update(Request $request, Appointment $appointmentId) {

        // dd($request->status , $appointmentId->status);
        $appointmentId->update(['status' => $request->status]);
        return back()->with('success', 'Appointment canceled successfully.');
    }
}
