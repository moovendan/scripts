<?php

require 'vendor/autoload.php';

use League\Csv\Writer;
use League\Csv\Reader;


use Goodby\CSV\Export\Standard\Exporter;
use Goodby\CSV\Export\Standard\ExporterConfig;

$inputCsv = Reader::createFromPath('Noida-Table 1.csv');
$inputCsv->setDelimiter(',');
//get the header
//$headers = $inputCsv->fetchOne(0);
//get at maximum 25 rows starting from the 801th row
$res = $inputCsv->fetch();

$mandrill_rejects=array();

$pattern = '/[a-z\d._%+-]+@[a-z\d.-]+\.[a-z]{2,4}\b/i';

$formated_users[]=array('FName','LName','Email');

$email_column=1;

$error_user=[];



 foreach ($res as $k => $row) {

      $user=[];





      if($k>0 )
      {
     preg_match_all($pattern,$row[$email_column],$matches);
    if(isset($matches[0][0]))
    {


      if(in_array(strtolower($row[$email_column]),$formated_users))
      {
          $error_user[]=array($row[$email_column],'Duplicate');

      }

      $user[2]=strtolower($row[$email_column]);
      $formated_users[]=$user;

    }
    else
    {
        $error_user[]=array($row[$email_column],'Invalidformat');

    }
      }


 }

echo '<pre>';
echo 'Total:-'.count($res);
echo '</br>';
echo 'valid:-'.count($formated_users);
echo '</br>';
echo 'Invalide:-'.count($error_user);
echo '</br>';

print_r($error_user);
exit;


$config = new ExporterConfig();
$exporter = new Exporter($config);


$exporter->export('user_upload_formated_wynk.csv', $formated_users);


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
