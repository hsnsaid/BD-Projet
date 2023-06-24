<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav2.css">
    <link rel="stylesheet" href="../css/ressource.css">
    <link rel="stylesheet" href="../css/big_profile.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
    <script src="../front_script/dis_profile.js" defer></script>
    <script src="../front_script/profile_value.js" defer></script>
    <title>Document</title>
</head>
<body>
  <header>
    <div class="header-title">
      <h2>INFO ACADEMY</h2>
    </div>
    <div class="hamburger-menu">
      <input id="menu__toggle" type="checkbox" />
      <label class="menu__btn" for="menu__toggle">
        <span></span>
      </label>
  
      <ul class="menu__box">
        <li><img id="profile" src="../image/student.png" alt="" title="Profile"></li>
        <li><a class="menu__item" href="../templates/general.html" autofocus> Home</a></li>
        <li><a class="menu__item" href="../templates/news.html">News</a></li>
        <li><a class="menu__item" href="../templates/contact.html">Contact</a></li>
        <li><a class="menu__item" href="logout.php">Logout</a></li>
      </ul>
      <div class="header-title">
        <h2>INFO ACADEMY</h2>
      </div>
    </div>
    <nav>
      <ul>
        <li class="j"><a class="e" href="../templates/general.html" autofocus> Home</a></li>
        <li class="j"><a class="e" href="../templates/news.html">News</a></li>
        <li class="j"><a class="e" href="../templates/contact.html">Contact</a></li>
        <li><img id="img" src="../image/student.png" title="Profile"></li>
      </ul>
    </nav>
  </header>
      <div class="main_profile">
        <div class="hidden1">
          <span class="close-icon"></span>
        </div>
        <img src="../image/student.png" alt="">
        <div class="name"></div>
        <div class="main_button">
          <button id="profile1">Profile</button>
          <button><a href="logout.php">Logout</a></button>
        </div>
      </div>
        <?php
            session_start();
            if(!isset($_SESSION['active'])){
              session_destroy();
                header("Location: ../login.html");
            }
            else{
            include 'db.php';
            $sql="SELECT id FROM moduls WHERE modul_name='$_SESSION[modul]'";
            $result_m=$conn->query($sql);
            $modul_id=$result_m->fetch_array(MYSQLI_ASSOC)['id'];
            $modul_type=$_GET['type'];
            $_SESSION['type']=$modul_type;
            $query="SELECT ressources_name,upload_date FROM ressources WHERE modul_id ='$modul_id' AND ressources_type='$modul_type'  GROUP BY upload_date,ressources_name ";
            $result=$conn->query($query);
            $response=$result->fetch_all(MYSQLI_ASSOC);
            }
        ?>
      <main>
        <section >
          <p><?php echo"$modul_type"?></p>
          <div class="main_courses">
            <table>
              <thead>
                <tr>
                  <th class="left">RESSOURCES NAME</th>
                  <th class="center">DATE</th>
                  <th class="right">DOWNLOAD</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($response as $row) {?>
                <tr>
                  <td class="left"><?php echo "$row[ressources_name]"?></td>
                  <td class="center"><?php echo"$row[upload_date]"?></td>
                  <?php
                   $sql2="SELECT id FROM ressources WHERE ressources_name='$row[ressources_name]' AND upload_date='$row[upload_date]'";
                   $result2=$conn->query($sql2);                  
                   $ressources_id=$result2->fetch_array(MYSQLI_ASSOC)['id'];
                  ?>
                  <td class="right"><a href="Etudaint_ressource_download.php?id=<?php echo $ressources_id ?>"><i class="material-icons"  title="Download">&#xf090;</i></a></td>
                </tr>
                <?php }$conn->close()?>
              </tbody>
            </table>
          </div>
        </section>
      </main>
      <div class="body"></div>
      <div class="main__profile">
        <section class="section">
          <h1 >Profile</h1>
          <div class="hide hidden">
              <span class="close-icon1"></span>
          </div>
          <div class="main">
          </div>
      </section>
    </div>
</body>
</html>