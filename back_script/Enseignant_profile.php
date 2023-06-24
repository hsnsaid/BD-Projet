<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('location: ../login.html');
}
else{
include 'db.php';
$query="SELECT enseignant_name FROM enseignant WHERE id=$_SESSION[user_id]";
$result= $conn->query($query);
$response=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($response);
}
$conn->close();
?>