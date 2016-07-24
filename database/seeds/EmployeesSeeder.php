<?php

use Illuminate\Database\Seeder;
use App\Employee;
use Faker\Factory as Faker;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index) {
        	Employee::create([
        		'name'=>$faker->name(),
        		'code'=>$faker->unique()->randomDigit,
        		'designation'=>$faker->randomElement($array=array('Developer','Desginer','Tester','Businees Analyist','Admin','HR','Recuirtment','House Keeping')),
        		'department'=>$faker->jobTitle,
        		'status'=>$faker->randomElement($status = [0,1]),        		
        		'location'=>$faker->country
        		]);
        }
    }
}
