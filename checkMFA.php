<?php
//create 2fa   
//if go wrong -> send error and come back to login.php
//if go true -> show private page
    session_start();
    $user_id=$_SESSION['user_id'];
    //print_r($_SESSION);
    if($_SESSION['guest']){
      header("location: login.php");
    }
    else{
        require "Authenticator.php";


        $Authenticator = new Authenticator();
        if (!isset($_SESSION['auth_secret'])) {
            $secret = $Authenticator->generateRandomSecret();
            $_SESSION['auth_secret'] = $secret;
        }


        $qrCodeUrl = $Authenticator->getQR('SDH
        LAB8', $_SESSION['auth_secret']);


        if (!isset($_SESSION['failed'])) {
            $_SESSION['failed'] = false;
        }
    }
    
    /*
    if($_SESSION['guest']){
      header("location: login.php");
    }
    else{
        
        $conn = new PDO("sqlite:".getenv('DB_DATABASE'));
        $q = $conn->query("SELECT * FROM users_lab7 where id=$user_id");
        $user = $q->fetchAll(PDO::FETCH_ASSOC);
    }

*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Time-Based Authentication like Google Authenticator</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <meta name="description" content="Implement Google like Time-Based Authentication into your existing PHP application. And learn How to Build it? How it Works? and Why is it Necessary these days."/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3"  style="background-color: ##6EB3DF; padding: 20px; margin-top: 5%;">
                <h1>Multi Factor Authentication</h1>
                <p style="text-align:center;">Open Google Authenticator on your device and scan this QR Code<br><b>ATTENTION! </b>If you wrong the code you must log in again!</p>
                <hr>
                <form action="private.php" method="post">
                    <div style="text-align: center;">
                            <?php if ($_SESSION['failed']): ?>
                            <div class="alert alert-danger" role="alert">
                                        <strong>Oh no!</strong> You have insert an invalid code. <br> Scan Again
                            </div>
                            <?php   
                                $_SESSION['failed'] = false;
                            ?>
                            <?php endif ?>
                            <input type="text" name="id_user" id="id_user" style="display:none;" value="<?php echo $user_id; ?>">
                            <img style="text-align: center;;" class="img-fluid" src="<?php   echo $qrCodeUrl ?>" alt="Verify this Google Authenticator"><br><br>        
                            <input type="text" class="form-control" name="code" placeholder="******" style="font-size: xx-large;width: 200px;border-radius: 0px;text-align: center;display: inline;color: #0275d8;"><br> <br>    
                            <button type="submit" class="btn btn-md btn-primary" style="width: 200px;border-radius: 0px;">Verify</button>

                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>