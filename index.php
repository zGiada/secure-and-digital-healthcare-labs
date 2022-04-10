<?php
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
header('Access-Control-Allow-Headers: Content-Type, content-type');

//securely insert and select data
if(!empty($_REQUEST)){ 
    //check correct img
    if(!empty($_FILES)){
        $file_info = print_r($_FILES['filename'], true);
        $allowdExt = ['jpg', 'jpeg', 'png', 'pdf'];
        
        $nameFile = $_FILES['filename']['name'];
        $ext = strtolower(end(explode('.', $nameFile)));
        
        if(in_array($ext,$allowdExt)){
            //upload img
            $filename = substr(str_shuffle(MD5(microtime())), 0, 10);
            $uploadedPath = getcwd().'/uploads/'.$filename.'.'.$ext;
            $img = $_FILES['filename']['tmp_name'];
            move_uploaded_file($img, $uploadedPath);

            //insert user in db
            $conn = new PDO("sqlite:".getenv('DB_DATABASE'));

            //create table (if not exist)
            $conn->exec("CREATE TABLE IF NOT EXISTS users_upload
                        (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        username TEXT, pwd TEXT, img TEXT)");
            //insert data
            $username = trim(stripslashes(htmlspecialchars($_REQUEST['username'])));
            $pw = MD5(trim(stripslashes(htmlspecialchars($_REQUEST['pwd']))));
            
            $conn->exec("INSERT INTO users_upload (username, pwd, img)
                VALUES ('$username', '$pw', '$img');");
            
            //select and print data
            $q = $conn->query("SELECT * FROM users_upload where username='".$username."'");
            $q = $conn->prepare("SELECT * FROM users_upload where username=:username");
            $q->execute([':username' => $_REQUEST['username']]);    
            $select_username = print_r($q->fetchAll(PDO::FETCH_ASSOC), true);
            
            $q2 = $conn->query("SELECT * FROM users_upload");
            $select_db = print_r($q2->fetchAll(PDO::FETCH_ASSOC), true);

            // IF I would save the logs
            /*
            $log_file = 'log.txt';
            $handler = fopen($log_file, 'a+');
            $var_write_log = "REQUEST #".count(file($log_file))." => ".print_r($_REQUEST, true)." ";
            $content = "".$var_write_log." username => ".$select_username." db => ".$select_db." ";
            echo $content;
            fwrite($handler, $content);
            fclose($handler);
            */
            header("Location: confirmUpload.html");
        }
        else{
            header("Location: errorpage.html");
        }
    }
    else{
        header("Location: errorpage.html");
    }

    
}
print_r(file_get_contents('php://input'))
?>