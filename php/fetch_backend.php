<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "sdh_lab4";

$connessione = new mysqli($host, $user, $password, $db);

if ($connessione == false) {
    die("Error connection: " . $connessione->connect_error);
}

$db = $connessione;
$tableName = "login_logs";
$columns = ['ID', 'username', 'md5_pwd', 'last_access', 'type_log'];
$fetchData = fetch_data($db, $tableName, $columns);

function fetch_data($db, $tableName, $columns)
{
    if (empty($db)) {
        $msg = "Database connection error";
    } elseif (empty($columns) || !is_array($columns)) {
        $msg = "columns Name must be defined in an indexed array";
    } elseif (empty($tableName)) {
        $msg = "Table Name is empty";
    } else {
        $columnName = implode(", ", $columns);
        $query = "SELECT " . $columnName . " FROM $tableName" . " ORDER BY id DESC";
        $result = $db->query($query);
        if ($result == true) {
            if ($result->num_rows > 0) {
                $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                $msg = $row;
            } else {
                $msg = "No Data Found";
            }
        } else {
            $msg = mysqli_error($db);
        }
    }
    return $msg;
}
