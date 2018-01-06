<?php
require __DIR__ . '/vendor/autoload.php';

set_time_limit(0);

use Curl\Curl;




 function habit_request($data,$method='')
    {

      $curl = new Curl();

        $request_url="http://54.169.88.191";

        if($method!='')
            $request_url.="/".$method;


        $curl->setHeader('Content-Type', 'application/json');
        $curl->post($request_url, $data);


        if ($curl->error) {
          //  log_message('Error', 'Calcuate habit score  - '.$curl->errorCode . ' :  ' .  $curl->errorMessage);
            echo '<pre>';
            print_r($data);
            echo 'Calcuate habit score  - '.$curl->errorCode . ' :  ' .  $curl->errorMessage;

            print_r($curl->requestHeaders);

              exit;

            return new stdClass();
         }
        else
        return $curl->response;

    }



    for($h=0;$i=$h<1000;$h++)
    {

      $habit_data=[];
      $habit_data['leftPeriod'] = 21;
      $habit_data['totalPeriodConsidered'] = 21;

      $days_observed=rand(20,100);

      $updates=[];

      for($i=0;$i<$days_observed;$i++)
      {

          $updates[]=rand(0,1);

      }

      $habit_data['activityDoneHistory'] = array_values($updates);


      $start = microtime(true);

      $a = habit_request($habit_data, 'active_habit');

      $time_elapsed_secs = microtime(true) - $start;

      echo "Request ".$h." ".$time_elapsed_secs." Response ".json_encode($a)."\n";


    //  echo $h."\n";

      //echo '<pre>';

      //print_r($a);

      //echo "\n\n";

    //  sleep(1);


    }





?>
