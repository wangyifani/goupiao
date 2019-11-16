<?php
      require "../public/config.php";
      session_start();
      $m=isset($_GET['m'])?ucfirst($_GET['m']):'Index';
      $a=isset($_GET['a'])?$_GET['a']:'index';
      $m.='Control';
      // var_dump($_SESSION['admin']);
      if (!isset($_SESSION['admin'])) {
            // var_dump($a);
            if ($m != 'index' && $a != 'login' && $a != 'dologin') {
                  header("location:index.php?m=index&a=login");
                  die();
            }
      }
      function __autoload($className){

            if(file_exists('./Control/'.$className.'.class.php')){

                  require('./Control/'.$className.'.class.php');

            }else if(file_exists('./Model/'.$className.'.class.php')){

                  require('./Model/'.$className.'.class.php');

            }else if(file_exists('./Args/'.$className.'.class.php')){

                  require('./Args/'.$className.'.class.php');

            }else if(file_exists('../Public/'.$className.'.class.php')){

                  require('../Public/'.$className.'.class.php');

            }else{
                  header('location:./view/errors_404.html');
            }

      }
      //echo './home/control/'.$className.'.class.php';

      $res=new $m;
	$res->$a();
