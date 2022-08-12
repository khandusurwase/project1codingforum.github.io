<?php

require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:admin.php');
	die();
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="icon" href="images/logoks.jpg">
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
   </head>
   <body style="background: linear-gradient(to right, #cec5cb,#cec5cb ,#f3a5dd );">
      <aside id="left-panel" class="left-panel" style="background: linear-gradient(to right, #cec5cb,#cec5cb ,#f3a5dd );" >
         <nav class="navbar navbar-expand-sm navbar-default" style="background: linear-gradient(to right, #cec5cb,#cec5cb ,#f3a5dd );" >
            <div id="main-menu" class="main-menu collapse navbar-collapse">
               <ul class="nav navbar-nav">
                  <li class="menu-title">Menu</li>
                  <li class="menu-item-has-children dropdown">
                     <a href="categories.php" > Categories Master</a>
                  </li>
                  <li class="menu-item-has-children dropdown">
                     <a href="threads.php" > Thread Master</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="comment.php" > Comment Master</a>
                  </li>
				  <li class="menu-item-has-children dropdown">
                     <a href="users.php" > User Master</a>
                  </li>			  
               </ul>
            </div>
         </nav>
      </aside>
      <div id="right-panel" class="right-panel" >
         <header id="header" class="header" style="background-color: orange;">
            <div class="top-left" >
               <div class="navbar-header">
                  <a class="navbar-brand" style="max-width: 40px; padding-top: 0.5rem; padding-bottom: 0.5rem;margin-right:0rem;" href="logout.php"><img src="images/logoks.jpg" alt="Logo"  style="max-width: 45px;"></a>
                  <a class="navbar-brand" href="logout.php" style="width: 40px;"><img src="images/Admin1.jpg" alt="Logo" style="max-width: 80px; "></a>
                  <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
               </div>
            </div>
            <div class="top-right" >
               <div class="header-menu" style="background-color: orange;" >
                  <div class="user-area dropdown float-right">
                     <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Welcome Admin</a>
                     <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i>Logout</a>
                     </div>
                  </div>
               </div>
            </div>
         </header>