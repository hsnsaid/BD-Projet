<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('location: ../login.html');
}
else{
include 'db.php';
$sql1="SELECT niveau FROM etudiant WHERE id=$_SESSION[user_id]";
$result_n=$conn->query($sql1);
$niveau=$result_n->fetch_array(MYSQLI_ASSOC)['niveau'];
$sql="SELECT administrateur_name,message,date FROM administrateur JOIN news WHERE administrateur.id=news.administrateur_id AND news_target='GENERAL'OR news_target='$niveau' GROUP BY date,news.id ORDER BY news.id DESC ";
$result=$conn->query($sql);
$response=$result->fetch_all(MYSQLI_ASSOC);
echo json_encode($response);
}
$conn->close();
?>