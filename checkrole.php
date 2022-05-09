<html>
<?php
    session_start();
    require  __DIR__.'/vendor/autoload.php';

    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    $user_id=$_SESSION['user_id'];
    $user_role=$_SESSION['role'];
    if($_SESSION['guest']){
      header("location: login.php");
    }
    else{
        if($user_role=="professor"){
            $issuedAt = new DateTimeImmutable();
            $expire = $issuedAt->modify('+3 minutes')->getTimestamp();
            $serverName = "alexgr.ro";
            $username = "username";


            $payload = [
                'iat' => $issuedAt->getTimestamp(),
                'iss' => $serverName,
                'nbf' => $issuedAt->getTimestamp(),
                'exp' => $expire,
                'userName' => $username,
                'sub' => 'user_id',
                'role' => 'admin',
                'permission' => '',
                'scopes' => 'read:gdrive, write:gdrive'
            ];

            $privateKey = file_get_contents('private.key');
            $publicKey = file_get_contents('public.key');

            $jwt = JWT::encode($payload, $privateKey, 'RS256');                         
        }
        else{
            $jwt = "null";
        }
    }
?>
<head>
</head>
<body>
<p style="display:none;" id="tok"><?php echo $jwt; ?> </p>

<script>
    var tk = document.getElementById('tok').innerHTML;
    localStorage.setItem("token", tk);
    window.location.href="private.php";
</script>
</body>
</html>