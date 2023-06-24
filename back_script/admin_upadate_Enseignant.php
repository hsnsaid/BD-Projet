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
$modul_name=$_POST['modul_name'];
$niveau=$_POST['modul_niveau'];
$email=$_POST['email'];
$query="SELECT enseignant_id FROM enseigne WHERE modul_id=$_SESSION[old_modul_id]";
$result_e=$conn->query($query);
$enseignant_id=$result_e->fetch_assoc()['enseignant_id'];
$query_update="UPDATE enseignant SET enseignant_name='$name', password='$password', email='$email' WHERE id='$enseignant_id'";
$update=$conn->query($query_update);
$query2="SELECT id FROM moduls WHERE modul_name='$modul_name' AND modul_niveau='$niveau'";
$result_m= $conn->query($query2);
if(mysqli_num_rows($result_m)<1){
    $stmt_insert_modul=$conn->prepare("INSERT INTO moduls (modul_name, modul_niveau) VALUES (?, ?)");
    $stmt_insert_modul->bind_param("ss", $modul_name, $niveau);
    $stmt_insert_modul->execute();
    $query3="SELECT id FROM moduls WHERE modul_name='$modul_name' AND modul_niveau='$niveau'";
    $result_m2= $conn->query($query3);
    $modul_id= $result_m2->fetch_assoc()['id'];
}
else{
    $modul_id= $result_m->fetch_assoc()['id'];
}
$query_select="SELECT modul_id FROM enseigne WHERE modul_id='$modul_id' AND enseignant_id!='$enseignant_id'";
$select= $conn->query($query_select);
if(mysqli_num_rows($select)>0){
$query_delete="DELETE FROM enseigne WHERE modul_id='$modul_id' AND enseignant_id!='$enseignant_id'";
$delete= $conn->query($query_delete);
}
 $query_update2="UPDATE enseigne SET enseignant_id='$enseignant_id', modul_id='$modul_id' WHERE $enseignant_id='$enseignant_id' AND modul_id=$_SESSION[old_modul_id]";
 $update2=$conn->query($query_update2);
if($_SESSION['old_modul_id']!=$modul_id){
    $query_delete2="DELETE FROM ressources WHERE modul_id=$_SESSION[old_modul_id]";
    $delete2=$conn->query($query_delete2);
    $query_select2="SELECT id FROM etudiant WHERE niveau='$niveau'";
    $query_c="SELECT count(id) FROM etudiant WHERE niveau='$niveau'";
    $result_c=$conn->query($query_c);
    $count=$result_c->fetch_assoc()['count(id)'];
    //select niveu of old modul
    $query_select2_old_niveau="SELECT modul_niveau FROM moduls WHERE id=$_SESSION[old_modul_id]";
    $result_old_niveau= $conn->query($query_select2_old_niveau);
    $old_niveau= $result_old_niveau->fetch_assoc()['modul_niveau'];
    echo json_encode($old_niveau);
    // compare it to the current nivea
    if($old_niveau==$niveau){
    for($i=0;$i<$count;$i++){
    $result_n=$conn->query($query_select2);
    $etudiant_id=$result_n->fetch_all(MYSQLI_ASSOC)["$i"]['id'];
    $query_update3="UPDATE etudy SET Etudiant_id='$etudiant_id', modul_id='$modul_id' WHERE modul_id=$_SESSION[old_modul_id] AND Etudiant_id='$etudiant_id'";
    $update3=$conn->query($query_update3);
    $query_delete4="DELETE FROM moduls WHERE id=$_SESSION[old_modul_id]";
    $delete4=$conn->query($query_delete4);
    }}
    else{
    for($i=0;$i<$count;$i++){
    $result_n=$conn->query($query_select2);
    $etudiant_id=$result_n->fetch_all(MYSQLI_ASSOC)["$i"]['id'];
    $query_delete3="DELETE FROM etudy WHERE modul_id=$_SESSION[old_modul_id]";
    $delete3=$conn->query($query_delete3);
    $stmt_insert_etudy=$conn->prepare("INSERT INTO etudy (Etudiant_id, modul_id) VALUES (?, ?)");
    $stmt_insert_etudy->bind_param("ss", $etudiant_id, $modul_id);
    $stmt_insert_etudy->execute();
    $query_delete4="DELETE FROM moduls WHERE id=$_SESSION[old_modul_id]";
    $delete4=$conn->query($query_delete4);
    }}   
}
}
$conn->close();
?>