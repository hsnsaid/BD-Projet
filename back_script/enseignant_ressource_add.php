<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('location: ../login.html');
}
else{
include 'db.php';
$ressources_name=$_POST['name'];
$ressources_type=$_POST['type'];
$upload_date=date('Y-m-d');
$modul_name=$_POST['modul'];
$file_name = $_FILES['file']['name'];
$file_type=$_FILES['file']['type'];
$file_size=$_FILES['file']['size'];
$file_dir=$_FILES['file']['tmp_name'];
$file_store="/opt/lampp/htdocs/project/final_project/back_script/pdf".$file_name;
move_uploaded_file($file_dir, $file_store);
$query="SELECT id FROM moduls WHERE modul_name='$modul_name'";
$result=$conn->query($query);
$modul_id = $result->fetch_array(MYSQLI_ASSOC)['id'];
$stmt= $conn->prepare("INSERT INTO ressources (ressources_name,ressources_type, upload_date,enseignant_id,modul_id, file) VALUES(?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiis", $ressources_name, $ressources_type, $upload_date, $_SESSION['user_id'], $modul_id, $file_name);
$stmt->execute();
}
$conn->close();
?>