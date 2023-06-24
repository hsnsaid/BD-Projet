<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav2.css">
    <link rel="stylesheet" href="../css/cour.css">
    <link rel="stylesheet" href="../css/big_profile.css">
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
         header('location: ../login.html');
        }
        else{
        include 'db.php';
        $modul=$_GET['modul'];
        $_SESSION['modul']=$modul;
        $query="SELECT count(ressources_name) AS number,ressources_type from ressources join moduls where moduls.id=ressources.modul_id AND modul_name='$modul' GROUP BY ressources_type";
        $result=$conn->query($query);
        $response= $result->fetch_all(MYSQLI_ASSOC);
        }
        $conn->close();
        ?>            
      <main>
        <section >
          <p><?php echo"$modul"?></p>
          <div class="main_courses">
            <?php foreach($response as $row){
            if($row['ressources_type'] == 'COUR'){?>
            <section>
            <a href="Etudaint_ressource_view.php?type=COUR">
            <div class="courses">
              <img src="../image/cour.png" alt="">
              <span><?php  echo $row['ressources_type']?></span>
              <span><?php echo $row['number'] ?></span>
            </div>
            </a>
            </section>
            <?php }?>
           <?php if($row['ressources_type'] == 'TD'){?>
            <section>
            <a href="Etudaint_ressource_view.php?type=TD">
            <div class="courses">
            <img src="../image/td.png" alt="">
            <span><?php  echo $row['ressources_type']?></span>
            <span><?php echo $row['number'] ?></span>
            </div>
           </a>
            </section>
         <?PHP  }?>
          <?PHP if($row['ressources_type'] == 'TP'){?>
            <section>
            <a href="Etudaint_ressource_view.php?type=TP">
            <div class="courses">
            <img src="../image/tp.png" alt="">
              <span><?php  echo $row['ressources_type']?></span>
              <span><?php echo $row['number'] ?></span>
            </div>
          </a>
            </section>
         <?PHP }}?>
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