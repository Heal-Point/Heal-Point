@extends('layouts.admin.app')

@section('header')
Doctors
@endsection

@section('content')
<div class="container">
    <!-- Add Doctor Button -->
    {{-- <div class="d-flex justify-content-end mb-3">
        <button type="button" class="btn" style="background-color: #e12454; color: white;" data-bs-toggle="modal" data-bs-target="#addDoctorModal">
            Add Doctor
        </button>
    </div> --}}

    <!-- Doctors Table -->
    <table class="table table-striped dashboard-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                {{-- <th>Email</th> --}}
                <th>Phone</th>
                <th>Specialization</th>
                <th>Experience (Years)</th>
                <th>Price Per Appointment</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctors as $doctor)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $doctor->name }}</td>
                    {{-- <td>{{ $doctor->email }}</td> --}}
                    <td>{{ $doctor->phone }}</td>
                    <td>{{ $doctor->specialization->name ?? 'N/A' }}</td>
                    <td>{{ $doctor->experience_years }}</td>
                    <td>${{ number_format($doctor->price_per_appointment, 2) }}</td>
                    <td>
                        <div class="d-flex gap-2">
                            <!-- Edit Button -->
                            <button type="button" class="btn btn-primary p-2" data-bs-toggle="modal" data-bs-target="#editDoctorModal-{{ $doctor->id }}">
                                Edit
                            </button>

                            <!-- Delete Button -->
                            <button type="button" class="btn btn-danger p-2" data-bs-toggle="modal" data-bs-target="#deleteDoctorModal-{{ $doctor->id }}">
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>

                <!-- Edit Doctor Modal -->
                <div class="modal fade" id="editDoctorModal-{{ $doctor->id }}" tabindex="-1" aria-labelledby="editDoctorModalLabel-{{ $doctor->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editDoctorModalLabel-{{ $doctor->id }}">Edit Doctor: {{ $doctor->name }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="name-{{ $doctor->id }}" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name-{{ $doctor->id }}" name="name" value="{{ $doctor->name }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email-{{ $doctor->id }}" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email-{{ $doctor->id }}" name="email" value="{{ $doctor->email }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone-{{ $doctor->id }}" class="form-label">Phone</label>
                                        <input type="text" class="form-control" id="phone-{{ $doctor->id }}" name="phone" value="{{ $doctor->phone }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="specialization_id-{{ $doctor->id }}" class="form-label">Specialization</label>
                                        <select class="form-select" id="specialization_id-{{ $doctor->id }}" name="specialization_id" required>
                                            <option value="">Select Specialization</option>
                                            @foreach ($specializations as $specialization)
                                                <option value="{{ $specialization->id }}" {{ $doctor->specialization_id == $specialization->id ? 'selected' : '' }}>
                                                    {{ $specialization->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="experience_years-{{ $doctor->id }}" class="form-label">Experience (Years)</label>
                                        <input type="number" class="form-control" id="experience_years-{{ $doctor->id }}" name="experience_years" value="{{ $doctor->experience_years }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="price_per_appointment-{{ $doctor->id }}" class="form-label">Price Per Appointment</label>
                                        <input type="number" step="0.01" class="form-control" id="price_per_appointment-{{ $doctor->id }}" name="price_per_appointment" value="{{ $doctor->price_per_appointment }}">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Delete Doctor Modal -->
                <div class="modal fade" id="deleteDoctorModal-{{ $doctor->id }}" tabindex="-1" aria-labelledby="deleteDoctorModalLabel-{{ $doctor->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteDoctorModalLabel-{{ $doctor->id }}">Confirm Deletion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete doctor "{{ $doctor->name }}" ({{ $doctor->email }})? This action cannot be undone.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Confirm Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="mt-4 d-flex justify-content-center">
        {{ $doctors->links() }}
    </div>
</div>

<!-- Add Doctor Modal -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDoctorModalLabel">Add New Doctor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('doctors.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
                    </div>

                    <!-- Phone -->
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone number">
                    </div>

                    <!-- Specialization -->
                    <div class="mb-3">
                        <label for="specialization_id" class="form-label">Specialization</label>
                        <select class="form-select" id="specialization_id" name="specialization_id" required>
                            <option value="">Select Specialization</option>
                            @foreach ($specializations as $specialization)
                                <option value="{{ $specialization->id }}">{{ $specialization->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Experience (Years) -->
                    <div class="mb-3">
                        <label for="experience_years" class="form-label">Experience (Years)</label>
                        <input type="number" class="form-control" id="experience_years" name="experience_years" placeholder="Enter experience in years">
                    </div>

                    <!-- Price Per Appointment -->
                    <div class="mb-3">
                        <label for="price_per_appointment" class="form-label">Price Per Appointment</label>
                        <input type="number" step="0.01" class="form-control" id="price_per_appointment" name="price_per_appointment" placeholder="Enter price per appointment">
                    </div>

                    <!-- Bio -->
                    <div class="mb-3">
                        <label for="bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="bio" name="bio" rows="3" placeholder="Enter bio"></textarea>
                    </div>

                    <!-- Clinic Address -->
                    <div class="mb-3">
                        <label for="clinic_address" class="form-label">Clinic Address</label>
                        <input type="text" class="form-control" id="clinic_address" name="clinic_address" placeholder="Enter clinic address">
                    </div>

                    <!-- Available Days -->
                    <div class="mb-3">
                        <label for="available_days" class="form-label">Available Days</label>
                        <input type="text" class="form-control" id="available_days" name="available_days" placeholder="e.g., Monday, Wednesday, Friday">
                    </div>

                    <!-- Working Hours -->
                    <div class="mb-3">
                        <label for="working_hours" class="form-label">Working Hours</label>
                        <input type="text" class="form-control" id="working_hours" name="working_hours" placeholder="e.g., 9:00 AM - 5:00 PM">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Doctor</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
