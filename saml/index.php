<?php

define("TOOLKIT_PATH", '/Users/moove/Sites/scripts/saml/vendor/onelogin/php-saml/');
require_once(TOOLKIT_PATH . '_toolkit_loader.php');
$auth = new OneLogin_Saml2_Auth(); // Constructor of the SP, loads settings.php
                                   // and advanced_settings.php
$auth->login();   // Method that sent the AuthNRequest

?>
