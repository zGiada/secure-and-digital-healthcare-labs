<?php 

    $conn = new PDO("sqlite:".getenv('DB_DATABASE'));
    //$conn->exec("DROP TABLE users_lab7");
    /*
    $conn->exec("CREATE TABLE IF NOT EXISTS users_lab8
                (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                email TEXT, pwd TEXT)");
            
    $password = password_hash('secret', PASSWORD_DEFAULT);
    $conn->exec("INSERT INTO users_lab8 (email, pwd)
                VALUES ('giadazuccolo@gmail.com', '$password');");
    */
    //$q2 = $conn->query("SELECT * FROM users_lab7");
    //print_r($q2->fetchAll(PDO::FETCH_ASSOC));
?>