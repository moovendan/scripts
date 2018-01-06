<?php

require 'vendor/autoload.php';

use League\Csv\Writer;
use League\Csv\Reader;


use Goodby\CSV\Export\Standard\Exporter;
use Goodby\CSV\Export\Standard\ExporterConfig;

/*

$servername = "aa1mv2j2k0ilemi.c287deoikxyl.ap-southeast-1.rds.amazonaws.com";
$username = "zjbdbprod395";
$password = "ZjBPrD205$!*.37$#";
$dbname = "zoojoo.be";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * from emails as e inner join corporate_user as cu on cu.user_id=e.user_id where cu.corporate_id=43";

$result = $conn->query($sql);

$databse=array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
          $databse[$row['user_id']]=array('email'=>$row['email_to']);
    }
} else {
    echo "0 results";
}


$config = new ExporterConfig();
$exporter = new Exporter($config);


$exporter->export('users_in_database.csv', $databse);


$conn->close();

*/


$inputCsv = Reader::createFromPath('users_in_database.csv');
$inputCsv->setDelimiter(';');
//get the header
//$headers = $inputCsv->fetchOne(0);
//get at maximum 25 rows starting from the 801th row
$res = $inputCsv->fetch();

$users_from_database=array();
 foreach ($res as $row) {
   $users_from_database[]=strtolower($row[0]);
 }


 $inputCsv = Reader::createFromPath('itc_infotech_users.csv');
 $inputCsv->setDelimiter(',');
 //get the header
 $headers = $inputCsv->fetchOne(0);
 //get at maximum 25 rows starting from the 801th row
 $res = $inputCsv->fetch();

 $users_from_file_full=array();


 $users_from_file=array();
  foreach ($res as $k=>$row) {

    if($k==0)
    continue;

    $users_from_file[]=strtolower($row[2]);

    $users_from_file_full[]=array($row[0],$row[1],$row[2]);


  }





$result=array_diff($users_from_file,$users_from_database);

$diff_users_upload=array();
$diff_users_upload[]=array('FName','LName','Email');

foreach ($result as $key => $r) {
$key = array_search($r, array_column($users_from_file_full, 2));



  $diff_users_upload[]=array($users_from_file_full[$key][0],$users_from_file_full[$key][1],$users_from_file_full[$key][2]);



  //$diff_users_upload []= array('email' => $r);


}

echo '<pre>';
print_r($diff_users_upload);

exit;
$config = new ExporterConfig();
$exporter = new Exporter($config);


$exporter->export('diff_users.csv', $diff_users_upload);






?>
