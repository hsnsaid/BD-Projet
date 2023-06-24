<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" href="../css/nav2.css">
        <link rel="stylesheet" href="../css/enseignant/profile.css">
        <link rel="stylesheet" href="../css/admin/add_users.css">
        <script src="../front_script/admin/general_dis_profile.js" defer></script>
        <script src="../front_script/admin/update_teacher.js" defer></script>
    </head>
    <body>
    <div class="body"></div>
        <header class="">
            <div class="header-title">
              <h2>INFO ACADEMY</h2>
            </div>
            <div class="hamburger-menu">
              <input id="menu__toggle" type="checkbox" />
              <label class="menu__btn" for="menu__toggle">
                <span></span>
              </label>

              <ul class="menu__box">
                <li><a class="menu__item" href="Admin_general.php" autofocus> Home</a></li>
                <li><a class="menu__item" href="../templates/admin/add_news.html">Add News</a></li>
                <li><a class="menu__item" href="../templates/admin/add_users.html">Add Users</a></li>
                <li><a class="menu__item" href="logout.php">Logout</a></li>
              </ul>
              <div class="header-title" id="header-title">
                <h2>INFO&nbsp;ACADEMY</h2>
              </div>
            </div>
            <nav>
              <ul id="ul">
                <li class="j" id="li"><a class="e" href="Admin_general.php" autofocus> Home</a></li>
                <li class="j" id="li"><a class="e" href="../templates/admin/add_news.html">Add&nbsp;News</a></li>
                <li class="j" id="li"><a class="e" href="../templates/admin/add_users.html">Add&nbsp;Users</a></li>
                <li class="j" id="li"><img id="img" src="../image/admin.png" title="Profile"></li>
              </ul>
            </nav>
          </header>
          <div class="main_profile">
            <div class="hidden1">
              <span class="close-icon"></span>
            </div>
            <img src="../image/admin.png" alt="">
            <div class="name"></div>
            <div class="main_button">
              <span><a href="logout.php">Logout</a></span>
            </div>
          </div>
          <?php
                session_start();
                if(!isset($_SESSION['active'])){
                session_destroy();
                header('location: ../login.html');
                } 
                else{
                  include 'db.php';
                  $id=$_GET['id'];
                  $_SESSION['old_modul_id']=$id;
                  $sql="SELECT enseignant_name,password,Email,modul_name,modul_niveau FROM enseignant JOIN enseigne JOIN moduls WHERE enseignant.id=enseigne.enseignant_id AND enseigne.modul_id=moduls.id AND moduls.id=$_SESSION[old_modul_id]";
                  $result=$conn->query($sql);
                  $array=$result->fetch_all(MYSQLI_ASSOC);
                }
            ?>
        <div class="successfull">
        <h2 class="message">enseignant has been Upadated</h2>
      </div>
      <h1 class="add_student">Update enseignant</h1>
      <hr>
      <main>
        <div class="login">
            <form action="" method="post" class="form">
              <div class="user">
                <input type="text" name="name" value="<?php echo($array[0]['enseignant_name'])  ?>"  required >
                <label>Username</label>
              </div>
              <div class="user">
                <input type="password" name="password" value="<?php echo($array[0]['password'])  ?>"   required>
                <label>Password</label>
              </div>
              <div class="user">
                <input type="text" name="modul_name" value="<?php echo($array[0]['modul_name'])  ?>" required>
                <label>Modul Name</label>
              </div>
              <div class="user">
                <label class="level">Level</label>
                <select name="modul_niveau" >
                <option  value="<?php echo($array[0]['modul_niveau'])  ?>"><?php echo($array[0]['modul_niveau']) ?></option>
                  <option value="L2">L2</option>
                  <option value="L3_SI">L3_SI</option>
                  <option value="L3_ISIL">L3_ISIL</option>
                  <option value="M1_ISI">M1_ISI</option>
                  <option value="M1_WIC">M1_WIC</option>
                  <option value="M1_RSSI">M1_RSSI</option>
                  <option value="M2_ISI">M2_ISI</option>
                  <option value="M2_WIC">M2_WIC</option>
                  <option value="M2_RSSI">M2_RSSI</option>
                </select>
              </div>
              <div class="user">
                <input type="email" name="email" value="<?php echo($array[0]['Email'])  ?>" required >
                <label>Email</label>
              </div>
              <?php
              $conn->close();
              ?>
              <input class="submit" type="submit" name="submit" value="Update">
            </form>
            </div>
      </main>
</body>
</html>