<?php
$servername = "localhost";
$username = "root";
$password = "zoojoobe";
$dbname = "zoojoo.be";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM metro_train where line=1 order by id";
$result = $conn->query($sql);

$stations=array();

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

      $stations[]=$stations1[]=array($row['station'],$row['longitude'],$row['latitude'],$row['full_address']);

    }

} else {
    echo "0 results";
}
$conn->close();


/*echo '<pre>';
print_r($stations1);
print_r($stations);
exit;
*/
foreach ($stations as $key => $s) {

    foreach ($stations1 as $key => $s1) {

        //if($s[0]!=$s1[0] && $s1[0]=='Cubbon Park')
        if($s[0]!=$s1[0])
        {
          $f_station=$s[0];
          $t_station=$s1[0];

          $from=$s[1].','.$s[2];
          $to=$s1[1].','.$s1[2];
          $dis=getDistance($from,$to);



          /*$from=$s[3];
          $to=$s1[3];
          $dis=getDistance($from,$to,true);
          */


          echo $f_station.' - '.$t_station.' : '.$dis;

          echo '</br>';

        }


    }
    exit;
  echo '</br>';
    echo '</br>';
      echo '</br>';


}



 function getDistance($from,$to,$encode=false)
   {
     if($encode)
      $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?&origins='.urlencode($from).'&destinations='.urlencode($to).'&mode=transit&transit_mode=train|tram|subway&key=AIzaSyBmrijc-Q6yyePbvSsjArPzZHhSJNX8sa0';
      else
        $url = 'https://maps.googleapis.com/maps/api/distancematrix/json?&origins='.$from.'&destinations='.$to.'&mode=transit&transit_mode=train|tram|subway&key=AIzaSyBmrijc-Q6yyePbvSsjArPzZHhSJNX8sa0';
       $result = file_get_contents($url);
       $distance = json_decode($result);

       $distanceTraveled=0;

           //Transvers to get distance...
           foreach ($distance->rows as $key => $j)
           {
               foreach ($j->elements as $key => $k)
               {
                //   if(isset($k->fare))
                //   {
                  //   $distanceTraveled = $k->distance->value;

                  // }
              }
           }

           $d=$distance->rows[0]->elements[0]->distance->text;
           $du=$distance->rows[0]->elements[0]->duration->text;
           $f=$distance->rows[0]->elements[0]->fare->text;

           return $d.' - '.$du.' - '.$f;


   }


?>
