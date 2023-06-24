<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="stylesheet" href="../css/admin/style1.css">
        <link rel="stylesheet" href="../css/nav2.css">
        <link rel="stylesheet" href="../css/enseignant/profile.css">
        <link rel="stylesheet" href="../css/admin/styles.css">
        <script src="../front_script/admin/general_dis_profile.js" defer></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="../front_script/admin/chart.min.js"  defer></script>
        <script src="../front_script/admin/chart_bar.js" defer></script>
        <script src="../front_script/admin/chart_pie.js" defer></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"  defer></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
        <script src="../front_script/admin/table.js" defer></script>
        <script src="../front_script/admin/jquery.dataTables.min.js" defer></script>
    </head>
    <body>
      <div class="body"></div>
        <header >
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
              $sql="SELECT Etudiant_name,niveau,Etudiant_Group,date_of_birth,Place_of_birth,password FROM etudiant";
              $result=$conn->query($sql);
              $array=$result->fetch_all(MYSQLI_ASSOC);
              }
          ?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <main>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-pie me-1"></i>
                                    Pie Chart
                                </div>
                                <div class="card-body"><canvas id="myPieChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-chart-bar me-1"></i>
                                    Bar Chart
                                </div>
                                <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                            </div>
                        </div>
                    </div>
                    <a href="Admin_ganeral_enseignant.php"><button id="table">Teacher DataTable</button></a>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Student DataTable
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Level</th>
                                        <th>Etudiant_Group</th>
                                        <th>Date_of_birth</th>
                                        <th>Place_of_birth</th>
                                        <th>Password</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($array as $row) {?>
                                        <tr>
                                            <td><?php echo $row['Etudiant_name'] ?></td>
                                            <td><?php echo $row['niveau'] ?></td>
                                            <td><?php echo $row['Etudiant_Group'] ?></td>
                                            <td><?php echo $row['date_of_birth'] ?></td>
                                            <td><?php echo $row['Place_of_birth'] ?></td>
                                            <td><?php echo $row['password'] ?></td>

                                            <?php
                                            $user_name= $row['Etudiant_name'] ;
                                            $level= $row['niveau'];
                                            $sql_id="SELECT id FROM etudiant WHERE Etudiant_name ='$user_name' AND niveau='$level'";
                                            $id_result=$conn->query($sql_id);
                                            $user_id=$id_result->fetch_array(MYSQLI_ASSOC)['id'];?>
                                            <td><a  href="admin_delete_user.php?id=<?php echo $user_id ?> "><i class="material-icons" title="DELET">&#xE872;</i></a>&nbsp;&nbsp;</td>
                                            <td><a  href="admin_update_etudaint_form.php?id=<?php echo $user_id ?> "><i class="material-icons edit" title="EDIT">&#xE3c9;</i></a></td>                                        
                                      </tr>
                                    <?php }
                                    $conn->close()?>
                                </tbody>
                            </table>
                        </div>
                        <main class="main_edit">
                            <div class="login">
                                <div class="hidden2">
                                    <span class="close-icon1"></span>
                                </div>
                                <form action="" method="post" class="form">
                                    <div class="user">
                                        <input type="text" name="name" required >
                                        <label>Username</label>
                                    </div>
                                    <div class="user">
                                        <input type="password" name="password" required>
                                        <label>Password</label>
                                    </div>
                                    <div class="user">
                                        <select name="niveau" id="">
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
                                        <label class="date">Level</label>
                                    </div>
                                    <div class="user">
                                        <input type="text" name="Etudiant_Group" required >
                                        <label>Group</label>
                                    </div>
                                    <div class="user">
                                        <input type="date" name="date_of_birth" required>
                                        <label class="date">Date of Birth</label>
                                    </div>
                                    <div class="user">
                                        <input type="text" name="Place_of_birth" required >
                                        <label>Place of Birth</label>
                                    </div>
                                    <input class="submit" type="submit" name="submit" value="EDIT">
                                </form>
                            </div>
                        </main>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>