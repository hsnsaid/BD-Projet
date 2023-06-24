<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('location: ../login.html');
}
else{
include 'db.php';
$sql="SELECT administrateur_name FROM administrateur WHERE id=$_SESSION[user_id]";
$result=$conn->query($sql);
$response=$result->fetch_array(MYSQLI_ASSOC);
echo json_encode($response);
}
$conn->close();
?>