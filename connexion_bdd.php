<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    $db_username = 'phpuser';
    $db_password = 'php';
    $db_name     = 'mangaia';
    $db_host     = '127.0.0.1';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    ?>