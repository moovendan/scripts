<?php

require 'vendor/autoload.php';

use \Kassner\LogParser\LogParser;


//$parser = new LogParser($format);

$lines = file('PHP-Log_2016-11-17_065823_2016-11-18_065823.log', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$errors=[];


foreach ($lines as $line) {
    //$entry = $parser->parse($line);

    preg_match('([0-9 -:]+)', $line,$mathces);

    $line=str_replace($mathces[0],'',$line);
    $line=str_replace('[]','',$line);

if(!in_array($line,$errors))
{
$errors[]=$line;


/*if(count($errors)>2)
{
echo $line;

print_r($line);
exit;
}*/
}



  //  $pattern='/^[0-9-: ]+$/';

//preg_match($pattern, $line, $matches);

//print_r($matches);

//exit;
    //var_dump($line);
    //exit;
}

echo '<pre>';
print_r($errors);



?>
