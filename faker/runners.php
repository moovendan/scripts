<?php
include 'database.php';

// Create the Books model
class Users extends Illuminate\Database\Eloquent\Model {
    public $timestamps = false;
}

// Create the Books model
class Races extends Illuminate\Database\Eloquent\Model {
    public $timestamps = false;
}

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();

/*
for($i=1;$i<10;$i++)
{

  $conference=new Users();

  $conference->username= $faker->name;

  $conference->save();
}
*/


for($i=1;$i<100;$i++)
{

   $attendee=new Races();

   $attendee->event=$faker->sentence(3);

   $attendee->winner_id=$faker->randomDigit;


  $attendee->save();
}
