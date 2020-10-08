<?php

$server = "mysql:host=127.0.0.1:3308;dbname=phpsamples";
    $username = "root";
    $password = "";
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND =>"SET NAMES 'utf8';",
                    PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
    $cnx = new PDO($server,$username,$password,$options)
    ?>