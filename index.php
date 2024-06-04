<?php

//echo 'hello';
//echo '<pre>';
//print_r($_SERVER);
//echo '</pre>';
//echo $_SERVER['REDIRECT_PATH_INFO'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

define('BP',__DIR__ . DIRECTORY_SEPARATOR);
define('BP_NOGOMETNIKLUBOVI', BP . 'nogometniklubovi' . DIRECTORY_SEPARATOR);
//echo BP, '<br />';
//echo BP_Nogometniklubovi, '<br />';

$zaAutoload = [
    BP_NOGOMETNIKLUBOVI . 'controller',
    BP_NOGOMETNIKLUBOVI . 'model',
    BP_NOGOMETNIKLUBOVI . 'core'
];

$putanje = implode(PATH_SEPARATOR,$zaAutoload);

set_include_path($putanje);

//echo $putanje , '<br />';

spl_autoload_register(function($klasa){
   //echo 'U spl_autoload_register funkciji sam, tražim klasu ' . $klasa , '<br />'; 
   $putanje = explode(PATH_SEPARATOR,get_include_path());
    foreach($putanje as $p){
        //echo $p, '<br />';
        $datoteka = $p . DIRECTORY_SEPARATOR . $klasa . '.php';
        //echo $datoteka, '<br />';
        if(file_exists($datoteka)){
            require_once $datoteka;
            break;
        }
    }
});

Nogometniklubovi::start();

//require  BP_nogometniklubovi . 'controller/KlubController.php';
//$c = new SmjerController(); //ovdje se okida poziv funkcija spl_autoload_register
//$c->index();