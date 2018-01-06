<?php
require 'vendor/autoload.php';

use League\Csv\Writer;
use League\Csv\Reader;

$filename='RGE_Mindfulness_Journey - Category 1.csv';

$inputCsv = Reader::createFromPath($filename);
$inputCsv->setDelimiter(',');

$res = $inputCsv->fetch();

foreach($res as $k=>$r)
{

  if($k==0)
  continue;


 if($r[7]!='')
 {

  $task1_img_tile=$r[3];

  $task_i_img=$r[7];


  $tmp = explode('.', $task_i_img);
  $ext = end($tmp);

  $userImage = $task1_img_tile.".".$ext;

  $thumb_file = 'Task1/' . $userImage;

  if(!file_exists($thumb_file))
  {

  $content = file_get_contents($task_i_img);


  if ($http_response_header != NULL) {
    file_put_contents($thumb_file, $content);
    }

  }
 }

 if($r[10]!='')
 {

   $task2_img_tile=$r[8];

   $task_2_img=$r[10];

   $tmp = explode('.', $task_2_img);
  $ext = end($tmp);

   $userImage = $task2_img_tile.".".$ext;

   $thumb_file = 'Task2/' . $userImage;

   if(!file_exists($thumb_file))
   {

   $content = file_get_contents($task_2_img);



   if ($http_response_header != NULL) {

     file_put_contents($thumb_file, $content);
  }
}



 }


 if($r[11]!='')
 {


   $task2_img_tile=$r[8];

   $task_2_img=$r[11];

   $tmp = explode('.', $task_2_img);
  $ext = end($tmp);

   $userImage = $task2_img_tile.".".$ext;

      $thumb_file = 'Task2/Assets/' . $userImage;

      if(!file_exists($thumb_file))
      {

   $content = file_get_contents($task_2_img);



   if ($http_response_header != NULL) {

     file_put_contents($thumb_file, $content);
  }
}


 }


}


?>
