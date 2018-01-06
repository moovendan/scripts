<?php

require 'vendor/autoload.php';

use League\Csv\Writer;
use League\Csv\Reader;


use Goodby\CSV\Export\Standard\Exporter;
use Goodby\CSV\Export\Standard\ExporterConfig;

$inputCsv = Reader::createFromPath('rejects.csv');
$inputCsv->setDelimiter(';');
//get the header
//$headers = $inputCsv->fetchOne(0);
//get at maximum 25 rows starting from the 801th row
$res = $inputCsv->fetch();

$mandrill_rejects=array();

$pattern = '/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i';


 foreach ($res as $k => $row) {

   if($k>0 )
   {

   preg_match_all($pattern,$row[0],$matches);

   if(isset($matches[0][0]))
     $mandrill_rejects[]=strtolower($row[0]);
   }
 }




 $inputCsv = Reader::createFromPath('mindtree-users.csv');
 $inputCsv->setDelimiter(';');

 $res = $inputCsv->fetch();

 $final=array();


  foreach ($res as $k => $row) {

    if($k>0 )
    {

     in_array($row[3],$mandrill_rejects)

      //$final[]=

    }
  }





for($i=0;$i<100;$i++)
{

  $diff_users_upload[]=array('moo'.$i,'last'.$i,'moo+'.$i.'@zoojoo.be');

}


$config = new ExporterConfig();
$exporter = new Exporter($config);


$exporter->export('dummy_users.csv', $diff_users_upload);




?>
