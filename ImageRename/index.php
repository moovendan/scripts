<?php

$foo = 'bar';

echo '$foo\'' . "$foo\'";

exit;
	$x = scandir("images/");
	$dest="images_new/";
	$copied=array();
	$error=array();

	 $total=sizeof($x);

	 //echo '<pre>';
	 //print_r($x);

	for($i = 0; $i <$total ; $i++) {

 
		if($x[$i]=='.' || $x[$i]=='..' || $x[$i]=='.DS_Store')
		{
			$error[]=$x[$i];
			continue;
		}
		 
		$filename = explode("_", $x[$i]);
		$ext = explode(".", $filename[1]);
		if (!(strcmp($ext[1], "php") == 0))
		{
			$newfile=$dest.ucfirst($filename[0]).".".$ext[1];
			$old_file="images/".$x[$i];

			if (!copy($old_file, $newfile)) {
     				$error[]=$x[$i];
				}
				else
				{
					$copied[]=$x[$i];

				}
 		}
	}

	echo 'Total:-'.$total;
	echo '</br>';
	echo 'success:-'.count($copied);
	echo '</br>';
	echo 'failed:-'.count($error);
	echo '<pre>';
	print_r($error);
	
?>