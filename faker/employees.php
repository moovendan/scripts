<?php
include 'database.php';

// Create the Books model
class Employees extends Illuminate\Database\Eloquent\Model {
    public $timestamps = false;
}

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();


for($i=1;$i<10000;$i++)
{

  $employee=new Employees();

  $employee->name= $faker->name;

  $employee->salary= $faker->randomNumber(5);

  $employee->save();


}
