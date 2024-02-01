<?php
require __DIR__."/vendor/autoload.php";
$f3 = \Base::instance();
$f3->config($f3->get("ROOT")."/wp-content/themes/pp-theme/config.ini",true);
$request_uri = str_replace("?".$_SERVER["QUERY_STRING"],"",$_SERVER["REQUEST_URI"]);
$f3->route( $_SERVER["REQUEST_METHOD"]." ".$request_uri,"ppTheme->home");
$f3->run();
?>