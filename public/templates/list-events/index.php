<?php   
require_once './../../../bdd/config.php';
$sql = "SELECT * FROM events WHERE category='technique'";
$result = $conn->query($sql);






?>
<!doctype html>
<html lang="en">

<head>
  <title>liste des evenements disponible</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
  <?php
if (mysqli_num_rows($result) > 0) {
    echo '<div class="container">';
    echo '<div class="row">'; // Remove the "d-flex" class from the row container
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="col-12 col-md-4 mb-4">';
        echo '<div  class="card bg-light text-dark rounded-3">';
        echo '<div class="card-body">';
    
        echo '<div class="text-center">';
       
        echo '<p class="card-title h6">' . $row["start_datetime"] . '</p>';
        echo '<p class="card-text h6">' . $row["end_datetime"] . '</p>';
        
        echo '</div>';
        echo '<p class="card-title text-center text-success h6">' . $row["category"] . '</p>';
        echo '<button type="button" class="btn btn-primary" id="display">s\'inscrire</button>';

        echo '</div>';
        
        echo '</div>';
        
        echo '</div>';
    }
   
    
    echo '</div>';
    echo '</div>';
    
} else {
    echo "No data found.";
}

  
 
  ?>

<!-- Modal -->
<
        
   <form action="./inscription.php" method="post" id="monmodal" class="d-none text-dark mx-auto col-12 ">
                
                <fieldset class="d-flex flex-column col-10 col-md-4 mx-auto mb-4">
                <h2 class="mx-auto">Technique</h2>
                    <label class="mt-1 mb-1 mx-auto" for="nom">Nom</label>
                    <input type="text" name="nom" required id="nom">
                    <label class="mt-1 mb-1 mx-auto" for="prenom">Prénom</label>
                    <input type="text" name="prenom" required id="prenom">
                    <label class="mt-1 mb-1 mx-auto" for="telephone">Numéro de téléphone</label>
                    <input type="tel" name="telephone" required id="telephone">
                    <label class="mt-1 mb-1 mx-auto" for="email">Email</label>
                    <input type="email" name="email" required id="email">
                    <label class="mt-1 mb-1 mx-auto" for="date" >Date</label>
                    <select name="date" id="date">
                             <?php
                             $sql = "SELECT * FROM events WHERE category='technique'";
                             $result = $conn->query($sql);
                             while ($row = mysqli_fetch_assoc($result)) {
                               echo '<option value="' . $row["start_datetime"] . '">' . $row["start_datetime"] . '</option>';
                             }
                             ?>
                    </select>
                    <input type="text"   class="d-none" name="category" id="category-technique" value="technique">
                </fieldset>
                <fieldset class="d-flex justify-content-between  col-md-6 mx-auto">
                    <a class="btn btn-danger col-md-3 mt-2 mx-auto fw-bold " href="./reservations.php">Annuler</a>
                    <input class="btn btn-primary col-md-3 mt-2 mx-auto " type="submit" value="s\'inscrire">
                </fieldset>
            



        </form>
     



  
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>
   <script src="./script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>

</html>