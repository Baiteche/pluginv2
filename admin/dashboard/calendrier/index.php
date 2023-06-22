<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	
	exit;
}

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <!--************************************************************************************
****************************************************************************************
                                  meta tags and cdn links 
****************************************************************************************
***************************************************************************************-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin calendar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css">
    <link rel="stylesheet" href="./styles/calendrier.css">




</head>

<body class="original">

    <?php
    /*------------------------------------------------------------------------
    ------------------------------------------------------------------------
    ------------------- database connection ------------------------------
    ------------------------------------------------------------------------
    ------------------------------------------------------------------------*/
    $host     = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'gym';

    $conn = new mysqli($host, $username, $password, $dbname);

    if (!$conn) {
        die("Cannot connect to the database." . $conn->error);
    }


    // --------------------- // Retrieve events from the database----------------------------------

    $schedules = $conn->query("SELECT * FROM `events`");
    $sched_res = [];
    foreach ($schedules->fetch_all(MYSQLI_ASSOC) as $row) {
        $row['s_date'] = date("F d, Y h:i A", strtotime($row['start_datetime']));
        $row['e_date'] = date("F d, Y h:i A", strtotime($row['end_datetime']));
        $sched_res[$row['id']] = $row;
    }



    // ----------------- // Close the database connection-----------------

    if (isset($conn)) $conn->close();
    ?>

   
   


    <div class="col-12 d-flex  justify-content-between">
        <!--************************************************************************************
****************************************************************************************
                                  section gauche
****************************************************************************************
***************************************************************************************-->


        <section id="section-gauche" class="d-flex col-9">
         
            <div id="calendar" class="mx-auto col-11"></div>
        </section>


        <!--************************************************************************************
****************************************************************************************
                                  section droite 
****************************************************************************************
***************************************************************************************-->


        <section id="barre-droite" class="h-100 col-3 text-light d-none d-sm-flex flex-column justify-content-between">
            <nav id="nav-droite" class=" mx-auto d-flex flex-column justify-content-center ">
                <ul class="list-unstyled mx-auto  d-flex h-25 flex-column justify-content-between">
                    <li class=" fw-bold h2 mb-4 mt-4"><i class="fa fa-home" aria-hidden="true"></i> <a href="./../dashboard/" class="text-decoration-none text-light">Dashboard</a></li>
                    <li class="fw-bold h2 mb-4 mt-4"><i class="fa-sharp fa-regular fa-calendar-days"></i> <a href="./index.php" class="text-decoration-none text-light">Calendrier</a></li>
                    <li class="fw-bold h2  mb-4 mt-4"><i class="fa fa-gear" aria-hidden="true"></i> <a href="" class="text-decoration-none text-light ">Parametres</a></li>
                    <li class="float-end list-unstyled fw-bold d-flex col-12 text-center">
                    <a href="./session-close.php" class="btn btn-danger fw-bold col-12 mx-auto">
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

    <!--************************************************************************************


               events detail modal hidden at first shown with javascript eventclick



***************************************************************************************-->

    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="event-details-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Schedule Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <div class="container-fluid">
                        <dl>
                            <dt class="text-muted">Title</dt>
                            <dd id="title" class="fw-bold fs-4"></dd>
                            <dt class="text-muted">Description</dt>
                            <dd id="description" class=""></dd>
                            <dt class="text-muted">Start</dt>
                            <dd id="start" class=""></dd>
                            <dt class="text-muted">End</dt>
                            <dd id="end" class=""></dd>
                        </dl>
                    </div>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                     
                        <button type="button" class="btn btn-danger btn-sm rounded-0" id="delete" data-id="">Delete</button>
                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!--************************************************************************************


               events add modal hidden at first shown with javascript dateClick



***************************************************************************************-->



    <div class="modal fade" tabindex="-1" data-bs-backdrop="static" id="add-event-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-0">
                <div class="modal-header rounded-0">
                    <h5 class="modal-title">Details de l'evenement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body rounded-0">
                    <form action="save_schedule.php" method="post" id="add-form">
                        <input type="hidden" name="id" value="">
                        <div class="form-group mb-2">
                            <label for="title" class="control-label">Title</label>
                            <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="title" class="control-label">catégorie</label>
                            <input type="text" class="form-control form-control-sm rounded-0" name="category" id="category" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="description" class="control-label">Description</label>
                            <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                        </div>
                        <div class="form-group mb-2">
                            <label for="start_datetime" class="control-label">Start</label>
                            <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="end_datetime" class="control-label">End</label>
                            <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer rounded-0">
                    <div class="text-end">
                        <button class="btn btn-primary btn-sm rounded-0" type="submit" form="add-form"><i class="fa fa-save"></i> Save</button>

                        <button type="button" class="btn btn-secondary btn-sm rounded-0" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer>

    </footer>

    <!--************************************************************************************


 differents cdn pour fullcalendar , bootstrap,ajax et un kit fontawesome pour les icons



***************************************************************************************-->

    <script src="https://kit.fontawesome.com/80cad8ab7c.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js"></script>
    <script src="./js/calendrier.js"></script>


    <!--************************************************************************************
             a scheds variable that is just a json_encode of $sched_res
             to be used in js and be assigned to the events array 
             to render them on fullcalendar
    ***************************************************************************************-->
    <script>
        var scheds = $.parseJSON('<?= json_encode($sched_res) ?>')
    </script>
</body>

</html>