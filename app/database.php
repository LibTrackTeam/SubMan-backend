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

    return new PDO($dns,$username, $password);
};