<?php

require 'vendor/autoload.php';

use League\Csv\Writer;
use League\Csv\Reader;


use Goodby\CSV\Export\Standard\Exporter;
use Goodby\CSV\Export\Standard\ExporterConfig;




echo count(explode(",",'38356,38344,38332,38348,38369,38351,38353,38333,38301,38339,38316,38305,38429,38328,38322,38340,38306,38321,38334,38304,38299,38431,38337,38352,38323,38435,38297,38358,38597,38349,38312,38357,38326,38325,38347,38398,38320,38388,38303,38324,38329,38355,38294,29201,38310,38354,38327,38319,38330,38309,38345,38350,38341,38396,38397,38315,38313,38596,38302,38307,38420,38436,38360,38311,38342,38308,38343,38335,38346,38317,38318,38359,38314,38424,38331,38338,38336'));

exit;

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


for($i=0;$i<100;$i++)
{

  $diff_users_upload[]=array('moo'.$i,'last'.$i,'moo+'.$i.'@zoojoo.be');

}


$config = new ExporterConfig();
$exporter = new Exporter($config);


$exporter->export('dummy_users.csv', $diff_users_upload);




?>
