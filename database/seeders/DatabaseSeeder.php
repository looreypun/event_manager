<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use App\Models\Status;
use App\Models\SubImage;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();

        Status::create([
            'name' => 'pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Status::create([
            'name' => 'paid',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Status::create([
            'name' => 'cancelled',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Event::factory()->count(20)->create();
        SubImage::factory()->count(10)->create();
    }
}
