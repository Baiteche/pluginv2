<?php 
$email=$_POST['email'];
$wai_message='
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./wait.css">
</head>

<body class="d-flex flex-colum justify-content-center">
  <header>
    <!-- place navbar here -->
  </header>
  <main class="min-vh-100 d-flex text-light flex-column justify-content-center">
  <div class="container d-flex flex-column justify-content-center">
  <p class="mx-auto fw-bold text-white text-center">merci pour votre interet pour cette classe malheureusement toutes les places sont déja reserver</p>
  <p class="mx-auto fw-bold text-white text-center">en cas d\'annulation un email vous recevrez un email sur votre boite %email% sinon vous pouvez choisir une date ulterieur</p><br>
  <a class="mx-auto btn btn-primary text-center"href="./reservations.php">Autre dates</a>
             
    
  </div
  
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>';
$wait_message=str_replace('%email%',$email,$wai_message);


$ok_messag='<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./wait.css">
</head>

<body class="d-flex flex-colum justify-content-center">
  <header>
    <!-- place navbar here -->
  </header>
  <main class="min-vh-100 d-flex text-light flex-column justify-content-center">
  <div class="container d-flex flex-column justify-content-center">
  <p class="mx-auto fw-bold text-white text-center">merci d\'avoir réserver votre classe avec bous vous recevrez bientot un email de confirmatio</p>
  <p class="mx-auto fw-bold text-white text-center">a l\'adresse suivante %email%</p><br>
  <a class="mx-auto btn btn-primary text-center"href="./reservations.php">Autre dates</a>
             
    
  </div
  
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>';
$ok_message=str_replace('%email%',$email,$ok_messag);
?>

