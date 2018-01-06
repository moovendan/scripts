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

$filename='sapientAddition-Table 1.csv';

$inputCsv = Reader::createFromPath($filename);
$inputCsv->setDelimiter(',');
//get the header
//$headers = $inputCsv->fetchOne(0);
//get at maximum 25 rows starting from the 801th row
$res = $inputCsv->fetch();

$mandrill_rejects=array();

$pattern = '/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i';

$csv_headers=array('FName','LName','Email');

$formated_users=array();

//$domains=['mphasis.com'];

$domains=[];

$email_column=0;

$fname_column=1;

$lname_column=3;

$location=0;

$age=0;

if($location>0)
{
  $csv_headers[]='Location';
}

if($age>0)
{
  $csv_headers[]='Age';
}


 foreach ($res as $k => $row) {

      $user=[];


      if($k>0 )
      {

      if($fname_column == $lname_column  && isset($row[$fname_column]))
      {
         $t=doSplitName($row[$fname_column]);

     /*   $user[0]=ucfirst(strtolower(str_ireplace("'",'',$t['first'])));
        $user[1]=ucfirst(strtolower(str_ireplace("'",'',$t['last'])));

        $user[0]=str_ireplace('"','',$user[0]);
        $user[1]=str_ireplace('"','',$user[1]);*/

        $user[0]=format_name($t['first']);
        $user[1]=format_name($t['last']);

      }
      else {
      /*$user[0]=str_ireplace("'",'',ucfirst(strtolower($row[$fname_column])));
      $user[1]=str_ireplace("'",'',ucfirst(strtolower($row[$lname_column])));
      $user[0]=str_ireplace('"','',$user[0]);
      $user[1]=str_ireplace('"','',$user[1]);*/

        $user[0]=format_name($row[$fname_column]);
        $user[1]=format_name($row[$lname_column]);
      }


    preg_match_all($pattern,$row[$email_column],$matches);
    if(isset($matches[0][0]))
    {
    $user[2]=trim(strtolower($row[$email_column]));


        $domain_name = substr(strrchr($user[2], "@"), 1);

       /* if(!in_array($domain_name,$domains))
        {
            $domains[]=$domain_name;
        } */
        
        if(!array_key_exists($domain_name,$domains))
        {

           $domains[$domain_name]=1;

        }
        else
          $domains[$domain_name]++;




      if($location>0)
      {
        $user[3]=$row[$location];
      }

      if($age>0)
      {
          $t_age=(int)$row[$age];

          if($t_age>0 || $t_age==$row[$age])
            $user[4]=$t_age;
      }


      $formated_users[]=$user;

      /*if($k==6)
      {
      print_r($user);
      exit;
    }*/



    }
      }


 }



 if(count($formated_users)>2500)
 {

  $new_array= array_chunk($formated_users, 2500);

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

echo '<pre>';

print_r($domains);



echo "Domains :".implode(",",array_keys($domains));


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

function format_name($name)
{
  $name=ucfirst(strtolower(str_ireplace("'",'',$name)));
  $name=str_ireplace('"','',$name);

  return preg_replace('/[^A-Za-z0-9\-] /', '', $name);

}

?>
