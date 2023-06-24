<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('location: ../login.html');
}
else{
include 'db.php';
$sql="SELECT count(Etudiant_name) AS Etudiant_number FROM etudiant";
$result_Etudiant_name=$conn->query($sql);
$Etudiant_number=$result_Etudiant_name->fetch_array(MYSQLI_ASSOC)['Etudiant_number'];
$sql2="SELECT count(enseignant_name) AS enseignant_number FROM enseignant";
$result_enseignant_name=$conn->query($sql2);
$enseignant_number=$result_enseignant_name->fetch_array(MYSQLI_ASSOC)['enseignant_number'];
$response =[];
$response=["Etudiant_number" => "$Etudiant_number" , "enseignant_number"=>"$enseignant_number"];
echo json_encode($response);
}
$conn->close()
?>