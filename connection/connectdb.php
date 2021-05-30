<?php
error_reporting(E_ALL);
//error_reporting(0);
$systemname = "line_checkname";
/*//on localhost
$hostfordb = 'localhost';
$usernamefordb = 'u876631174_checkname_pr';
$passwordfordb = '&+Q5Z6eD';
$dbnamefordb = 'u876631174_checkname_pr';*/
//90435abd399f5894ffe6b03ecc6eb685
//real use
$hostfordb = 'localhost:8889';
$usernamefordb = 'root';
$passwordfordb = 'root';
$dbnamefordb = 'physical_fitness';

date_default_timezone_set('Asia/Bangkok');
$connectdb = mysqli_connect($hostfordb,$usernamefordb,$passwordfordb,$dbnamefordb);
mysqli_set_charset($connectdb, "utf8");

if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    
?>