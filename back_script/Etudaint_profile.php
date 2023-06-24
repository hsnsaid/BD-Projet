<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('location: ../login.html');
}
else{
include 'db.php';
$query="SELECT id,Etudiant_name,niveau,Etudiant_Group,date_of_birth,Place_of_birth FROM etudiant WHERE id=$_SESSION[user_id]";
$result= $conn->query($query);
$response=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($response);
}
$conn->close();
?>