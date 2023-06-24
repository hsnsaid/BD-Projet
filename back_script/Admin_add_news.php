<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('location: ../login.html');
} 
else{
include 'db.php';
$message=$_POST['message'];
$target=$_POST['target'];
$upload_date=date('Y-m-d');
$stmt=$conn->prepare("INSERT INTO news (message, news_target, administrateur_id, date) VALUES(?, ?, ?, ?)");
$stmt->bind_param("ssis", $message, $target, $_SESSION['user_id'], $upload_date );
$stmt->execute();
}
$conn->close();
?>