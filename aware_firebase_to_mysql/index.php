<?php
require __DIR__ . '/vendor/autoload.php';

use Webmozart\Json\JsonDecoder;

$decoder = new JsonDecoder();


// Read JSON file
$data = $decoder->decodeFile('backup_dec3.json');

foreach ($data->users as $key => $user) {
  var_dump($user);exit;
}
var_dump($data);

 ?>
