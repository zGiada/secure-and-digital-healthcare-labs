<html>

<?php

    session_start();
    $user_id=$_SESSION['user_id'];
    $user_role=$_SESSION['role'];
    if($_SESSION['guest']){
      header("location: login.php");
    }
    else{ 
        $conn = new PDO("sqlite:".getenv('DB_DATABASE'));
        $q = $conn->query("SELECT * FROM users_lab9 where id=$user_id");
        $user = $q->fetchAll(PDO::FETCH_ASSOC);
    }

?>

<head>
<title>Personal page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body onload="checkToken()">

<script>
  function checkToken(){
    window.localStorage.setItem("check", "null ");
    let checkT = window.localStorage.getItem('token');
    let checkC = window.localStorage.getItem('check');
    if(checkT==checkC){
      document.getElementById("role").innerHTML = "Student of the SDH course";
    }
    else{
      document.getElementById("role").innerHTML = "Professor of the SDH course";
    }
  }
  function logout(){
    window.location.href="login.php";
  }

</script>

<div class="content">
    <div class="container mt-3">
      <h2>WELCOME!</h2>
          <div class="login">
             <p><b>PERSONAL DATA:</b> 
            <dl>
              <dt>NAME</dt>
              <dd><?php echo $user[0]['name']; ?></dd>
              <dt>SURNAME</dt>
              <dd><?php echo $user[0]['surname']; ?></dd>
              <dt>EMAIL</dt>
              <dd><?php echo $user[0]['email']; ?></dd>
              <dt>ROLE</dt>
              <dd id="role"></dd>
            </dl>
            <button onclick="logout();" class="logout">Log out</button>
        </div>
    </div>

</div>


















</body>
</html>