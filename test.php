<?php

require "vendor/autoload.php";

$smarty = new Smarty();
$smarty->assign('test', 123);
$smarty->display('index.tpl');