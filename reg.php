<?php
require "./lib/Smarty.class.php";
$tpl = new Smarty;
$tpl->setTemplateDir("./view");
$tpl->display('reg.html');
