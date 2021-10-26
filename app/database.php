<?php

return function(){
    $host = "";
    $dbname = "";
    $charset = "utf8mb4";
    $username = "";
    $password = "";
    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    return new PDO($dsn,$username, $password);
};