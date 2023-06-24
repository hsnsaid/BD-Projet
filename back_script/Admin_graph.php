<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('location: ../login.html');
}
else{
include 'db.php';
$sql1="SELECT count(Etudiant_name) AS number_etudaint,niveau FROM etudiant   GROUP BY niveau";
$result=$conn->query($sql1);
$etudiant_array=$result->fetch_all(MYSQLI_ASSOC);
$sql2="SELECT count(enseignant_name) AS number_prof,modul_niveau FROM enseignant join enseigne join moduls WHERE enseignant.id=enseigne.enseignant_id AND enseigne.modul_id=moduls.id GROUP BY modul_niveau";
$result1=$conn->query($sql2);
$enseignant_array=$result1->fetch_all(MYSQLI_ASSOC);
$response=[];
for($i=0;$i<count($etudiant_array);$i++){
for($j=0;$j<count($enseignant_array);$j++){
if( $etudiant_array[$i]['niveau'] == $enseignant_array[$j]['modul_niveau']){
$response[$i]=["number_etudaint" => $etudiant_array[$i]['number_etudaint'] , "number_enseignant" => $enseignant_array[$j]['number_prof'], "niveau" => $etudiant_array[$i]['niveau']];
}
}
}
echo json_encode($response);
}
$conn->close();
?>