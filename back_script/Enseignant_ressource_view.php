<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/nav2.css">
    <link rel="stylesheet" href="../css/enseignant/ressource.css">
    <link rel="stylesheet" href="../css/enseignant/profile.css">
    <script src="../front_script/enseignant/dis_profile2.js" defer></script>
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
                <li><a class="menu__item" href="../templates/enseignant/general.html" autofocus> Home</a></li>
                <li><a class="menu__item" href="logout.php">Logout</a></li>
              </ul>
              <div class="header-title">
                <h2>INFO ACADEMY</h2>
              </div>
            </div>
            <nav>
            <ul>
                <li class="j"><a class="e" href="../templates/enseignant/general.html" autofocus> Home</a></li>
                <li><img id="img" src="../image/proffe.png" title="Profile"></li>
            </ul>
            </nav>
        </header>

        <div class="main_profile">
            <div class="hidden1">
            <span class="close-icon"></span>
            </div>
            <img src="../image/proffe.png" alt="">
            <div class="name"></div>
            <div class="main_button">
            <span><a href="logout.php">Logout</a></span>
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
            $query="SELECT ressources_name,upload_date FROM ressources JOIN enseignant WHERE ressources.enseignant_id=enseignant.id AND enseignant.id=$_SESSION[user_id] AND modul_id='$modul_id' AND ressources_type='$modul_type'  GROUP BY upload_date DESC";
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
                      <th class="right">DELETE</th>
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
                    <td class="right"><a  href="Enseignant_ressource_delete.php?id=<?php echo $ressources_id?> "><i class="material-icons" title="DELET">&#xE872;</i></a></td>
                  </tr>
                  <?php }
                  $conn->close();
                  ?>
                </tbody>              
              </table>
            </div>
          </section>
        </main>
    </body>
</html>