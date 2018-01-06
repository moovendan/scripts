<?php

require 'vendor/autoload.php';
/*
$age=80;

echo  (((int)($age/5))*5)+2;

if($age<60)
echo   ($age-($age%5))+2;
else
echo 62;
exit;

*/
use League\Csv\Writer;
use League\Csv\Reader;


use Goodby\CSV\Export\Standard\Exporter;
use Goodby\CSV\Export\Standard\ExporterConfig;

$filename='Spaient_oct_16_Deletion-Table 1.csv';

$inputCsv = Reader::createFromPath($filename);
$inputCsv->setDelimiter(',');
//get the header
//$headers = $inputCsv->fetchOne(0);
//get at maximum 25 rows starting from the 801th row
$res = $inputCsv->fetch();

$mandrill_rejects=array();

$pattern = '/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i';

$csv_headers=array('Email');

$formated_users=array();

//$domains=['mphasis.com'];

$domains=[];

$email_column=0;
  

 foreach ($res as $k => $row) {

      $user=[];





      if($k>0 )
      {


    preg_match_all($pattern,$row[$email_column],$matches);
    if(isset($matches[0][0]))
    {
    $user[0]=trim(strtolower($row[$email_column]));


        $domain_name = substr(strrchr($user[0], "@"), 1);

        if(!in_array($domain_name,$domains))
        {
            $domains[]=$domain_name;
        }




 


      $formated_users[]=$user;

      



    }
      }


 }



 if(count($formated_users)>3000)
 {

  $new_array= array_chunk($formated_users, 3000);

 }
 else
  $new_array[]=$formated_users;





$config = new ExporterConfig();
$config->setEnclosure("");
$exporter = new Exporter($config);

foreach ($new_array as $key => $value) {
  array_unshift($value, $csv_headers);


  $exporter->export($key.'_formated_'.$filename, $value);
}

echo "Domains :".implode(",",$domains);


/**
 * splits single name string into salutation, first, last, suffix
 *
 * @param string $name
 * @return array
 */
function doSplitName($name)
{
    $results = array();

    $r = explode(' ', $name);
    $size = count($r);

    //check first for period, assume salutation if so
    if (mb_strpos($r[0], '.') === false)
    {
        $results['salutation'] = '';
        $results['first'] = $r[0];
    }
    else
    {
        $results['salutation'] = $r[0];
        $results['first'] = $r[1];
    }

    //check last for period, assume suffix if so
    if (mb_strpos($r[$size - 1], '.') === false)
    {
        $results['suffix'] = '';
    }
    else
    {
        $results['suffix'] = $r[$size - 1];
    }

    //combine remains into last
    $start = ($results['salutation']) ? 2 : 1;
    $end = ($results['suffix']) ? $size - 2 : $size - 1;

    $last = '';
    for ($i = $start; $i <= $end; $i++)
    {
        $last .= ' '.$r[$i];
    }
    $results['last'] = trim($last);

    return $results;
}

?>
