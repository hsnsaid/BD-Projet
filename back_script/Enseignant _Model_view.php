<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('location: ../login.html');
}
else{
include 'db.php';
$query="SELECT modul_name,modul_niveau FROM enseignant JOIN enseigne JOIN moduls WHERE enseignant.id=enseigne.enseignant_id AND enseigne.modul_id=moduls.id AND enseignant.id=$_SESSION[user_id]";
$result=$conn->query($query);
$response=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($response);
}
$conn->close();
?>