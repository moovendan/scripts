<!DOCTYPE html>
<html>
<body>

<form action="" method="post" >
    Paste your template </br>

    <textarea cols="200" rows="50" name="template"></textarea> </br>
    <input type="submit" value="Upload Image" name="sub_template">
</form>

</body>
</html>
<?php

if(isset($_POST["sub_template"])) {


	$string = $_POST["template"];
$patterns = array();
$patterns[0] = '/=09=09=09/';
$patterns[1] = '/=09=09/';
$patterns[2] = '/=09/';
$patterns[3] = '/=3D/';
$patterns[4] = '/=\r\n/';
$patterns[5] = '/=E2=82=B9/';
$patterns[6] = '/=C2=A9/';
$patterns[7] = '/=20/';
$patterns[8] = '/=E2=80=99/';



$replacements = array();
$replacements[0] = '';
$replacements[1] = '';
$replacements[2] = '';
$replacements[3] = '=';
$replacements[4] = '';
$replacements[5] = '&#8377;';
$replacements[6] = '&copy;';
$replacements[7] = '';
$replacements[8] = '';

$cleaned_up= preg_replace($patterns, $replacements, $string);

echo '<textarea name="cleaned_up" cols="200" rows="50">'.$cleaned_up.'</textarea>';

}
?>
