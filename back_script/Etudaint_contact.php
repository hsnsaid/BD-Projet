<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('location: ../login.html');
}
else{
include 'db.php';
$query="SELECT niveau FROM etudiant WHERE id=$_SESSION[user_id]";
$result_m=$conn->query($query);
$niveau=$result_m->fetch_array(MYSQLI_ASSOC)['niveau'];
$sql="SELECT Email,enseignant_name,modul_name FROM enseignant JOIN enseigne JOIN moduls WHERE enseignant.id= enseigne.enseignant_id AND enseigne.modul_id=moduls.id AND moduls.modul_niveau='$niveau'";
$result=$conn->query($sql);
$response=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($response);
}
$conn->close();
?>