<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Roles
        $roles = Role::insert([
            ['name' => 'admin', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'organiser', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'user', 'guard_name' => 'web', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);

        // Users
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('admin');

        $organiser = User::create([
            'name' => 'Organiser',
            'email' => 'organiser@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('organiser');

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ])->assignRole('user');

        // Statuses
        Status::insert([
            ['name' => 'pending', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'paid', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'cancelled', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()]
        ]);

        // Events
        Event::factory()->count(10)->create();
    }
}
