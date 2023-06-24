<?php
include 'db.php';
$password =$_POST['password'];
$type=$_POST['type'];
if($type=='student'){
$name =$_POST['username'];
$query= "SELECT id FROM etudiant WHERE Etudiant_name='$name' AND password='$password'";
$result=$conn->query($query);
if(mysqli_num_rows($result) ==1){
 session_start();  
 $_SESSION['active'] = true;
 $_SESSION['user_id'] = $result->fetch_array(MYSQLI_BOTH)['id'];
 $response = ["status" => false,"location" => "templates/general.html"];
 echo json_encode($response);
}
else {
    $array =['status'=>TRUE];
    header("Content-Type: application/json");
    echo json_encode($array);
}
}
if($type=='teacher'){
$name =$_POST['username'];
$query= "SELECT * FROM enseignant WHERE enseignant_name='$name' AND password='$password'";
$result=$conn->query($query);
if(mysqli_num_rows($result) ==1){
 session_start();  
 $_SESSION['active'] = true;
 $_SESSION['user_id'] = $result->fetch_array(MYSQLI_BOTH)['id'];
 $response = ["status" => false,"location" => "templates/enseignant/general.html"];
 echo json_encode($response);
}
else {
    $array =['status'=>TRUE];
    header("Content-Type: application/json");
    echo json_encode($array);
}
}
if($type=='admin'){
    $name =$_POST['username'];
    $query= "SELECT * FROM administrateur WHERE administrateur_name='$name' AND password='$password'";
    $result=$conn->query($query);
if(mysqli_num_rows($result) ==1){
 session_start();  
 $_SESSION['active'] = true;
 $_SESSION['user_id'] = $result->fetch_array(MYSQLI_BOTH)['id'];
 $response = ["status" => false,"location" => "back_script/Admin_general.php"];
echo json_encode($response);
}
else {
    $array =['status'=>TRUE];
    header("Content-Type: application/json");
    echo json_encode($array);
}}
$conn->close()
?> 