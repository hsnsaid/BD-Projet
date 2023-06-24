<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('Loction: ../login.html');
}
else {
include 'db.php';
$query = "SELECT modul_name,enseignant_name FROM moduls JOIN etudy join etudiant join enseigne join enseignant WHERE moduls.id = etudy.modul_id AND etudy.Etudiant_id = etudiant.id AND moduls.id =enseigne.modul_id AND enseigne.enseignant_id=enseignant.id AND etudiant.id =$_SESSION[user_id]";
$result = $conn->query($query);
$response= $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($response);
}
$conn->close();
?>