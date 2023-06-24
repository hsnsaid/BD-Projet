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
        <link rel="stylesheet" href="../css/admin/style1.css">
        <link rel="stylesheet" href="../css/admin/styles.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="../front_script/admin/chart.min.js"  defer></script>
        <script src="../front_script/admin/chart_bar.js" defer></script>
        <script src="../front_script/admin/chart_pie.js" defer></script>
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"  defer></script>
        <script src="../front_script/admin/general_dis_profile.js" defer></script>
        <script src="https://code.jquery.com/jquery-3.5.1.js" defer></script>
        <script src="../front_script/admin/table.js" defer></script>
        <script src="../front_script/admin/jquery.dataTables.min.js" defer></script>
    </head>
    <body>
    <div class="body"></div>
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
                $sql="SELECT enseignant_name,password,Email,modul_name,modul_niveau FROM enseignant JOIN enseigne JOIN moduls WHERE enseignant.id=enseigne.enseignant_id AND enseigne.modul_id=moduls.id ";
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
                        <a href="Admin_general.php"><button id="table">Student DataTable</button></a>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Teacher DataTable
                            </div>
                            <div class="card-body">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>modul name</th>
                                            <th>modul Level</th>
                                            <th>Delete</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach($array as $row) {?>
                                        <tr>
                                        <td><?php echo $row['enseignant_name'] ?></td>
                                        <td><?php echo $row['Email'] ?></td>
                                        <td><?php echo $row['password'] ?></td>
                                        <td><?php echo $row['modul_name'] ?></td>
                                        <td><?php echo $row['modul_niveau'] ?></td>
                                        <?php
                                            $name= $row['modul_name'] ;
                                            $niveau= $row['modul_niveau'] ;                                            
                                            $sql_id="SELECT id FROM moduls WHERE modul_name='$name' AND modul_niveau='$niveau'";
                                            $id_result=$conn->query($sql_id);
                                            $id=$id_result->fetch_array(MYSQLI_ASSOC)['id'];?>
                                        <td><a  href="Admin_delete_enseignant.php?id=<?php echo $id?> "><i class="material-icons" title="DELET">&#xE872;</i></a></td>
                                        <td><a  href="admin_update_enseignant_form.php?id=<?php echo $id ?> "><i class="material-icons edit" title="EDIT">&#xE3c9;</i></a></td>
                                        </tr>
                                        <?php }
                                        $conn->close()?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>