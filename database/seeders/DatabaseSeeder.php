<?php

namespace Database\Seeders;

use App\Models\AvailableMonth;
use App\Models\Brand;
use App\Models\Installment;
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
//
//        Validator::create([
//            'name' => 'Validator 1',
//            'role' => 'validator'
//        ]);
//
//        $brands = Brand::create([
//            'brand' => 'Toyota'
//        ]);
//
//        $installment = Installment::create([
//            'brand_id' => $brands->id,
//            'car' => 'Supra MK5',
//            'description' => 'Lorem ipsum dolor sit amet',
//            'price' => 600000000,
//        ]);
//
//        AvailableMonth::create([
//            'installment_id' => $installment->id,
//            'month' => 12,
//            'description' => 'First month of the year',
//            'nominal' => 100000
//        ]);

        $brands = Brand::create([
            'brand' => 'Toyota'
        ]);

        $installment = Installment::create([
            'brand_id' => $brands->id,
            'car' => 'Supra MK6',
            'description' => 'Lorem ipsum dolor sit amet',
            'price' => 600000000,
        ]);

        AvailableMonth::create([
            'installment_id' => $installment->id,
            'month' => 12,
            'description' => 'First month of the year',
            'nominal' => 100000
        ]);
    }
}
