<html>
<?php 
    session_start();
    $_SESSION["guest"] = true;
    $_SESSION["login"] = false;
    
    if(!empty($_POST) && !empty($_POST['email'])){
        $conn = new PDO("sqlite:".getenv('DB_DATABASE'));
        $q = $conn->query("SELECT * FROM users_lab9 where email=:email");
        $q->execute([':email'=>$_REQUEST['email']]);

        $user = $q->fetchAll(PDO::FETCH_ASSOC);
        print_r($user);
        if(!empty($user[0])){
            if(password_verify($_REQUEST['password'], $user[0]['pwd'])){
                $_SESSION['login']=true;
                $_SESSION['guest']=false;
                $_SESSION['user_id']=$user[0]['id'];
                $_SESSION['role']=$user[0]['role'];
                header("location: checkrole.php");
            }
            else{
                echo "<h2 style='margin-top:4%;color:red;text-align:center;'> Invalid credential </h2>";
            }
        }
        else{
            echo "<h2 style='margin-top:4%;color:red;text-align:center;'> Invalid credential </h2>";
        }
    }
?>
<head>
    <title>SDH LAB 9</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="content">
    <div class="container mt-3">
      <h2>Sign in to login</h2>
      <form action="https://l92cx.ciroue.com/login.php" method="POST">
          <div class="login">
              <label>Email:</label>
                <input type="text" name="email" id="email" required placeholder="Email address">
              <label>Password:</label>
                <input type="password" name="password" id="password" required placeholder="Password">                  
          <div class="mt-3">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
          </div>
      </form>
    </div>
</div>
<div class="header">
        <h1>Secure Digital Healthcare - Lab. 9</h1>
        <h3>Zuccolo Giada, matr. 2055702</h3>
</div>
</body>
</html>