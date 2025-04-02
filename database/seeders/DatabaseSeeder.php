<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Disable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    // Truncate all tables
    $tables = ['users', 'admins', 'doctors', 'specializations', 'patients', 'appointments', 'subscriptions', 'doctor_unavailabilities'];
    foreach ($tables as $table) {
        DB::table($table)->truncate();
    }

    // Enable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    // Seed specializations first since doctors depend on them
    $specializations = [
        ['name' => 'Cardiology', 'description' => 'Heart and cardiovascular system'],
        ['name' => 'Dermatology', 'description' => 'Skin, hair, and nails'],
        ['name' => 'Neurology', 'description' => 'Nervous system'],
        ['name' => 'Pediatrics', 'description' => 'Children\'s health'],
        ['name' => 'Orthopedics', 'description' => 'Musculoskeletal system'],
        ['name' => 'Ophthalmology', 'description' => 'Eye care'],
        ['name' => 'Dentistry', 'description' => 'Oral health'],
        ['name' => 'Psychiatry', 'description' => 'Mental health'],
    ];

    // Create super admin
    $superAdmin = DB::table('admins')->insertGetId([
        'name' => 'Super Admin',
        'email' => 'superadmin@example.com',
        'password' => Hash::make('123456789'),
        'phone' => '962791234567',
        'role' => 'super_admin',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Create regular admin
    $admin = DB::table('admins')->insertGetId([
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => Hash::make('123456789'),
        'phone' => '962791234568',
        'role' => 'admin',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    // Insert specializations
    foreach ($specializations as $spec) {
        DB::table('specializations')->insert([
            'name' => $spec['name'],
            'description' => $spec['description'],
            'created_by' => $superAdmin,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    // Get all specialization IDs
    $specializationIds = DB::table('specializations')->pluck('id');

    // Create 20 users
    for ($i = 1; $i <= 20; $i++) {
        DB::table('users')->insert([
            'name' => 'User ' . $i,
            'email' => 'user' . $i . '@example.com',
            'image' => $i % 5 == 0 ? 'profile' . $i . '.jpg' : null,
            'email_verified_at' => now(),
            'phone' => '96279' . rand(1000000, 9999999),
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    // Create 10 doctors
    $governorates = [
        'Amman', 'Irbid', 'Ajloun', 'Aqaba', 'Balqa',
        'Zarqa', 'Mafraq', "Maan", 'Tafilah', 'Karak', 'Jerash'
    ];

    // Simplified working hours (9 AM to 5 PM)
    $workingHours = [
        'start' => '09:00',
        'end' => '17:00'
    ];

    $availableDays = ['Monday', 'Wednesday', 'Friday'];

    for ($i = 1; $i <= 10; $i++) {
        $status = $i % 3 == 0 ? 'pending' : ($i % 3 == 1 ? 'approved' : 'rejected');

        DB::table('doctors')->insert([
            'name' =>  ['John', 'Sarah', 'Michael', 'Emily', 'David', 'Lisa', 'Robert', 'Emma', 'James', 'Olivia'][$i-1] . ' ' . ['Smith', 'Johnson', 'Williams', 'Brown', 'Jones', 'Garcia', 'Miller', 'Davis', 'Rodriguez', 'Martinez'][$i-1],
            'email' => 'doctor' . $i . '@example.com',
            'password' => Hash::make('123456789'),
            'image' => $i % 3 == 0 ? 'doctor' . $i . '.jpg' : null,
            'doctor_document' => $i % 3 == 0 ? 'doc' . $i . '.pdf' : null,
            'phone' => '96279' . rand(2000000, 2999999),
            'specialization_id' => $specializationIds->random(),
            'bio' => 'Experienced doctor with ' . rand(5, 30) . ' years of practice in the field.',
            'experience_years' => rand(5, 30),
            'governorate' => $governorates[array_rand($governorates)],
            'address' => rand(100, 999) . ' Main St, Building ' . rand(1, 50),
            'price_per_appointment' => rand(20, 100) * 1000,
            'available_days' => json_encode($availableDays),
            'working_hours' => json_encode($workingHours),
            'status' => $status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    // Get all doctor IDs
    $doctorIds = DB::table('doctors')->where('status', 'approved')->pluck('id');

    // Create patients associated with users
    $userIds = DB::table('users')->pluck('id');
    foreach ($userIds as $userId) {
        DB::table('patients')->insert([
            'name' => 'Patient for User ' . $userId,
            'phone' => '96279' . rand(3000000, 3999999),
            'user_id' => $userId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    // Create some patients without user accounts
    for ($i = 1; $i <= 5; $i++) {
        DB::table('patients')->insert([
            'name' => 'Guest Patient ' . $i,
            'phone' => '96279' . rand(4000000, 4999999),
            'user_id' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    // Get all patient IDs
    $patientIds = DB::table('patients')->pluck('id');

    // Create appointments with separate date and time
    for ($i = 1; $i <= 50; $i++) {
        $doctorId = $doctorIds->random();
        $patientId = $patientIds->random();
        $date = Carbon::now()->addDays(rand(1, 30))->format('Y-m-d');
        $time = Carbon::createFromTime(rand(9, 16), rand(0, 1) * 30, 0)->format('H:i:s');

        $status = $i % 4 == 0 ? 'pending' : ($i % 4 == 1 ? 'confirmed' : 'canceled');
        $paymentStatus = $status == 'confirmed' ? (rand(0, 1) ? 'paid' : 'unpaid') : 'unpaid';

        DB::table('appointments')->insert([
            'doctor_id' => $doctorId,
            'patient_id' => $patientId,
            'appointment_date' => $date,
            'appointment_time' => $time,
            'status' => $status,
            'payment_status' => $paymentStatus,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    // Create subscriptions for doctors
    foreach ($doctorIds as $doctorId) {
        $startDate = Carbon::now()->subDays(rand(0, 30));
        $endDate = $startDate->copy()->addDays(rand(30, 365));
        $status = $endDate->isPast() ? 'expired' : 'active';

        DB::table('subscriptions')->insert([
            'doctor_id' => $doctorId,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => $status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    // Create doctor unavailabilities
    foreach ($doctorIds as $doctorId) {
        for ($i = 1; $i <= rand(1, 5); $i++) {
            $date = Carbon::now()->addDays(rand(1, 30));
            $startTime = Carbon::createFromTime(rand(8, 16), rand(0, 1) * 30, 0);

            DB::table('doctor_unavailabilities')->insert([
                'doctor_id' => $doctorId,
                'date' => $date,
                'start_time' => $startTime,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
}
