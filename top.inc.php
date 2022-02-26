<?php    require('db.inc.php'); ?>


 


<!-- // if (isset($_SESSION["ROLE"])) {
//   if ((time() - $_SESSION['last_login_timestamp']) > 300)  5*60
//   {
//     header("location:logout.php");
//   } else {
//     $_SESSION['last_login_timestamp'] = time();
//   }
// } else {
// header('location:login.php');
// } -->



<!doctype html>
<html class="no-js" lang="">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/normalize.css">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="assets/css/themify-icons.css">
  <link rel="stylesheet" href="assets/css/pe-icon-7-filled.css">
  <link rel="stylesheet" href="assets/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="styles.css" />
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <!-- SideBar-Menu CSS -->
  <link rel="stylesheet" href="css/styles.css" />

  <!-- Demo CSS -->
  <link rel="stylesheet" href="css/demo.css" />


</head>

<body>


  <aside id="left-panel" class="left-panel" style="height: 0px;display: none;max-height: 0px;">
    <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
        <div class=" wrapper active">
          <div class="main_container">
            <div class="sidebar" style="z-index: 9999; background:crimson;">
              <div class="siderbar_inner">
                <ul>
                  <?php if ($_SESSION['ROLE'] == 1) { ?>
                    <li>
                      <a href="index.php" class="">
                        <span class="icon"><i class="fa fa-cubes"></i></span>
                        <span class="title">Department Master</span>
                      </a>
                    </li>
                    <li>
                      <a href="role.php" class="">
                        <span class="icon"><i class="fa fa-user-secret"></i></span>
                        <span class="title">Role Master</span>
                      </a>
                    </li>
                    <li>
                      <a href="project-name-leave.php">
                        <span class="icon"><i class="fa fa-caret-square-o-left"></i></span>
                        <span class="title">Leave Project Name Master</span>
                      </a>
                    </li>
                    <li>
                      <a href="project-name-reach.php">
                        <span class="icon"><i class="fa fa-caret-square-o-right"></i></span>
                        <span class="title">Reach Project Name Master</span>
                      </a>
                    </li>
                    <li>
                      <a href="vehicle-type.php">
                        <span class="icon"><i class="fa fa-taxi"></i></span>
                        <span class="title">Vehicle Type Master</span>
                      </a>
                    </li>
                    <li>
                      <a href="employee.php">
                        <span class="icon"><i class="fa fa-users"></i></span>
                        <span class="title">Employee Master</span>
                      </a>
                    </li>
                    <li>
                      <a href="loading-point.php">
                        <span class="icon"><i class="fa fa-truck"></i></span>
                        <span class="title">Loading Point</span>
                      </a>
                    </li>
                    <li>
                      <a href="unloading-point.php">
                        <span class="icon"><i class="fa fa-truck" style="-webkit-transform: rotateY(180deg);transform: rotateY(180deg);"></i></span>
                        <span class="title">Unloading Point</span>
                      </a>
                    </li>
                    <li>
                      <a href="diesel-loading.php">
                        <span class="icon"><i class="fa fa-tint"></i></span>
                        <span class="title">Diesel Loading</span>
                      </a>
                    </li>
                  <?php } elseif ($_SESSION['ROLE'] == 2) {
                  ?>
                    <li>
                      <a href="profile.php?id=<?php echo $_SESSION['USER_ID'] ?>">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <span class="title">Profile</span>
                      </a>
                    </li>
                    <li>
                      <a href="loading-point.php">
                        <span class="icon"><i class="fa fa-truck"></i></span>
                        <span class="title">Loading Point</span>
                      </a>
                    </li>
                    <li>
                      <a href="unloading-point.php">
                        <span class="icon"><i class="fa fa-truck" style="-webkit-transform: rotateY(180deg);transform: rotateY(180deg);"></i></span>
                        <span class="title">Unloading Point</span>
                      </a>
                    </li>
                    <li>
                      <a href="diesel-loading.php">
                        <span class="icon"><i class="fa fa-tint"></i></span>
                        <span class="title">Diesel Loading</span>
                      </a>
                    </li>
                  <?php } elseif ($_SESSION['ROLE'] == 3) {
                  ?>
                    <li>
                      <a href="profile.php?id=<?php echo $_SESSION['USER_ID'] ?>">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <span class="title">Profile</span>
                      </a>
                    </li>
                    <li>
                      <a href="loading-point.php">
                        <span class="icon"><i class="fa fa-truck"></i></span>
                        <span class="title">Loading  Point</span>
                      </a>
                    </li>
                    <li>
                      <a href="diesel-loading.php">
                        <span class="icon"><i class="fa fa-tint"></i></span>
                        <span class="title">Diesel Loading</span>
                      </a>
                    </li>
                  <?php } else {
                  ?>
                    <li>
                      <a href="profile.php?id=<?php echo $_SESSION['USER_ID'] ?>">
                        <span class="icon"><i class="fa fa-user"></i></span>
                        <span class="title">Profile</span>
                      </a>
                    </li>
                    <li>
                      <a href="unloading-point.php">
                        <span class="icon"><i class="fa fa-truck"></i></span>
                        <span class="title">Unloading Point</span>
                      </a>
                    </li>
                  <?php } ?>
                  <li>
                    <a href="logout.php">
                      <span class="icon"><i class="fa fa-sign-out"></i></span>
                      <span class="title">Logout</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
  </aside>

  <div id="right-panel" class="right-panel">
    <header id="header" class="header">
      <div class="top-left" style="background: crimson; width: 100%;">
        <div class="user-area dropdown float-center" style="padding-right: 10px;">

        <!-- <a class="navbar-brand" href="#" style="color: darkblue;font-weight: bold; "> Welcome <?php echo $_SESSION['USER_NAME'] ?> </a> -->
        <!-- <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: large;font-weight: 900;color: darkblue;text-transform: capitalize;">Welcome <?php echo $_SESSION['USER_NAME'] ?></a> -->

          <a class="navbar-brand" href="#" style="color:white;font-weight: bold;"> Economic Industries </a>
        </div>
        <div class="navbar-header">
          <a id="menuToggle" class="menutoggle"><i class="fa fa-bars" style="color: #fff;"></i></a>
        </div>
      </div>

      <div class="top-right" style="margin-top: 50px;">
        <div class="row user_area"style="margin-top: 57px;">
          <div class="col sm-4"style="text-align: center;">
            <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: large;font-weight: 900;color: black;text-transform: capitalize;">Welcome <?php echo $_SESSION['USER_NAME'] ?></a>
          </div>
          <!-- <div class="col sm-4">
            <p style="text-align: center;margin-bottom: 0px;">TimeOut In: </p><p id="countDown" style="text-align: center;">00:00</p>
          </div> -->
          <!-- <div class="header-menu">
            <div class="user-area dropdown float-right">
            </div>
          </div> -->
 

        </div>
      </div>
    </header>
  
    <!-- <script>
      window.onload = function() {
        var minute = 4;
        var sec = 60;
        setInterval(function() {
          document.getElementById("countDown").innerHTML =
            minute + " : " + sec;
          sec--;
          if (sec == 00) {
            minute--;
            sec = 60;
            if (minute == -1 && sec == 60) {
              window.location = 'logout.php';
              window.location.reload();
            }
          }
        }, 1000);
      };
    </script> -->

    <style>
      .fa {
        width: 20px;
        height: 18px;
      }


      
    </style>