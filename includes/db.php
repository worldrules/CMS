<?php

$db['db_host'] = "mysql:host=us-cdbr-iron-east-04.cleardb.net";
$db['db_user'] = "bb4d3eb9810e2e";
$db['db_pass'] = "ca1732ea";
$db['db_name'] = "cms";


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

