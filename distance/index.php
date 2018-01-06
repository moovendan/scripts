<?php
require(__DIR__ . '/vendor/autoload.php');
use RFHaversini\Distance;
echo $inKilometers = Distance::toKilometers(12.876211,77.595727, 12.934206, 77.611543);
?>


