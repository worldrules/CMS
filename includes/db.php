<?php
ob_start();
$db['db_host'] = "us-cdbr-iron-east-04.cleardb.net";
$db['db_user'] = "b27ea381e26bf4";
$db['db_pass'] = "a7ffe6e3";
$db['db_name'] = "heroku_024874c22c7ed87";


foreach($db as $key => $value) {
    
    define(strtoupper($key), $value);
}


$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//if($connection) {
//  
//    echo "We are connected";
//} else {
//    
//    echo "error !";
//}

