<?php  
session_start();
// If the user is not logged in redirect to the login page...
if ($_SESSION['loggedin']!=true) {
	
	header('location: ./../../../admin');
}
else{
    require_once './../../../bdd/config.php';
$sql = "SELECT * FROM events WHERE category='technique'";
$result = $conn->query($sql);
}


?>


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
   <link rel="stylesheet" href="./../calendrier/styles/calendrier.css">

</head>



<body class="original">
  <header>
    <!-- place navbar here -->
  </header>
  <main>
  <div class="col-12 d-flex   justify-content-between">
    <section class="col-9  py-3">
    <h1 class="col-12 text-center mb-4">Liste des classes par categorie</h1>
    <h2>Technique</h2>

<?php
    if (mysqli_num_rows($result) > 0) {
    echo '<div class="container">';
    echo '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">';
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col mb-4 fw-bold">';
        echo '<div class="card bg-light text-dark rounded-3">';
        echo '<div class="card-body">';
        
        echo '<div class="text-center">';
        echo '<p class="card-title h6">' . $row["start_datetime"] . '</p>';
        echo '<p class="card-text h6">' . $row["end_datetime"] . '</p>';
        echo '</div>';
        
        echo '<p class="card-title h6 col-12 text-center mt-3">' . $row["category"] . '</p>';
        
        $date = $row["start_datetime"];
        $sQl = "SELECT * FROM technique WHERE category='technique' and date ='$date'";
        $participants = $conn->query($sQl);
        
        if (mysqli_num_rows($participants) > 0) {
            echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#participantsModal-' . $row["id"] . '">';
            echo 'Liste participants';
            echo '</button>';
            
            // Modal
            echo '<div class="modal fade" id="participantsModal-' . $row["id"] . '" tabindex="-1" aria-labelledby="participantsModalLabel-' . $row["id"] . '" aria-hidden="true">';
            echo '<div class="modal-dialog">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            echo '<h5 class="modal-title" id="participantsModalLabel-' . $row["id"] . '">Participants</h5>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
            echo '</div>';
            echo '<div class="modal-body">';
            
            echo '<ul>';
            
            while ($theow = mysqli_fetch_assoc($participants)) {
                echo '<li class="d-flex  text-center mt-3">
                <p class="text-center text-success col-12">' . $theow["nom"] . '  '. $theow["prenom"] .'</p>
                
                
                
                
                </li>';
                echo '<p class="text-center">Numero de telephone : ' . $theow["telephone"] . '</p>';
                echo '<p class="text-center">Email : ' . $theow["email"] . '</p>';
                echo'<hr class="hr" />';
            }
            
            echo '</ul>';
            
            echo '</div>';
            echo '<div class="modal-footer">';
            echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            
        }
        
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    
    echo '</div>'; // Close the row container
    echo '</div>'; // Close the main container
} else {
    echo "No data found.";
}
?>

  </section>

  <section id="barre-droite" class="h-100 col-3 text-light d-none d-sm-flex flex-column justify-content-between">
            <nav id="nav-droite" class=" mx-auto d-flex flex-column justify-content-center ">
                <ul class="list-unstyled mx-auto  d-flex h-25 flex-column justify-content-between">
                    <li class=" fw-bold h2 mb-4 mt-4"><i class="fa fa-home" aria-hidden="true"></i> <a href="./index.php" class="text-decoration-none text-light">Dashboard</a></li>
                    <li class="fw-bold h2 mb-4 mt-4"><i class="fa-sharp fa-regular fa-calendar-days"></i> <a href="./../calendrier/" class="text-decoration-none text-light">Calendrier</a></li>
                    <li class="fw-bold h2 mb-4 mt-4"><i class="fa fa-gear" aria-hidden="true"></i> <a href="" class="text-decoration-none text-light">Parametres</a></li>
                    <li class="float-end list-unstyled fw-bold d-flex col-12 text-center">
                    <a href="./../calendrier/session-close.php" class="btn btn-danger fw-bold col-12 mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"></path>
                            <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"></path>
                        </svg>
                        Logout
                    </a>
                </li> 
                </ul>
            </nav>

        </section>
  </div>
  
  </main>
  <footer>
  
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
 <script src="https://kit.fontawesome.com/80cad8ab7c.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>