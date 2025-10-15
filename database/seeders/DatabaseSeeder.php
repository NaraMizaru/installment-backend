<?php

namespace Database\Seeders;

use App\Models\Regional;
use App\Models\Society;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Validator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);

//        $regional = Regional::create([
//            'province' => 'Province A',
//            'district' => 'District A',
//        ]);
//
//        Society::create([
//            'id_card_number' => '12345678',
//            'password' => bcrypt('12345678'),
//            'name' => 'John Doe',
//            'born_date' => '1990-01-01',
//            'gender' => 'male',
//            'address' => '123 Main St',
//            'regional_id' => $regional->id,
//        ]);

        Validator::create([
            'name' => 'Validator 1',
            'role' => 'validator'
        ]);
    }
}
