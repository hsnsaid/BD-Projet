<?php
session_start();
if(!isset($_SESSION['active'])){
session_destroy();
header('Location: ../login.html');
}
else{
include 'db.php';
$user_id=$_GET['id'];
$sql1="DELETE FROM etudy WHERE Etudiant_id='$user_id' ";
$result1=$conn->query($sql1);
$sql2="DELETE FROM etudiant WHERE id='$user_id' ";
$result2=$conn->query($sql2);
header("Location: Admin_general.php");
}
$conn->close();
?>