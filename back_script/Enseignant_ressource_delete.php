<?php
session_start();
if(!isset($_SESSION['active'])){
session_destroy();
header('Location: ../login.html');
}
else{
include 'db.php';
$ressources_id=$_GET['id'];
$sql="DELETE FROM ressources WHERE id='$ressources_id'";
$result=$conn->query($sql);
header("Location: Enseignant_ressource_view.php?type=$_SESSION[type]");
}
$conn->close();
?>