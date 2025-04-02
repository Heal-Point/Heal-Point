@extends('layouts.public.doctorPortal')

@section('styles')
<style>
    .btn-primary {
        background-color: #e12454;
        color: white;
    }
    .btn-primary:hover {
        background-color: #c01e48;
    }
    .link-accent {
        color: #e12454;
    }
    .link-accent:hover {
        color: #c01e48;
    }
    .border-accent {
        border-color: #e12454;
    }
    .focus-accent:focus {
        border-color: #e12454;
        ring-color: #e12454;
    }
    .file-upload {
        border: 1px dashed #d1d5db;
        transition: all 0.3s ease;
    }
    .file-upload:hover {
        border-color: #e12454;
    }
</style>
@endsection

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="md:flex">
            <!-- Left Side - Benefits -->
            <div class="md:w-2/5 bg-[#223a66] p-8 text-white">
                <h2 class="text-2xl font-bold mb-6">Join Our Medical Network</h2>
                <ul class="space-y-4">
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-[#e12454] mt-1 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Reach thousands of potential patients</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-[#e12454] mt-1 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Manage your schedule with ease</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-[#e12454] mt-1 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Verified profile builds trust</span>
                    </li>
                    <li class="flex items-start">
                        <svg class="h-5 w-5 text-[#e12454] mt-1 mr-3" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                        <span>Secure and confidential platform</span>
                    </li>
                </ul>
            </div>

            <!-- Right Side - Form -->
            <div class="md:w-3/5 p-8">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Doctor Registration</h1>

                <form method="POST" action="{{ route('register.doctor.store') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-4">
                        <!-- Personal Information -->
                        <div>
                            <x-input-label for="name" :value="__('Full Name')" />
                            <x-text-input id="name" class="block mt-1 w-full focus-accent" type="text" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full focus-accent" type="email" name="email" :value="old('email')" required />
                            <x-input-error :messages="$errors->get('email')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="phone" :value="__('Phone Number')" />
                            <x-text-input id="phone" class="block mt-1 w-full focus-accent" type="tel" name="phone" :value="old('phone')" required />
                            <x-input-error :messages="$errors->get('phone')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="specialization_id" :value="__('Specialization')" />
                            <select id="specialization_id" name="specialization_id" class="block mt-1 w-full border-gray-300 focus-accent rounded-md shadow-sm">
                                <option value="">Select your specialization</option>
                                @foreach($specializations as $specialization)
                                    <option value="{{ $specialization->id }}" {{ old('specialization_id') == $specialization->id ? 'selected' : '' }}>
                                        {{ $specialization->name }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('specialization_id')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full focus-accent" type="password" name="password" required />
                            <x-input-error :messages="$errors->get('password')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <x-text-input id="password_confirmation" class="block mt-1 w-full focus-accent" type="password" name="password_confirmation" required />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
                        </div>
                    </div>

                    <!-- Professional Details -->
                    <div class="grid md:grid-cols-2 gap-4 mt-4">
                        <div>
                            <x-input-label for="experience_years" :value="__('Years of Experience')" />
                            <x-text-input id="experience_years" class="block mt-1 w-full focus-accent" type="number" name="experience_years" :value="old('experience_years')" min="0" />
                            <x-input-error :messages="$errors->get('experience_years')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="governorate" :value="__('Governorate')" />
                            <select id="governorate" name="governorate" class="block mt-1 w-full border-gray-300 focus-accent rounded-md shadow-sm">
                                <option value="Amman" {{ old('governorate') == 'Amman' ? 'selected' : '' }}>Amman</option>
                                <option value="Irbid" {{ old('governorate') == 'Irbid' ? 'selected' : '' }}>Irbid</option>
                                <option value="Ajloun" {{ old('governorate') == 'Ajloun' ? 'selected' : '' }}>Ajloun</option>
                                <option value="Aqaba" {{ old('governorate') == 'Aqaba' ? 'selected' : '' }}>Aqaba</option>
                                <option value="Balqa" {{ old('governorate') == 'Balqa' ? 'selected' : '' }}>Balqa</option>
                                <option value="Zarqa" {{ old('governorate') == 'Zarqa' ? 'selected' : '' }}>Zarqa</option>
                                <option value="Mafraq" {{ old('governorate') == 'Mafraq' ? 'selected' : '' }}>Mafraq</option>
                                <option value="Maan" {{ old('governorate') == 'Maan' ? 'selected' : '' }}>Maan</option>
                                <option value="Tafilah" {{ old('governorate') == 'Tafilah' ? 'selected' : '' }}>Tafilah</option>
                                <option value="Karak" {{ old('governorate') == 'Karak' ? 'selected' : '' }}>Karak</option>
                                <option value="Jerash" {{ old('governorate') == 'Jerash' ? 'selected' : '' }}>Jerash</option>
                            </select>
                            <x-input-error :messages="$errors->get('governorate')" class="mt-1" />
                        </div>

                        <div class="md:col-span-2">
                            <x-input-label for="address" :value="__('Clinic Address')" />
                            <x-text-input id="address" class="block mt-1 w-full focus-accent" type="text" name="address" :value="old('address')" />
                            <x-input-error :messages="$errors->get('address')" class="mt-1" />
                        </div>

                        <div>
                            <x-input-label for="price_per_appointment" :value="__('Price per Appointment (JOD)')" />
                            <x-text-input id="price_per_appointment" class="block mt-1 w-full focus-accent" type="number" name="price_per_appointment" :value="old('price_per_appointment')" step="0.01" min="0" />
                            <x-input-error :messages="$errors->get('price_per_appointment')" class="mt-1" />
                        </div>
                    </div>

                    <!-- Bio and Documents -->
                    <div class="mt-4">
                        <x-input-label for="bio" :value="__('Professional Bio')" />
                        <textarea id="bio" name="bio" rows="3" class="block mt-1 w-full border-gray-300 focus-accent rounded-md shadow-sm">{{ old('bio') }}</textarea>
                        <x-input-error :messages="$errors->get('bio')" class="mt-1" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image" :value="__('Profile Photo')" />
                        <div class="file-upload mt-1 p-4 rounded-lg text-center">
                            <input id="image" name="image" type="file" class="hidden" accept="image/*" required>
                            <label for="image" class="cursor-pointer">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-1 text-sm text-gray-600">Click to upload profile photo</p>
                                <p class="text-xs text-gray-500">PNG, JPG up to 2MB</p>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('image')" class="mt-1" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="doctor_document" :value="__('Medical License/Certificate')" />
                        <div class="file-upload mt-1 p-4 rounded-lg text-center">
                            <input id="doctor_document" name="doctor_document" type="file" class="hidden" accept=".pdf" required>
                            <label for="doctor_document" class="cursor-pointer">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                </svg>
                                <p class="mt-1 text-sm text-gray-600">Click to upload medical license</p>
                                <p class="text-xs text-gray-500">PDF up to 5MB</p>
                            </label>
                        </div>
                        <x-input-error :messages="$errors->get('doctor_document')" class="mt-1" />
                    </div>

                    <div class="flex items-center justify-between mt-6">
                        <a class="text-sm link-accent hover:underline" href="{{ route('login') }}">
                            Already registered?
                        </a>
                        <button type="submit" class="btn-primary px-4 py-2 rounded-md font-medium">
                            Complete Registration
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // File upload display logic
    document.getElementById('image').addEventListener('change', function(e) {
        const label = this.nextElementSibling;
        if (this.files.length > 0) {
            label.querySelector('p:first-of-type').textContent = this.files[0].name;
        }
    });

    document.getElementById('doctor_document').addEventListener('change', function(e) {
        const label = this.nextElementSibling;
        if (this.files.length > 0) {
            label.querySelector('p:first-of-type').textContent = this.files[0].name;
        }
    });
</script>
@endsection
