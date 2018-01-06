<?php

    // Database variables
$username = "root";
$password = "zoojoobe";
$hostname = "localhost";
$database = "scripts";

// Try to connect to database and set charset to UTF8
try {
    $dbConnect = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
    $dbConnect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

  //  $now = strtotime("yesterday");

    $pushToFirst = 0;
    for($i = $pushToFirst; $i < $pushToFirst+5; $i++)
    {
      //  $now = strtotime("+".$i." day");
        $now=strtotime('2016-08-10');
        $year = date("Y", $now);
        $month = date("m", $now);
        $day = date("d", $now);
        $nowString = $year . "-" . $month . "-" . $day;
        $week = (int) ((date('d', $now) - 1) / 7) + 1;
        $weekday = date("N", $now);

        echo $nowString . "<br />";
        echo $week . " " . $weekday . "<br />";



        $sql = "SELECT EV.*
                FROM `events` EV
                RIGHT JOIN `events_meta` EM1 ON EM1.`event_id` = EV.`id`
                WHERE ( DATEDIFF( '$nowString', repeat_start ) % repeat_interval = 0 )
                OR (
                    (repeat_year = $year OR repeat_year = '*' )
                    AND
                    (repeat_month = $month OR repeat_month = '*' )
                    AND
                    (repeat_day = $day OR repeat_day = '*' )
                    AND
                    (repeat_week = $week OR repeat_week = '*' )
                    AND
                    (repeat_weekday = $weekday OR repeat_weekday = '*' )
                    AND repeat_start <= DATE('$nowString')
                )";

        foreach ($dbConnect->query($sql) as $row) {
            print $row['ID'] . "\t";
            print $row['NAME'] . "<br />";
        }

        echo "<br /><br /><br />";
    }
?>
