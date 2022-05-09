<?php 

    $conn = new PDO("sqlite:".getenv('DB_DATABASE'));
    //$conn->exec("DROP TABLE users_lab9");
    /*
    $conn->exec("CREATE TABLE IF NOT EXISTS users_lab9
                (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                name TEXT, surname TEXT, email TEXT, role TEXT, pwd TEXT)");
            
    $password = password_hash('professor', PASSWORD_DEFAULT);
    $conn->exec("INSERT INTO users_lab9 (name, surname, email, role, pwd)
                VALUES ('giada', 'zuccolo', 'giadaz@email.com', 'professor', '$password');");
    $password = password_hash('student', PASSWORD_DEFAULT);
    $conn->exec("INSERT INTO users_lab9 (name, surname, email, role, pwd)
                VALUES ('john', 'smith', 'john@email.com', 'student', '$password');");
    $conn->exec("INSERT INTO users_lab9 (name, surname, email, role, pwd)
                VALUES ('perry', 'white', 'white@email.com', 'student', '$password');");

    $q2 = $conn->query("SELECT * FROM users_lab9");
    print_r($q2->fetchAll(PDO::FETCH_ASSOC));
    */
?>