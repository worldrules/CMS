<?php
/**
 * Created by PhpStorm.
 * User: Leonardo
 * Date: 15/05/2018
 * Time: 19:40
 */
include "db.php";
include "../admin/functions.php";
session_start();
?>


<?php

        if(isset($_POST['login'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];

        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $query = "SELECT * FROM users WHERE username = '{$username}' ";
        $select_user_query = mysqli_query($con, $query);

        testQuery($select_user_query);


        while ($row = mysqli_fetch_array($select_user_query)) {

            $db_id = $row['user_id'];
            $db_username = $row['username'];
            $db_user_password = $row['user_password'];
            $db_user_firstname = $row['user_firstname'];
            $db_user_lastname = $row['user_lastname'];
            $db_user_role = $row['user_role'];
        }

        //$password = crypt($password, $db_user_password);



   // if($username === $db_username && $password === $db_user_password)
      if (password_verify($password, $db_user_password)) {

        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;

        header("Location:../admin");

    } else {

        header("Location:../index.php");

    }

}






?>
