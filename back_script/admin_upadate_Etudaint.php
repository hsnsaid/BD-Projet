<?php
session_start();
if(!isset($_SESSION['active'])){
    session_destroy();
    header('location: ../login.html');
} 
else{
include 'db.php';
$name=$_POST['name'];
$password=$_POST['password'];
$niveau=$_POST['niveau'];
$Group=$_POST['Etudiant_Group'];
$date_of_birth=$_POST['date_of_birth'];
$Place_of_birth=$_POST['Place_of_birth'];
$query_update="UPDATE etudiant SET Etudiant_name='$name', password='$password', niveau='$niveau', Etudiant_Group='$Group', date_of_birth='$date_of_birth', Place_of_birth='$Place_of_birth' WHERE id=$_SESSION[old_etudaint_id]";
$update=$conn->query($query_update);
$query2="SELECT id FROM moduls WHERE modul_niveau='$niveau'";
$query_c="SELECT count(id) FROM moduls WHERE modul_niveau='$niveau'";
$result_c=$conn->query($query_c);
$count=$result_c->fetch_assoc()['count(id)'];
$sql="DELETE FROM etudy WHERE Etudiant_id=$_SESSION[old_etudaint_id]";
$delete=$conn->query($sql);
for($i=0;$i<$count;$i++){ 
$result_n=$conn->query($query2);
$modul_id=$result_n->fetch_all(MYSQLI_ASSOC)["$i"]['id'];
$stmt2=$conn->prepare("INSERT INTO etudy (modul_id, Etudiant_id) VALUES (?, ?)");
$stmt2->bind_param("ii", $modul_id, $_SESSION['old_etudaint_id']);
$stmt2->execute();
}
}
$conn->close();
?>