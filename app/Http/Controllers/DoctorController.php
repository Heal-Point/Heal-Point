<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Specialization;
use Illuminate\Http\Request;

class DoctorController extends Controller
{

    // public function show(Doctor $doctor)
    // {
    //     return view('doctor.index');
    // }

    public function index()
    {
        // Fetch doctors with pagination
        $doctors = Doctor::with('specialization')->paginate(10);

        // Fetch all specializations
        $specializations = Specialization::all();

        // Pass both variables to the view
        return view('admin.doctors.index', compact('doctors', 'specializations'));
    }


   /**
     */
    public function edit(Doctor $doctor)
    {
        $specializations = Specialization::all();
        return view('view.doctor.edit', compact('doctors', 'specializations'));
    }

    /**
     * Update the specified doctor in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'password' => 'nullable|min:6',
            'phone' => 'nullable|string|max:20',
            'specialization_id' => 'required|exists:specializations,id',
            'bio' => 'nullable|string',
            'experience_years' => 'nullable|integer|min:0',
            'clinic_address' => 'nullable|string',
            'price_per_appointment' => 'nullable|numeric|min:0',
            'available_days' => 'nullable|string',
            'working_hours' => 'nullable|string',
        ]);

        $doctorData = $request->only([
            'name', 'email', 'phone', 'specialization_id', 'bio', 'experience_years',
            'clinic_address', 'price_per_appointment', 'available_days', 'working_hours'
        ]);

        if ($request->filled('password')) {
            $doctorData['password'] = bcrypt($request->password);
        }

        $doctor->update($doctorData);

        return redirect()->route('doctors.index')->with('success', 'Doctor updated successfully.');
    }


    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|unique:doctors',
    //         'password' => 'required|min:6|confirmed',
    //         'phone' => 'nullable|string|max:20',
    //         'specialization_id' => 'required|exists:specializations,id',
    //         'experience_years' => 'nullable|integer|min:0',
    //         'price_per_appointment' => 'nullable|numeric|min:0',
    //         'bio' => 'nullable|string', // Optional bio field
    //         'clinic_address' => 'nullable|string', // Optional clinic address
    //         'available_days' => 'nullable|string', // Optional available days
    //         'working_hours' => 'nullable|string', // Optional working hours
    //     ]);

    //     // Create the doctor
    //     Doctor::create([
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => bcrypt($request->password), // Hash the password
    //         'phone' => $request->phone,
    //         'specialization_id' => $request->specialization_id,
    //         'experience_years' => $request->experience_years,
    //         'price_per_appointment' => $request->price_per_appointment,
    //         'bio' => $request->bio,
    //         'clinic_address' => $request->clinic_address,
    //         'available_days' => $request->available_days,
    //         'working_hours' => $request->working_hours,
    //         'created_by' => auth()->guard('admin')->id(), // Get admin's ID who creates the doctor
    //     ]);

    //     // Redirect with success message
    //     return redirect()->route('doctors.index')->with('success', 'Doctor created successfully.');
    // }



    /**
     * Remove the specified doctor from storage.
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();
        return redirect()->route('doctors.index')->with('success', 'Doctor deleted successfully.');
    }
}

