<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('Location: ../login.html');
}
else{
include 'db.php';
$id = $_GET['id'];

$sql = "SELECT * FROM ressources WHERE id=$id";
$result=$conn->query($sql);
$file=$result->fetch_assoc();
$filepath = __DIR__ . "/pdf/"  . $file['file'];
if (file_exists($filepath)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($filepath));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize( __DIR__ . "/pdf/"  . $file['file']));
    readfile('uploads/' . $file['file']);
}
}
$conn->close();
?>