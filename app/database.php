<?php

return function(){
    $charset = "utf8mb4";

    // parse .properties file
    if (!$settings = parse_ini_file('db.properties', TRUE)) throw new exception('Unable to open db.properties');

    // get database credentials
    $dns = $settings['database']['driver'] .
        ':host=' . $settings['database']['host'] .
        ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '') .
        ';dbname=' . $settings['database']['db_name'] .';charset='.$charset;
    
    $username = $settings['database']['username'];
    $password = $settings['database']['password'];

    // $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    $connection = new PDO($dns,$username, $password);
    $connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $connection->setAttribute(PDO::ATTR_STRINGIFY_FETCHES, false);
    return $connection;
};