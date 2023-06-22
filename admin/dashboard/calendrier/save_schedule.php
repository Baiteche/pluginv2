<?php 
     $host     = 'localhost';
     $username = 'root';
     $password = '';
     $dbname   ='gym';
 
     $conn = new mysqli($host, $username, $password, $dbname);
     $query= "CREATE TABLE IF NOT EXISTS events (
        id INT AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL,
        category VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        start_datetime DATETIME NOT NULL,
        end_datetime DATETIME NOT NULL
    )";

mysqli_query($conn, $query);
     
     
if($_SERVER['REQUEST_METHOD'] !='POST'){
    echo "<script> alert('Error: No data to save.'); location.replace('./') </script>";
    $conn->close();
    exit;
}

extract($_POST);
$allday = isset($allday);

if(empty($id)){
    $sql = "INSERT INTO `events` (`title`,`category`,`description`,`start_datetime`,`end_datetime`) VALUES ('$title','$category','$description','$start_datetime','$end_datetime')";
}else{
    $sql = "UPDATE `events` set `title` = '{$title}', `description` = '{$description}','category'='$category', `start_datetime` = '{$start_datetime}', `end_datetime` = '{$end_datetime}' where `id` = '{$id}'";
}

$save = $conn->query($sql);

if($save){
    echo "<script> alert('Schedule Successfully Saved.'); location.replace('./') </script>";
}else{
    echo "<pre>";
    echo "An Error occured.<br>";
    echo "Error: ".$conn->error."<br>";
    echo "SQL: ".$sql."<br>";
    echo "</pre>";
}

$conn->close();
?>