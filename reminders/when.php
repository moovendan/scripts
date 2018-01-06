<?php
require(__DIR__ . '/vendor/autoload.php');

use When\When;
use Carbon\Carbon;

$r = new When();


$start_date=new Carbon('2017-07-02 13:05:00','UTC');



//echo $start_date->toDayDateTimeString();exit;

$r->startDate(new DateTime('2017-06-25 13:05:00',new DateTimeZone('UTC')))
                    ->freq("weekly")
                    ->byday('su');

$carbon_today=new Carbon('now','UTC');

$month_start=$carbon_today->startOfMonth()->toDateTimeString();

$month_end=$carbon_today->endOfMonth()->toDateTimeString();



$result=$r->getOccurrencesBetween(new DateTime($carbon_today->startOfMonth()->toDateTimeString()),new DateTime($carbon_today->endOfMonth()->toDateTimeString()));
echo '<pre>';
print_r($result);


exit;



/*$r = new When();
$r->startDate(new DateTime("20160616T143900"))
  ->rrule("FREQ=WEEKLY;BYDAY=TH,FR,MO,TU,WE;FREQ=MINUTELY;INTERVAL=60;COUNT=20")
  ->generateOccurrences();


echo '<pre>';
print_r($r->occurrences);*/


$r = new When();
       $r->startDate(new DateTime("20160831T090000"))
         ->rrule("FREQ=WEEKLY");

       $result = $r->getOccurrencesBetween(new DateTime("20160901T090000"), new DateTime("20160930T090000"));

    //   print_r($result);



// friday the 13th for the next 5 occurrences
$r = new When();
$r->startDate(new DateTime("20160831T090000",new DateTimeZone('UTC')))
  ->freq("weekly")
  ->byday("we");

$result=  $r->getNextOccurrence(new DateTime("20160902T090000"),TRUE);

$rem_carbon=new Carbon($result->format('Y-m-d H:i:s'));

echo $rem_carbon->format('H:i A | F d, Y');


echo $result->date;

echo '<pre>';
print_r($result);

exit;

$days_array=array(0=>array('constant'=>'SUNDAY','short'=>"SU"),
                  1=>array('constant'=>'MONDAY','short'=>"MO"),
                  2=>array('constant'=>'TUESDAY','short'=>"TU"),
                  3=>array('constant'=>'WEDNESDAY','short'=>"WE"),
                  4=>array('constant'=>'THURSDAY','short'=>"TH"),
                  5=>array('constant'=>'FRIDAY','short'=>"FR"),
                  6=>array('constant'=>'SATURDAY','short'=>"SA"));

/*

Generate reminders
$days=[0,2,5];
$time='12:00';

$reminders=array();
foreach ($days as $d) {

    $dt = Carbon::now();
    $dt->timezone = new DateTimeZone('Asia/Kolkata');
    if($dt->dayOfWeek!=$d)
    $dt->next($d);
    $dt->setTimeFromTimeString($time);
    $dt->timezone = new DateTimeZone('UTC');
    $reminder['start_date']=$dt->toDateString();
    $reminder['event_time']=$dt->toTimeString();
    $reminder['repeat_weekday']=$dt->toTimeString();
    $reminders[]=$reminder;

}
print_r($reminders);
exit;

*/


$dt = Carbon::now();
$dt->timezone = new DateTimeZone('Asia/Kolkata');
$dt->next(Carbon::TUESDAY);
//$dt->timezone = new DateTimeZone('UTC');
echo $dt->toDayDateTimeString();exit;



?>
