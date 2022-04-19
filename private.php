<html>
<?php
    session_start();
    //print_r($_SESSION);

    $user_id=$_SESSION['user_id'];
    
    if($_SESSION['guest']){
      header("location: login.php");
    }
    else{
        $conn = new PDO("sqlite:".getenv('DB_DATABASE'));
        $q = $conn->query("SELECT * FROM users_lab7 where id=$user_id");
        $user = $q->fetchAll(PDO::FETCH_ASSOC);
    }
?>

<head>
<title>Login page</title>
</head>
<body>
<script src="https://cdn.tailwindcss.com"></script>

<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Workflow">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">WELCOME <?php echo $user[0]['email']; ?></h2>
      <p>Refresh the page to log in again </p>
    </div>
  </div>
</div>
</body>
</html>