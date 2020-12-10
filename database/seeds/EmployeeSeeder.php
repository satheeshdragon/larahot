<?php

use Illuminate\Database\Seeder;


class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = $faker = Faker\Factory::create();
        foreach (range(1,250) as $index) {
            DB::table('employee')->insert([
                'employee_first_name' => $faker->name,
                'employee_last_name' => $faker->name,
                'employee_ref_number' => 00000,
                'employee_phone_number' => rand(0,5),
                'employee_address' => $faker->name,
                'employee_address_two' => $faker->name,
                'employee_country' => $faker->name,
                'employee_state' => $faker->state,
                'employee_city' => $faker->city,
                'employee_email' => $faker->email,
                'employee_pin_code' => rand(0,5),
                'employee_reference' => $faker->name,
                'employee_unique_identy' => $faker->name,
            ]);
        }
    }
}
