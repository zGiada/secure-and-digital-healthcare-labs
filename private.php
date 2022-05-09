<html>
<?php
    session_start();
    //print_r($_SESSION);

    require "Authenticator.php";
    $user_id=$_POST['id_user'];
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        header("location: login.php");
        die();
    }

    $Authenticator = new Authenticator();

    $checkResult = $Authenticator->verifyCode($_SESSION['auth_secret'], $_POST['code'], 2);    // 2 = 2*30sec clock tolerance

    if (!$checkResult) {
        $_SESSION['failed'] = true;
        header("location: login.php");
        die();
    }

    if(empty($user_id)){
        echo $user_id;
        //header("location: login.php");
    }
    else{
        $conn = new PDO("sqlite:".getenv('DB_DATABASE'));
        $q = $conn->query("SELECT * FROM users_lab8 where id=$user_id");
        $user = $q->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<head>
    <title>SDH LAB 8</title>
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
      <h2 style="text-align:center"><b>WELCOME</b> <?php echo $user[0]['email']; ?></h2>
      <a href="login.php"><button type="submit" class="btn btn-primary" style="margin-left:50%">LOG OUT</button></a>
    </div>
</div>
<div class="header">
        <h1>Secure Digital Healthcare - Lab. 8</h1>
        <h3>Zuccolo Giada, matr. 2055702</h3>
</div>
</body>
</html>