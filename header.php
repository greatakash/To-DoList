<?php include "lib/connect.php"; ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title><?=$title ?></title>
	<meta name="description" content="Commutus HTML5 premium template">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="images/commu.png">
	
	<link rel="stylesheet" href="css/googleapis-css.css" type="text/css" media="all">
	<link rel="stylesheet" href="rs-plugin/css/settings.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/icons/icons.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/core-icons/core_style.css" type="text/css" media="all"> 
	<link rel="stylesheet" href="css/scripts.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/newcss.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="all">
	
	<script type="text/javascript" src="js/modal-tab.js"></script> 
</head>

<body class="page">
	<header id="ABdev_main_header" class="clearfix ">
		<div class="container clearfix">
			<div id="logo">
				<a href="index.php">
					<img id="main_logo" src="images/logo.png" alt="Commutus">
				</a>
			</div>
			<div class="menu_wrapper">
				<div class="menu_slide_toggle">
					<div class="icon-menu"></div>
				</div>
				<div id="title_breadcrumbs_bar">
					<div class="breadcrumbs">
						<a href="index.php">Home</a>
						<i class="ci_icon-angle-right"></i> 
						<span class="current"><?php if(isset($_REQUEST['page'])){ echo $_REQUEST['page'] ; } else { echo "Welcome" ;}?></span>
					</div>
				</div>
				<nav>
					<ul>
						<li><a href="index.php"><span>Home</span></a></li>
						<li class="mega4 menu-item-has-children">
							<a href="#" class="scroll"><span>Pages</span></a>
							
						</li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
		<section id="headline_breadcrumbs_bar" class="hadline_no_image">
		<div>
			<div class="container">
				<div class="row">
					<div class="span12 left_aligned headline_title">
						<h2>
							Play With To-Do List
						</h2>
					</div>
					
				</div>
			</div>
		</div>
	</section>
	
