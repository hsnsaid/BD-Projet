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
$user_type=$_POST['type'];
if($user_type=='Etudiant'){
$niveau=$_POST['niveau'];
$Group=$_POST['Etudiant_Group'];
$date_of_birth=$_POST['date_of_birth'];
$Place_of_birth=$_POST['Place_of_birth'];
$stmt=$conn->prepare("INSERT INTO etudiant (Etudiant_name, password, niveau, Etudiant_Group, date_of_birth, Place_of_birth) VALUES(?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssiss", $name, $password, $niveau, $Group, $date_of_birth, $Place_of_birth);
$stmt->execute();
$query="SELECT id FROM etudiant WHERE password='$password'";
$result_e=$conn->query($query);
$etudiant_id=$result_e->fetch_assoc()['id'];
$query2="SELECT id FROM moduls WHERE modul_niveau='$niveau'";
$query_c="SELECT count(id) FROM moduls WHERE modul_niveau='$niveau'";
$result_c=$conn->query($query_c);
$count=$result_c->fetch_assoc()['count(id)'];
for($i=0;$i<$count;$i++){
$result_n=$conn->query($query2);
$modul_id=$result_n->fetch_all(MYSQLI_ASSOC)["$i"]['id'];
$stmt2=$conn->prepare("INSERT INTO etudy (modul_id, Etudiant_id) VALUES (?, ?)");
$stmt2->bind_param("ii", $modul_id, $etudiant_id);
$stmt2->execute();
}
}
else{
$modul_name=$_POST['modul_name'];
$niveau=$_POST['modul_niveau'];
$email=$_POST['email'];
$query_test="SELECT id FROM enseignant WHERE enseignant_name='$name'";
$test=$conn->query($query_test);
if(mysqli_num_rows($test)<1){
$stmt=$conn->prepare("INSERT INTO enseignant (enseignant_name, password, Email) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $password, $email);
$stmt->execute();
}
$stmt3=$conn->prepare("INSERT INTO moduls (modul_name, modul_niveau) VALUES (?, ?)");
$stmt3->bind_param("ss", $modul_name, $niveau);
$stmt3->execute();
$query2="SELECT id FROM moduls WHERE modul_name='$modul_name' AND modul_niveau='$niveau'";
$result_m= $conn->query($query2);
$modul_id= $result_m->fetch_assoc()['id'];
$query_id="SELECT id FROM  enseignant WHERE password='$password' AND enseignant_name='$name'";
$result_e=$conn->query($query_id);
$enseignant_id=$result_e->fetch_assoc()['id'];
$stmt2=$conn->prepare("INSERT INTO enseigne (modul_id, enseignant_id) VALUES (?, ?)");
$stmt2->bind_param("ii", $modul_id, $enseignant_id);
$stmt2->execute();
$query_select="SELECT id FROM etudiant WHERE niveau='$niveau'";
$query_c="SELECT count(id) FROM etudiant WHERE niveau='$niveau'";
$result_c=$conn->query($query_c);
$count=$result_c->fetch_assoc()['count(id)'];
for($i=0;$i<$count;$i++){
$result_n=$conn->query($query_select);
$etudiant_id=$result_n->fetch_all(MYSQLI_ASSOC)["$i"]['id'];
$stmt4=$conn->prepare("INSERT INTO etudy (modul_id, Etudiant_id) VALUES (?, ?)");
$stmt4->bind_param("ii", $modul_id, $etudiant_id);
$stmt4->execute();
}
}
}
$conn->close();
?>