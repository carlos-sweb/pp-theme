<?php
require __DIR__."/vendor/autoload.php";
$f3 = \Base::instance();
$f3->config($f3->get("ROOT")."/wp-content/themes/pp-theme/config.ini",true);
$f3->config($f3->get("ROOT")."/wp-content/themes/pp-theme/routes.ini");
$f3->run();
?>