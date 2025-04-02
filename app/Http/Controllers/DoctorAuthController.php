<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Subscription;
use App\Models\Specialization;
use Illuminate\Support\Facades\Hash;


class DoctorAuthController extends Controller
{


    public function showLogin(){
        return view('doctor.auth.login');
    }

    public function login(Request $request){
        $credentials = $request->only('email','password'); // for security
        if(Auth::guard('doctor')->attempt($credentials)){
            //return view('admin.dashboard');
            return redirect()->route('doctor.dashboard');
        }
        return redirect()->route('doctor.login');
    }
    public function dashboard(){
        $doctor = Auth::guard('doctor')->user();

       // dd($admin);
        return view('doctor.dashboard',compact('doctor'));
    }

    public function logout(){
        Auth::guard('doctor')->logout();
        return redirect()->route('doctor.login');
    }

    public function create()
    {

        $specializations = Specialization::all();
        return view('auth.register-doctor' ,compact('specializations'));
    }


    public function store(Request $request)
{
    // Validate the request data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:doctors',
        'password' => 'required|string|min:8|confirmed',
        'phone' => 'required|string|max:20|unique:doctors',
        'specialization_id' => 'required|exists:specializations,id',
        'bio' => 'nullable|string',
        'experience_years' => 'nullable|integer|min:0',
        'price_per_appointment' => 'nullable|numeric|min:0',
        'available_days' => 'nullable|json',
        'working_hours' => 'nullable|json',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048', // 2MB max
        'doctor_document' => 'required|file|mimes:pdf|max:5120', // 5MB max
        'governorate' => 'required|in:Amman,Irbid,Ajloun,Aqaba,Balqa,Zarqa,Mafraq,Maan,Tafilah,Karak,Jerash',
        'address' => 'nullable|string|max:255',
    ]);

    // Handle file uploads
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('doctor_images', 'public');
        $validated['image'] = $imagePath;
    }

    if ($request->hasFile('doctor_document')) {
        $documentPath = $request->file('doctor_document')->store('doctor_documents', 'public');
        $validated['doctor_document'] = $documentPath;
    }

    // Hash the password
    $validated['password'] = Hash::make($validated['password']);

    // Set default status
    $validated['status'] = 'pending'; // Default status for new doctors

    // Create the doctor
    $doctor = Doctor::create($validated);

    // Create subscription
    Subscription::create([
        'doctor_id' => $doctor->id,
        'start_date' => now(),
        'end_date' => now()->addYear(),
        'status' => 'active',
    ]);

    // You might want to login the doctor here or send a verification email
    Auth::login($doctor);

    return redirect()->route('subscriptions.index')
    ->with('success', 'Doctor registered successfully and added to subscriptions.');
}


    public function show()
    {
        $doctor = Auth::guard('doctor')->user();
        $upcomingAppointments = Appointment::where('doctor_id', $doctor->id)
                                            ->where('appointment_date', '>', now())
                                            ->orderBy('appointment_date', 'asc')
                                            ->paginate(5);
        $recentAppointments = Appointment::where('doctor_id', $doctor->id)
                                        ->where('appointment_date', '<', now())
                                        ->orderBy('appointment_date', 'desc')
                                        ->paginate(5);
        $total_appointments = Appointment::where('doctor_id', $doctor->id)->count();
        $canceled_appointments = Appointment::where('doctor_id', $doctor->id)->where('status', 'canceled')->count();
        $pending_appointments = Appointment::where('doctor_id', $doctor->id)->where('status', 'pending')->count();
        $completed_appointments = Appointment::where('doctor_id', $doctor->id)->where('status', 'confirmed')->count();
        return view('doctor.index' , compact('doctor' ,'upcomingAppointments' , 'recentAppointments', 'total_appointments', 'canceled_appointments', 'pending_appointments', 'completed_appointments'));
    }
}
