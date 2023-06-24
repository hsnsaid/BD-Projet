<?php
session_start();
if(!isset($_SESSION['active'])){
   session_destroy();
   header("Location: ../login.html");
}
else{
include 'db.php';
$type=$_POST['type'];
if($type='Enseignant'){
$sql="SELECT Enseignant_name,modul_name,modul_niveau FROM Enseignant JOIN enseigne JOIN moduls WHERE Enseignant.id=enseigne.Enseignant_id AND moduls.id=enseigne.modul_id ";
$result=$conn->query($sql);
$response=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($response);
}
else{
$sql="SELECT Etudiant_name,niveau FROM etudiant JOIN etudy WHERE Etudiant.id=etudy.Etudiant_id ";
$result=$conn->query($sql);
$response=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($response);
}
}
$conn->close();
?>