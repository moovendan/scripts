<?php

require 'vendor/autoload.php';

use League\Csv\Writer;
use League\Csv\Reader;


use Goodby\CSV\Export\Standard\Exporter;
use Goodby\CSV\Export\Standard\ExporterConfig;


$faker = Faker\Factory::create();
$filename="mautic_dummy.csv";

$limit =10000;

for($i=0;$i<$limit;$i++)
{
      $user=[];

      $user['tite']=$faker->title;
      $user['firstName']=$faker->firstName;
      $user['lastName']=$faker->lastName;
      $user['company']=$faker->company;
      $user['jobTitle']=$faker->jobTitle;
      $user['email']=$faker->safeEmail;
      $user['phone']=$faker->phoneNumber;

      $formated_users[]=$user;
 }
 /*echo '<pre>';
print_r($formated_users);
exit;*/
echo '<pre>';
echo 'Total:-'.count($formated_users);


if(count($formated_users)>3000)
{
 $new_array= array_chunk($formated_users, 3000);
}
else
 $new_array[]=$formated_users;


$config = new ExporterConfig();
//$config->setEnclosure("");
$exporter = new Exporter($config);

foreach ($new_array as $key => $value) {
 //array_unshift($value, $csv_headers);

 $exporter->export($key.'_formated_'.$filename, $value);
}


?>
