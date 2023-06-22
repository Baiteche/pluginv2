
<?php
session_start();

// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'gym';
// Try and connect using the info above.
$conn = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

$user_password = '';
if (isset($_POST['username'])) {
   
    $password = $_POST['password'];
    $username = $_POST['username'];
  
    $query = "SELECT * from admin WHERE username = '$username'";
    $user = mysqli_query($conn, $query);
  
    if (!$user) {
      die('query Failed' . mysqli_error($conn));
    }
  
    while ($row = mysqli_fetch_array($user)) {
  
      
      $user_name = $row['username'];
     
      $user_password = $row['password'];
    }
    
        $host = $_SERVER['HTTP_HOST'];
        $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $location = "http://$host/plugin/admin/dashboard/calendrier/index.php";
        $goback= "http://$host/plugin/admin/";

    if(password_verify($password , $user_password)){
        echo 'success';
        $_SESSION['loggedin']=true;
        header("Location: $location");
        exit;
    }else{
      $_SESSION['loggedin']=false;
      echo '<script>';
      echo 'setTimeout(function() {';
      echo '    document.getElementById("incorrect").innerText = "incorrect password and/or username ";';
      echo '}, 0);';
      echo '</script>';     
      
    }
    
  }
  ?>

<!doctype html>
<html lang="fr">
  

<head>
  <title>Admin login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   <link rel="stylesheet" href="./style.css//login-style.css">
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main class="d-flex flex-column justify-content-center h-100 ">
    


<!-- Login form -->

<section class="mx-auto d-flex flex-column w-50  justify-content-center">
<h1 class="mx-auto text-align-center text-light">Login</h1>
<form autocomplete="off" class="d-flex flex-column mx-auto justify-content-center mb-4  col-12 " action="" method="POST">
  
    <label class="mx-auto" for="username">Nom d'utilisateur</label>
    <input class="col-12 col-md-6 mx-auto mb-3" type="text" name="username" placeholder=" Username" required >
    <label class="mx-auto "  for="password">Mot de passe</label>
    <input class="col-12 col-md-6 mx-auto mb-3" type="password" name="password" id="password" placeholder=" Password" required>
    <div class="mx-auto col-md-6 col-12 d-flex" >
      <input type="checkbox" class="ml-2 col-1 mx-auto" onclick="pass()"><h6 class="show">Montrer le mot de passe</h6>
    </div>
     <p id="incorrect" class="mx-auto text-center text-bg-danger col-8"></p>
    <input id="submit-button" class="btn btn-lg mt-3 col-12 col-md-6 mx-auto" type="submit" name="login" value="Login">
</form>
</section>


  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
   <script src="./dashboard/calendrier/js/password-toggle.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
 
</body>

</html>
