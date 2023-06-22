<?php 

class Available {
    private $dbh;
    private $okMessage;
    private $waitMessage;

    public function __construct() {
        $this->dbh = new PDO('mysql:host=;dbname=gym','root','');
        $this->okMessage = "Appointment booked successfully.";
        $this->waitMessage = "Appointment added to the waitlist.";
    }

       //function pour ajouter les information a la table sql avec 3 param 
       //1.nombre de (slots) libre pour le cours
       //2.nom de la table sql
       //3. la category dans la table sql

    public function scheduleAppointment($freeSlots, $tableToInsert,$secondtable, $cat) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

                     
        if ($cat === 'technique') {
            $nom = $_POST['nom'];
             $prenom = $_POST['prenom'];
             $telephone = $_POST['telephone'];
             $email = $_POST['email'];
             $date = $_POST['date'];
             $category= $_POST['category'];
            
            $available = $this->dbh->query("SELECT * FROM $tableToInsert WHERE category='$cat' AND date='$date'");
            $row = $available->rowCount();
            echo $row;
            echo'<br>';
            echo $date;
           

            if ($row < $freeSlots) {
                $sql = $this->dbh->query("INSERT INTO $tableToInsert (id, nom, prenom, telephone, email, date, category) VALUES (null, '$nom', '$prenom', '$telephone', '$email', '$date', '$category')");
                echo $this->okMessage;
                $reste = $freeSlots - $row;
                echo $reste;
            } else if($row >= $freeSlots) {
                // si le nombre de place est a zero on insert les données 
                //dans une table {nom de la table}_waitlist
                $sql = $this->dbh->query("INSERT INTO {$secondtable} (id, nom, prenom, telephone, email, date, category) VALUES (null, '$nom', '$prenom', '$telephone', '$email', '$date', '$category')");
                echo $this->waitMessage;
                $reste = $freeSlots - $row;
                echo $reste;
            }
        }


        }
      
    }
}

