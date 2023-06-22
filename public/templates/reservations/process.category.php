<?php 
require_once ('./../../bdd/config.php') ;
require_once ('./wait.php');

$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$telephone=$_POST['telephone'];
$email=$_POST['email'];

$technique_slots=8;
$date= $_POST['date'];
$category= $_POST['category'];




if ($category=='technique' & $technique_slots>0) {
    $available= $dbh-> query("SELECT * FROM technique WHERE category='technique' and date='$date';");
    $row = $available->rowCount();
    $reste = $technique_slots - $row;
    
    if($row<8) {
        $sql=$dbh-> query("INSERT INTO technique (id,nom,prenom,telephone,email,date,category) VALUES (null,'$nom','$prenom','$telephone','$email','$date','$category')");
        echo $ok_message;
        
        echo $reste;
    } else if($row>=8) {
        $sql=$dbh-> query("INSERT INTO technique_waitlist (id,nom,prenom,telephone,email,date,category) VALUES (null,'$nom','$prenom','$telephone','$email','$date','$category')");
        ;
        echo $wait_message;
        echo $reste;

    }






} 








