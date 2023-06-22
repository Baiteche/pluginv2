<?php 

$gabarit = '';
$start = new DateTime('2023-05-22 00:00:00');
$end   = new DateTime('2024-12-31 00:00:00');


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
        <link rel="stylesheet" href="./reservations.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="original">
        <header>
            <nav class="navbar navbar-light h1 d-sm-none bg-none ">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                  aria-controls="offcanvasNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end w-100 text-light bg-dark d-flex flex-column " tabindex="-1" id="offcanvasNavbar"
                  aria-labelledby="offcanvasNavbarLabel ">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title mx-auto text-center" id="offcanvasNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body mt-4">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 mt-4">
                      <li class="nav-item mt-4">
                        <a class="nav-link text-light mx-auto text-center active h1" aria-current="page" href="#">Accueil</a>
                      </li>
                      <li class="nav-item mt-4">
                        <a class="nav-link text-light h1 mx-auto text-center" href="#">Réservation</a>
                      </li>
                      <li class="nav-item mt-4">
                        <a class="nav-link text-light mx-auto text-center h1" href="#">Contacts</a>
                      </li>
                      
                    </ul>
                   
                  </div>
                </div>
              </div>
            </nav>
   
            <!-- nav visible a partir de  md width-->



            <nav class="text-light d-none d-sm-flex justify-content-end col-12">
              <ul class="col-8 list-unstyled d-block d-sm-flex justify-content-end float-right">
                <li class=" mx-auto d-flex col-4 "><i class="bi bi-box-arrow-in-right mx-auto"></i><a class="nav-link d-block h-100 text-light text-decoration-none  text-center" href="#">Accueil</a></li>
                <li class=" mx-auto d-flex col-4"><a class="nav-link d-block  text-light text-decoration-none  w-100 text-center"  href="">Réservations</a></li>
                <li class=" mx-auto d-flex col-4"><a class="nav-link d-block  text-light text-decoration-none  text-center"  href="">Contacts</a></li>
              </ul>
            </nav>
        </header>
        <main class="d-flex  flex-column justify-content-center mt-4">
          <h1 class="mx-auto text-light d-none fw-bold">choix de la catégorie</h1>
            <div class="d-block d-lg-flex flex-wrap justify-content-between mx-auto col-12">
                <div class="mx-auto d-flex flex-column justify-content-around mt-2 col-10  col-lg-5" id="button1">
                    <div class="background-pics mx-auto  "></div>
                    <p class="fw-bold mx-auto d-block text-center w-100  ">Conditioning</p>

                </div>
                <div class="mx-auto d-flex flex-column justify-content-around mt-2 col-10 col-lg-5" id="button2">
                    <div class="background-pics mx-auto  "></div>
                    <p class="fw-bold mx-auto d-block text-center w-100">Technique</p>

                </div>
            </div>


            <!-- 2 pop up one for each category -->
            <form action="./process.category.php" method="post" id="modal1" class="d-none text-light col-12 mx-auto">
              
            <fieldset class="d-flex flex-column col-10 col-md-4 mx-auto mb-4">
            <h2 class="mx-auto">Conditioning</h2>
               
                        <label class="mt-1 mb-1 mx-auto" for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" required>
                        <label class="mt-1 mb-1 mx-auto" for="prenom">Prénom</label>
                        <input type="text" name="prenom" id="prenom" required>
                        <label class="mt-1 mb-1 mx-auto" for="telephone">Numéro de téléphone</label>
                        <input type="tel" name="telephone" id="telephone" required>
                        <label class="mt-1 mb-1 mx-auto" for="email">Email</label>
                        <input type="email" name="email" id="email">
                        <label class="mt-1 mb-1 mx-auto" for="date">Date</label>
                        <input type="date" name="date" id="date1" class=" border-3" required>
                        <input type="text" name="category" id="category-conditioning" class="d-none" type="hidden" value="conditioning">
                    </fieldset>
                    <fieldset class="d-flex justify-content-between  col-md-6 mx-auto">
                    <a class="btn btn-danger col-md-3 mt-2 mx-auto fw-bold " href="./reservations.php">Annuler</a>
                        <input class="btn btn-primary col-md-3 mt-2 mx-auto " type="submit" value="s\'inscrire">
                    </fieldset>



            </form>
            <form action="./test.php" method="post" id="modal2" class="d-none text-light mx-auto col-12 ">
                
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
                        <input type="date" name="date" required min="<?php $start?>" max="<?php $end?>" id="class-date" class=" border-3">
                        <input type="text"   class="d-none" name="category" id="category-technique" value="technique">
                    </fieldset>
                    <fieldset class="d-flex justify-content-between  col-md-6 mx-auto">
                        <a class="btn btn-danger col-md-3 mt-2 mx-auto fw-bold " href="./reservations.php">Annuler</a>
                        <input class="btn btn-primary col-md-3 mt-2 mx-auto " type="submit" value="s\'inscrire">
                    </fieldset>
                



            </form>


        </main>
        <footer  class="d-flex col-12 mt-5 pe-4">
       
        <div  id="foot" class="mx-auto col-8 d-flex justify-content-between mt-5">
        <a href=""><i class="fa fa-facebook"></i></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-linkedin"></a>
        <a href=""><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
            
        </footer>
       
       
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
        <script src="./myscript.js"></script>
    </body>

</html>