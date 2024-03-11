<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //  $faker=Faker::create(); 
    //  $pinCode = rand(3, 100);
    //  for($i=1;$i<=10;$i++){
    //     $data=[
    //         "first_name"=>$faker->name,
    //         "last_name"=>$faker->name,
    //         "dob"=>$faker->dateTime(),
    //         "email"=>$faker->email,
    //         "mobile_number"=>$faker->numberBetween(111111111, 9999999999),
    //         "gender"=>"m",
    //         "address"=>$faker->address,
    //         "city"=>$faker->name,
    //         "pin_code"=>$pinCode,
    //         "state"=>$faker->name,
    //         "country"=>$faker->name,
    //         "hobbies"=>$faker->name,
    //         // "qualification"=>$faker->qualification,
    //         "courses"=>$faker->name
    //     ];
    //     Student::create($data);
    //  }
    }
}
