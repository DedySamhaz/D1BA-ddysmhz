<?php
require_once('koneksi.php');

session_start();
if (isset($_GET['out'])) {
    session_start();
    session_destroy();
    header('location: index.php');
}
?>

<!DOCTYPE html>
 <html class="no-js">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Toba &mdash; Lake</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FREEHTML5.CO" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	<meta name="author" content="FREEHTML5.CO" />

	
	<!-- css -->	
	    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	    <link href="css/style3.css" rel="stylesheet" type="text/css" media="all" />
        <link rel="stylesheet" type="text/css" href="css/page.css">
    	<link href="css/megamenu.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/stylemenuindex.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/stylelogin.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/style2.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/styletitle.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/icons.css" rel="stylesheet" type="text/css" media="all">
        <link rel="stylesheet" type="text/css" href="pagination.css">
        <link href="css/slider.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/hvr-shutter-in-vertical.css" rel="stylesheet" type="text/css" media="all">
        <link href="css/etalage.css" rel="stylesheet" type="text/css" media="all">
    	<link rel="stylesheet" href="css/etalage.css">
    

		<!-- Animate.css -->
		<link rel="stylesheet" href="css/animate.css">
		<!-- Icomoon Icon Fonts-->
		<link rel="stylesheet" href="css/icomoon.css">
		<!-- Owl Carousel -->
		<link rel="stylesheet" href="css/owl.carousel.min.css">
		<link rel="stylesheet" href="css/owl.theme.default.min.css">
		<!-- Magnific Popup -->
		<link rel="stylesheet" href="css/magnific-popup.css">
		<!-- Theme Style -->
		<link rel="stylesheet" href="css/style.css">
		<!-- Modernizr JS -->
		<script src="js/modernizr-2.6.2.min.js"></script>
		<!-- FOR IE9 below -->
		<!--[if lt IE 9]>
		<script src="js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		
	<header id="fh5co-header" role="banner">
		<nav id="mainNav" class="navbar navbar-default navbar-fixed-top" style="background:white";>

	
			<div class="container-fluid">
				<div class="navbar-header"> 
				<!-- Mobile Toggle Menu Button -->
				<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle" data-toggle="collapse" data-target="#fh5co-navbar" aria-expanded="false" aria-controls="navbar"><i></i></a>
				<a class="navbar-brand" href="index.php"><img src="images/log.png" alt="logo" style="width: 145px; margin-left: -20px; margin-top: -5px;"></a></a>
				</div>
				<div id="fh5co-navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav">        
						<li><a href="index.php"><span>Home<span class="border"></span></span></a></li>
						<li><a href="produk.php"><span>Produk <span class="border"></span></span></a></li>
						<li><a href="about.php"><span>About Us <span class="border"></span></span></a></li>
						<li><a href="keranjang.php"><span class="glyphicon glyphicon-shopping-cart"></span><span> Keranjang<span class="border"></span></span></a></li>
						
					</ul>
				  <ul class="nav navbar-nav navbar-right">
                        <li><div class="search" style="margin-top: 10px;">      
                        <form method="GET" action="cari_barang.php">
                            <input type="text" name="cari" class="textbox" placeholder="Cari Produk" onfocus="this.value = '';" 
                            onblur="if(this.value == '') {
                                       this.value = 'Cari Produk';
                                    }">
                            <input type="submit" value="Subscribe" id="submit" name="submit">
                            <div id="response"> </div>
                        </form>
                    </div>
                </li>

                     
                            <?php
                            if (!isset($_SESSION['masuk'])) {
                    echo '<li><a href="daftar.php"><span class="glyphicon glyphicon-user"></span><span> Daftar<span class="border"></span></span></a></li>
                    		<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span><span> Masuk<span class="border"></span></span></a></li>
                                                ';
                            } else {
                                echo '
                                        <li>
                                                <a class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;">' . $_SESSION['username'] .'<b class="caret"></b>
                                                    <ul class="dropdown-menu">
                                     <li class="grid"><a class="color1" href="pesanan.php">Pesanan</a></li>

                                      <li class="grid"><a class="color1" href="index.php?out">Keluar</a></li>';

                            }
                            ?>
                        
                        </ul>
                   
				</div>
			</div>
		</nav>
	</header>

