<?php
include 'database.php';

// Create the Books model
class Conferences extends Illuminate\Database\Eloquent\Model {
    public $timestamps = false;
}

// Create the Books model
class Attendees extends Illuminate\Database\Eloquent\Model {
    public $timestamps = false;
}

// use the factory to create a Faker\Generator instance
$faker = Faker\Factory::create();
/*

for($i=1;$i<10;$i++)
{

  $conference=new Conferences();

  $conference->location_id= $faker->randomDigit;

  $conference->topic_id= $faker->randomDigit;

  $conference->conference_date= $faker->date();

  $conference->save();
}*/


for($i=1;$i<5000;$i++)
{

   $attendee=new Attendees();

   $attendee->surname=$faker->name;

   $attendee->conference_id=$faker->randomDigit;

   $attendee->registration_status=$faker->randomElement($array = array (0,1));

  $attendee->save();
}
