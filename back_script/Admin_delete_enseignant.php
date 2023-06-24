<?php
session_start();
if(!isset($_SESSION['active'])){
session_destroy();
header('Location: ../login.html');
}
else{
include 'db.php';
$id=$_GET['id'];
$sql="DELETE FROM enseigne WHERE modul_id='$id' ";
$result1=$conn->query($sql);
$sql2="DELETE FROM ressources WHERE modul_id='$id'";
$result2=$conn->query($sql2);
header("Location: Admin_ganeral_enseignant.php");
}
$conn->close();
?>