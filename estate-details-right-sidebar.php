<?php
session_start();

include 'BDD.php';

class viewProperty
{
    private $propertyId;
    private $bdd;

    public function __construct($bdd,$propertyId)
    {
        $this->bdd = $bdd;
        $this->propertyId = $propertyId;
    }

    public function getProperty()
    {
        $sql = "SELECT * FROM properties WHERE id = :id";
        $params = ['id' => $this->propertyId];
        $stmt = $this->bdd->bdQuery($sql, $params);
        return $stmt->fetch();
    }

    public function getAgent($idAgent)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $params = ['id' => $idAgent];
        $stmt = $this->bdd->bdQuery($sql, $params);
        return $stmt->fetch();
    }

    public function getProperties($idAgent)
    {
        $sql = "SELECT * FROM properties WHERE users_id = :id";
        $params = ['id' => $idAgent];
        $stmt = $this->bdd->bdQuery($sql, $params);
        return $stmt->fetchAll();
    }
}

if (isset($_POST["view-property"])) {
    $propertyId = $_POST["view-property"];
    $bdd = new BDD();
    $viewProperty = new viewProperty($bdd,$propertyId);
    echo $propertyId;
} else {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
	<title>Apartment - Premium Real Estate HMTL Site Template</title>
	<meta name="keywords" content="Download, Apartment, Premium, Real Estate, HMTL, Site Template, property, mortgage, CSS" />
	<meta name="description" content="Download Apartment - Premium Real Estate HMTL Site Template" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">    
	<!-- Font awesome styles -->    
	<link rel="stylesheet" href="apartment-font/css/font-awesome.min.css">  
	<!-- Custom styles -->
	<link rel='stylesheet' type='text/css' href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,500italic,700,700italic&amp;subset=latin,latin-ext'>
	<link rel="stylesheet" type="text/css" href="css/plugins.css">
    <link rel="stylesheet" type="text/css" href="css/apartment-layout.css">
    <link id="skin" rel="stylesheet" type="text/css" href="css/apartment-colors-blue.css">
	
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>
<body>
<div class="loader-bg"></div>
<div id="wrapper">

<!-- Page header -->	
	<header>
		<div class="top-bar-wrapper">
			<div class="container top-bar">
				<div class="row">
					<div class="col-xs-5 col-sm-8">
						<div class="top-mail pull-left hidden-xs">
							<span class="top-icon-circle">
								<i class="fa fa-envelope fa-sm"></i>
							</span>
							<span class="top-bar-text">apartment@domain.tld</span>
						</div>
						<div class="top-phone pull-left hidden-xxs">
							<span class="top-icon-circle">
								<i class="fa fa-phone"></i>
							</span>
							<span class="top-bar-text">(0)-123-456-789</span>
						</div>
						<div class="top-localization pull-left hidden-sm hidden-md hidden-xs">
							<span class="top-icon-circle pull-left">
								<i class="fa fa-map-marker"></i>
							</span>
							<span class="top-bar-text">One Brookings Drive St. Louis, Missouri 63130-4899, USA</span>
						</div>
					</div>
					<div class="col-xs-7 col-sm-4">
						<div class="top-social-last top-dark pull-right" data-toggle="tooltip" data-placement="bottom" title="Login/Register">
							<a class="top-icon-circle" href="#login-modal" data-toggle="modal">
								<i class="fa fa-lock"></i>
							</a>
						</div>
						
						<div class="top-social pull-right">
							<a class="top-icon-circle" href="#">
								<i class="fa fa-facebook"></i>
							</a>
						</div>
						<div class="top-social pull-right">
							<a class="top-icon-circle" href="#">
								<i class="fa fa-twitter"></i>
							</a>
						</div>
						<div class="top-social pull-right">
							<a class="top-icon-circle" href="#">
								<i class="fa fa-google-plus"></i>
							</a>
						</div>
						<div class="top-social pull-right">
							<a class="top-icon-circle" href="#">
								<i class="fa fa-skype"></i>
							</a>
						</div>
					</div>
				</div>
			</div><!-- /.top-bar -->	
		</div><!-- /.Page top-bar-wrapper -->	
		<nav class="navbar main-menu-cont">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar icon-bar1"></span>
						<span class="icon-bar icon-bar2"></span>
						<span class="icon-bar icon-bar3"></span>
					</button>
					<a href="index.php" title="" class="navbar-brand">
						<img src="images/logo-dark.png" alt="Apartment - Premium Real Estate Template" />
					</a>
				</div>
				<div id="navbar" class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="index.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home</a>
							<ul class="dropdown-menu">
								<li><a href="index.php">Homepage 1 - slider</a></li>
								<li><a href="index-map.html">Homepage 1 - map</a></li>
								<li><a href="index2.html">Homepage 2 - slider</a></li>
								<li><a href="index2-map.html">Homepage 2 - map</a></li>
								<li><a href="index3.html">One Page Single Propery - slider</a></li>
								<li><a href="index3-street-view.html">One Page Single Propery - panorama!</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listings</a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a tabindex="-1" href="listing-grid-right-sidebar.html">Grid Listing</a>
									<ul class="dropdown-menu">
										<li><a href="listing-grid-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="listing-grid-left-sidebar.html">Left Sidebar</a></li>
										<li><a href="listing-grid-no-sidebar.html">No Sidebar</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="listing-masonry-right-sidebar.html">Masonry Listing</a>
									<ul class="dropdown-menu">
										<li><a href="listing-masonry-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="listing-masonry-left-sidebar.html">Left Sidebar</a></li>
										<li><a href="listing-masonry-no-sidebar.html">No Sidebar</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="listing-list-right-sidebar.html">Classic Listing</a>
									<ul class="dropdown-menu">
										<li><a href="listing-list-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="listing-list-left-sidebar.html">Left Sidebar</a></li>
										<li><a href="listing-list-no-sidebar.html">No Sidebar</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="estate-details-right-sidebar.html">Single Property</a>
									<ul class="dropdown-menu">
										<li><a href="estate-details-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="estate-details-left-sidebar.html">Left Sidebar</a></li>
										<li><a href="estate-details-no-sidebar.html">No Sidebar</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Agencies</a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a tabindex="-1" href="agencies-listing-right-sidebar.html">Agencies Listing</a>
									<ul class="dropdown-menu">
										<li><a href="agencies-listing-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="agencies-listing-left-sidebar.html">Left Sidebar</a></li>
										<li><a href="agencies-listing-no-sidebar.html">No Sidebar</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="agency-details-right-sidebar.html">Agency Details</a>
									<ul class="dropdown-menu">
										<li><a href="agency-details-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="agency-details-left-sidebar.html">Left Sidebar</a></li>
										<li><a href="agency-details-no-sidebar.html">No Sidebar</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="agents-right-sidebar.html">Agents List</a>
									<ul class="dropdown-menu">
										<li><a href="agents-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="agents-left-sidebar.html">Left Sidebar</a></li>
										<li><a href="agents-no-sidebar.html">No Sidebar</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="agent-right-sidebar.html">Agent Details</a>
									<ul class="dropdown-menu">
										<li><a href="agent-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="agent-left-sidebar.html">Left Sidebar</a></li>
										<li><a href="agent-no-sidebar.html">No Sidebar</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a tabindex="-1" href="typography-no-sidebar.html">Typography &amp; Elements</a>
									<ul class="dropdown-menu">
										<li><a href="typography-no-sidebar.html">No Sidebar</a></li>
										<li><a href="typography-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="typography-left-sidebar.html">Left Sidebar</a></li>
									</ul>
								</li>
								<li><a href="404.html">Error 404</a></li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="rtl-index.html">RTL Pages</a>
									<ul class="dropdown-menu">
									  <li><a href="rtl-index.html">RTL Homepage</a></li>
									  <li><a href="rtl-page.html">RTL Estate details</a></li>
									</ul>
								</li>
								<li role="separator" class="divider"></li>
								<li><a href="#login-modal" data-toggle="modal">Login</a></li>
								<li><a href="#register-modal" data-toggle="modal">Register</a></li>
								<li><a href="#forgot-modal" data-toggle="modal">Forgotten Password</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="my-offers.php">My account - Offers</a></li>
								<li><a href="my-profile.php">My account - Profile</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
							<ul class="dropdown-menu">
								<li><a href="archive-grid.html">Default Grid</a></li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="archive-grid2-right-sidebar.html">Masonry Grid</a>
									<ul class="dropdown-menu">
										<li><a href="archive-grid2-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="archive-grid2-left-sidebar.html">Left Sidebar</a></li>
										<li><a href="archive-grid2-no-sidebar.html">No Sidebar</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="archive-right-sidebar.html">Classic List</a>
									<ul class="dropdown-menu">
										<li><a href="archive-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="archive-left-sidebar.html">Left Sidebar</a></li>
										<li><a href="archive-no-sidebar.html">No Sidebar</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="blog-right-sidebar.html">Single Post</a>
									<ul class="dropdown-menu">
										<li><a href="blog-right-sidebar.html">Right Sidebar</a></li>
										<li><a href="blog-left-sidebar.html">Left Sidebar</a></li>
										<li><a href="blog-no-sidebar.html">No Sidebar</a></li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact Us</a>
							<ul class="dropdown-menu">
								<li><a href="contact1.html">Contact version 1</a></li>
								<li><a href="contact2.html">Contact version 2</a></li>
							</ul>
						</li>
						<li><a href="submit-property.php" class="special-color">Submit property</a></li>
					</ul>
				</div>
			</div>
		</nav><!-- /.mani-menu-cont -->	
    </header>
	
  			
    <section class="section-dark no-padding">
		<!-- Slider main container -->
		<div id="swiper-gallery" class="swiper-container">
			<!-- Additional required wrapper -->
			<div class="swiper-wrapper">
				<!-- Slides -->
                <?php

                for ($i = 1; $i <= 4; $i++)
                echo '
                        <div class="swiper-slide">
                            <div class="slide-bg swiper-lazy" data-background="images/slides/1.jpg" data-sub-html="<strong>this is a caption 1</strong><br/>Second line of the caption"></div>
                            <!-- Preloader image -->
                            <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-9 col-lg-8 slide-desc-col animated fadeInUp gallery-slide-desc-1">
                                        <div class="gallery-slide-cont">
                                            <div class="gallery-slide-cont-inner">    
                                                <div class="gallery-slide-title pull-right">
                                                    <h5 class="subtitle-margin">apartments for sale</h5>
                                                    <h3>' . $viewProperty->getProperty()['title'] . '<span class="special-color">.</span></h3>
                                                </div>
                                                <div class="gallery-slide-estate pull-right hidden-xs">
                                                    <i class="fa fa-home"></i>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="gallery-slide-desc-price pull-right">
                                                $' . $viewProperty->getProperty()['price'] . '
                                            </div>    
                                            <div class="clearfix"></div>
                                        </div>    
                                    </div>            
                                </div>
                            </div>
                        </div>
                    ';

                ?>
			</div>
			
			<div class="slide-buttons slide-buttons-center">
				<a href="#" class="navigation-box navigation-box-next slide-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
				<div id="slide-more-cont"></div>
				<a href="#" class="navigation-box navigation-box-prev slide-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
			</div>
			
		</div>
		
    </section>
    <section class="thumbs-slider section-both-shadow">
        <div class="container">
            <div class="row">
                <div class="col-xs-1">
                    <a href="#" class="thumb-box thumb-prev pull-left"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
                </div>
                <div class="col-xs-10">
                    <!-- Slider main container -->
                    <div id="swiper-thumbs" class="swiper-container">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php for ($i = 0; $i < 4; $i++): ?>
                                <div class="swiper-slide">
                                    <img class="slide-thumb" src="images/slides/m3.jpg" alt="">
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
                <div class="col-xs-1">
                    <a href="#" class="thumb-box thumb-next pull-right"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
                </div>
            </div>
        </div>
    </section>
    <section class="section-light no-bottom-padding">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-9">
					<div class="row">
						<div class="col-xs-12 col-sm-7 col-md-8">
							<div class="details-image pull-left hidden-xs">
								<i class="fa fa-home"></i>
							</div>
							<div class="details-title pull-left">
								<h5 class="subtitle-margin">apartment for sale</h5>
								<h3><?php echo $viewProperty->getProperty()['title']; ?><span class="special-color">.</span></h3>
							</div>
							<div class="clearfix"></div>	
							<div class="title-separator-primary"></div>
							<p class="details-desc"><?php echo $viewProperty->getProperty()['desc1']; ?></p>
						</div>
						<div class="col-xs-12 col-sm-5 col-md-4">
							<div class="details-parameters-price">$<?php echo $viewProperty->getProperty()['price']; ?></div>
							<div class="details-parameters">
								<div class="details-parameters-cont">
									<div class="details-parameters-name">area</div>
									<div class="details-parameters-val"><?php echo $viewProperty->getProperty()['superficie']; ?>m<sup>2</sup></div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont">
									<div class="details-parameters-name">bedrooms</div>
									<div class="details-parameters-val"><?php echo $viewProperty->getProperty()['totroom']; ?></div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont">
									<div class="details-parameters-name">bathrooms</div>
									<div class="details-parameters-val"><?php echo $viewProperty->getProperty()['nroom']; ?></div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont">
									<div class="details-parameters-name">parking places</div>
									<div class="details-parameters-val">2</div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont">
									<div class="details-parameters-name">Lorem</div>
									<div class="details-parameters-val">nostrud</div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont">
									<div class="details-parameters-name">Ipsum</div>
									<div class="details-parameters-val">tempor</div>
									<div class="clearfix"></div>	
								</div>
								<div class="details-parameters-cont details-parameters-cont-last">
									<div class="details-parameters-name">Consectetur</div>
									<div class="details-parameters-val">eiusmod</div>
									<div class="clearfix"></div>	
								</div>
							</div>
						</div>
					</div>
					<div class="row margin-top-45">
						<div class="col-xs-6 col-sm-4">
							<ul class="details-ticks">
								<li><i class="jfont">&#xe815;</i>Air conditioning</li>
								<li><i class="jfont">&#xe815;</i>Internet</li>
								<li><i class="jfont">&#xe815;</i>Cable TV</li>
								<li><i class="jfont">&#xe815;</i>Balcony</li>
							</ul>
						</div>
						<div class="col-xs-6 col-sm-4">
							<ul class="details-ticks">
								<li><i class="jfont">&#xe815;</i>Garage</li>
								<li><i class="jfont">&#xe815;</i>Lift</li>
								<li><i class="jfont">&#xe815;</i>High standard</li>
								<li><i class="jfont">&#xe815;</i>City Centre</li>
							</ul>
						
						</div>
						<div class="col-xs-6 col-sm-4">
							<ul class="details-ticks">
								<li><i class="jfont">&#xe815;</i>nostrud exercitation</li>
								<li><i class="jfont">&#xe815;</i>nostrud exercitation</li>
								<li><i class="jfont">&#xe815;</i>nostrud exercitation</li>
								<li><i class="jfont">&#xe815;</i>nostrud exercitation</li>
							</ul>
						</div>
					</div>
					<div class="row margin-top-45">
						<div class="col-xs-12 apartment-tabs">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation" class="active">
									<a href="#tab-map" aria-controls="tab-map" role="tab" data-toggle="tab">
										<span>Map</span>
										<div class="button-triangle2"></div>
									</a>
								</li>
								<li role="presentation">
									<a href="#tab-street-view" aria-controls="tab-street-view" role="tab" data-toggle="tab">
										<span>Street view</span>
										<div class="button-triangle2"></div>
									</a>
								</li>
							</ul>
								<!-- Tab panes -->
							<div class="tab-content">
								<div role="tabpanel" class="tab-pane active" id="tab-map">
									<div id="estate-map" class="details-map"></div>
								</div>
								<div role="tabpanel" class="tab-pane" id="tab-street-view">
									<div id="estate-street-view" class="details-map"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="row margin-top-60">
						<div class="col-xs-12">
							<h3 class="title-negative-margin">contact the agent<span class="special-color">.</span></h3>
							<div class="title-separator-primary"></div>
						</div>
					</div>
					<div class="row margin-top-60">
						<div class="col-xs-8 col-xs-offset-2 col-sm-3 col-sm-offset-0">
							<h5 class="subtitle-margin">Agent</h5>
							<h3 class="title-negative-margin"><?php echo $viewProperty->getAgent($viewProperty->getProperty()['users_id'])['firstname']; ?> <?php echo $viewProperty->getAgent($viewProperty->getProperty()['users_id'])['lastname']; ?><span class="special-color">.</span></h3>
							<a href="agent-right-sidebar.html" class="agent-photo">
								<img src="images/agent3.jpg" alt="" class="img-responsive" />
							</a>
						</div>
						<div class="col-xs-12 col-sm-9">
							<div class="agent-social-bar">
								<div class="pull-left">
									<span class="agent-icon-circle">
										<i class="fa fa-phone"></i>
									</span>
									<span class="agent-bar-text"><?php echo $viewProperty->getAgent($viewProperty->getProperty()['users_id'])['phone']; ?></span>
								</div>
								<div class="pull-left">
									<span class="agent-icon-circle">
										<i class="fa fa-envelope fa-sm"></i>
									</span>
									<span class="agent-bar-text"><?php echo $viewProperty->getAgent($viewProperty->getProperty()['users_id'])['email']; ?></span>
								</div>
								<div class="pull-right">
									<div class="pull-right">
										<a class="agent-icon-circle" href="#">
											<i class="fa fa-facebook"></i>
										</a>
									</div>
									<div class="pull-right">
										<a class="agent-icon-circle icon-margin" href="#">
											<i class="fa fa-twitter"></i>
										</a>
									</div>
									<div class="pull-right">
										<a class="agent-icon-circle icon-margin" href="#">
											<i class="fa fa-google-plus"></i>
										</a>
									</div>
									<div class="pull-right">
										<a class="agent-icon-circle icon-margin" href="#">
											<i class="fa fa-skype"></i>
										</a>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
							<form name="contact-from" action="#">
								<input name="name" type="text" class="input-short main-input" placeholder="Your name" />
								<input name="phone" type="text" class="input-short pull-right main-input" placeholder="Your phone" />
								<input name="mail" type="email" class="input-full main-input" placeholder="Your email" />
								<textarea name="message" class="input-full agent-textarea main-input" placeholder="Your question"></textarea>
								<div class="form-submit-cont">
									<a href="#" class="button-primary pull-right">
										<span>send</span>
										<div class="button-triangle"></div>
										<div class="button-triangle2"></div>
										<div class="button-icon"><i class="fa fa-paper-plane"></i></div>
									</a>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
					
					<div class="row margin-top-90">
						<div class="col-xs-12 col-sm-9">
							<h5 class="subtitle-margin">hot</h5>
									<h1>new listings<span class="special-color">.</span></h1>
						</div>
						<div class="col-xs-12 col-sm-3">
							<a href="#" class="navigation-box navigation-box-next" id="short-offers-owl-next"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe802;</i></div></a>
							<a href="#" class="navigation-box navigation-box-prev" id="short-offers-owl-prev"><div class="navigation-triangle"></div><div class="navigation-box-icon"><i class="jfont">&#xe800;</i></div></a>
						</div>
						<div class="col-xs-12">
							<div class="title-separator-primary"></div>
						</div>
					</div>
					
					<div class="short-offers-container">
						<div class="owl-carousel" id="short-offers-owl">

                            <?php
                            for ($i = 0; $i < 3; $i++) {
                            echo '
                                <div class="grid-offer-col">
                                    <div class="grid-offer">
                                        <div class="grid-offer-front">
                                            <div class="grid-offer-photo">
                                                <img src="images/grid-offer1.jpg" alt="" />
                                                <div class="type-container">
                                                    <div class="estate-type">apartment</div>
                                                    <div class="transaction-type">sale</div>
                                                </div>
                                            </div>
                                            <div class="grid-offer-text">
                                                <i class="fa fa-map-marker grid-offer-localization"></i>
                                                <div class="grid-offer-h4"><h4 class="grid-offer-title">' . $viewProperty->getProperties($viewProperty->getAgent($viewProperty->getProperty()['users_id'])['id'])[$i]['title'] . '</h4></div>
                                                <div class="clearfix"></div>
                                                <p>' . $viewProperty->getProperties($viewProperty->getAgent($viewProperty->getProperty()['users_id'])['id'])[$i]['desc1'] . '</p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="price-grid-cont">
                                                <div class="grid-price-label pull-left">Price:</div>
                                                <div class="grid-price pull-right">
                                                    $ ' . $viewProperty->getProperties($viewProperty->getAgent($viewProperty->getProperty()['users_id'])['id'])[$i]['price'] . '
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="grid-offer-params">
                                                <div class="grid-area">
                                                    <img src="images/area-icon.png" alt="" />' . $viewProperty->getProperties($viewProperty->getAgent($viewProperty->getProperty()['users_id'])['id'])[$i]['superficie'] . 'm<sup>2</sup>
                                                </div>
                                                <div class="grid-rooms">
                                                    <img src="images/rooms-icon.png" alt="" />' . $viewProperty->getProperties($viewProperty->getAgent($viewProperty->getProperty()['users_id'])['id'])[$i]['totroom'] . '
                                                </div>
                                                <div class="grid-baths">
                                                    <img src="images/bathrooms-icon.png" alt="" />' . $viewProperty->getProperties($viewProperty->getAgent($viewProperty->getProperty()['users_id'])['id'])[$i]['nroom'] . '
                                                </div>
                                            </div>
                                        </div>
                                        <div class="grid-offer-back">
                                            <div id="grid-map1" class="grid-offer-map"></div>
                                            <div class="button">
                                                <form action="estate-details-right-sidebar.php" method="post">
                                                    <input type="hidden" name="view-property" value="' . $viewProperty->getProperties($viewProperty->getAgent($viewProperty->getProperty()['users_id'])['id'])[$i]['id'] . '">
                                                    <button type="submit" class="button-primary">
                                                        <span>read more</span>
                                                        <div class="button-triangle"></div>
                                                        <div class="button-triangle2"></div>
                                                        <div class="button-icon"><i class="fa fa-search"></i></div>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';}
                            ?>

								<div class="grid-offer-col">
									<div class="grid-offer">
										<div class="grid-offer-front">
											<div class="grid-offer-photo">
												<img src="images/grid-offer2.jpg" alt="" />
												<div class="type-container">
													<div class="estate-type">apartment</div>
													<div class="transaction-type">sale</div>
												</div>
											</div>
											<div class="grid-offer-text">
												<i class="fa fa-map-marker grid-offer-localization"></i>
												<div class="grid-offer-h4"><h4 class="grid-offer-title">West Fourth Street, New York 10003, USA</h4></div>
												<div class="clearfix"></div>
												<p>Lorem ipsum dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et [...]</p>
												<div class="clearfix"></div>
											</div>
											<div class="price-grid-cont">
												<div class="grid-price-label pull-left">Price:</div>
												<div class="grid-price pull-right">
													$ 299 000
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="grid-offer-params">
												<div class="grid-area">
													<img src="images/area-icon.png" alt="" />48m<sup>2</sup>
												</div>
												<div class="grid-rooms">
													<img src="images/rooms-icon.png" alt="" />2
												</div>
												<div class="grid-baths">
													<img src="images/bathrooms-icon.png" alt="" />1
												</div>							
											</div>	
										</div>
										<div class="grid-offer-back">
											<div id="grid-map2" class="grid-offer-map"></div>
											<div class="button">	
												<a href="estate-details-right-sidebar.html" class="button-primary">
													<span>read more</span>
													<div class="button-triangle"></div>
													<div class="button-triangle2"></div>
													<div class="button-icon"><i class="fa fa-search"></i></div>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="grid-offer-col">
									<div class="grid-offer">
										<div class="grid-offer-front">
											<div class="grid-offer-photo">
												<img src="images/grid-offer3.jpg" alt="" />
												<div class="type-container">
													<div class="estate-type">apartment</div>
													<div class="transaction-type">sale</div>
												</div>
											</div>
											<div class="grid-offer-text">
												<i class="fa fa-map-marker grid-offer-localization"></i>
												<div class="grid-offer-h4"><h4 class="grid-offer-title">E. Elwood St. Phoenix, AZ 85034, USA</h4></div>
												<div class="clearfix"></div>
												<p>Lorem ipsum dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et [...]</p>
												<div class="clearfix"></div>
											</div>
											<div class="price-grid-cont">
												<div class="grid-price-label pull-left">Price:</div>
												<div class="grid-price pull-right">
													$ 400 000
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="grid-offer-params">
												<div class="grid-area">
													<img src="images/area-icon.png" alt="" />93m<sup>2</sup>
												</div>
												<div class="grid-rooms">
													<img src="images/rooms-icon.png" alt="" />4
												</div>
												<div class="grid-baths">
													<img src="images/bathrooms-icon.png" alt="" />2
												</div>							
											</div>	
										</div>
										<div class="grid-offer-back">
											<div id="grid-map3" class="grid-offer-map"></div>
											<div class="button">	
												<a href="estate-details-right-sidebar.html" class="button-primary">
													<span>read more</span>
													<div class="button-triangle"></div>
													<div class="button-triangle2"></div>
													<div class="button-icon"><i class="fa fa-search"></i></div>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="grid-offer-col">
									<div class="grid-offer">
										<div class="grid-offer-front">
											<div class="grid-offer-photo">
												<img src="images/grid-offer4.jpg" alt="" />
												<div class="type-container">
													<div class="estate-type">house</div>
													<div class="transaction-type">sale</div>
												</div>
											</div>
											<div class="grid-offer-text">
												<i class="fa fa-map-marker grid-offer-localization"></i>
												<div class="grid-offer-h4"><h4 class="grid-offer-title">N. Willamette Blvd., Portland, OR 97203, USA</h4></div>
												<div class="clearfix"></div>
												<p>Lorem ipsum dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et [...]</p>
												<div class="clearfix"></div>
											</div>
											<div class="price-grid-cont">
												<div class="grid-price-label pull-left">Price:</div>
												<div class="grid-price pull-right">
													$ 800 000
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="grid-offer-params">
												<div class="grid-area">
													<img src="images/area-icon.png" alt="" />300m<sup>2</sup>
												</div>
												<div class="grid-rooms">
													<img src="images/rooms-icon.png" alt="" />8
												</div>
												<div class="grid-baths">
													<img src="images/bathrooms-icon.png" alt="" />3
												</div>							
											</div>	
										</div>
										<div class="grid-offer-back">
											<div id="grid-map4" class="grid-offer-map"></div>
											<div class="button">	
												<a href="estate-details-right-sidebar.html" class="button-primary">
													<span>read more</span>
													<div class="button-triangle"></div>
													<div class="button-triangle2"></div>
													<div class="button-icon"><i class="fa fa-search"></i></div>
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="grid-offer-col">
									<div class="grid-offer">
										<div class="grid-offer-front">
											<div class="grid-offer-photo">
												<img src="images/grid-offer5.jpg" alt="" />
												<div class="type-container">
													<div class="estate-type">apartment</div>
													<div class="transaction-type">sale</div>
												</div>
											</div>
											<div class="grid-offer-text">
												<i class="fa fa-map-marker grid-offer-localization"></i>
												<div class="grid-offer-h4"><h4 class="grid-offer-title">One Brookings Drive St. Louis, Missouri 63130, USA</h4></div>
												<div class="clearfix"></div>
												<p>Lorem ipsum dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et [...]</p>
												<div class="clearfix"></div>
											</div>
											<div class="price-grid-cont">
												<div class="grid-price-label pull-left">Price:</div>
												<div class="grid-price pull-right">
													$ 320 000
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="grid-offer-params">
												<div class="grid-area">
													<img src="images/area-icon.png" alt="" />50m<sup>2</sup>
												</div>
												<div class="grid-rooms">
													<img src="images/rooms-icon.png" alt="" />2
												</div>
												<div class="grid-baths">
													<img src="images/bathrooms-icon.png" alt="" />1
												</div>							
											</div>	
										</div>
										<div class="grid-offer-back">
											<div id="grid-map5" class="grid-offer-map"></div>
											<div class="button">	
												<a href="estate-details-right-sidebar.html" class="button-primary">
													<span>read more</span>
													<div class="button-triangle"></div>
													<div class="button-triangle2"></div>
													<div class="button-icon"><i class="fa fa-search"></i></div>
												</a>
											</div>
										</div>
									</div>
								</div>
							<div class="grid-offer-col">
								<div class="grid-offer">
									<div class="grid-offer-front">
										<div class="grid-offer-photo">
											<img src="images/grid-offer7.jpg" alt="" />
											<div class="type-container">
												<div class="estate-type">house</div>
												<div class="transaction-type">sale</div>
											</div>
										</div>
										<div class="grid-offer-text">
											<i class="fa fa-map-marker grid-offer-localization"></i>
											<div class="grid-offer-h4"><h4 class="grid-offer-title">One Neumann Drive Aston, Philadelphia 19014, USA</h4></div>
											<div class="clearfix"></div>
											<p>Lorem ipsum dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et [...]</p>
											<div class="clearfix"></div>
										</div>
										<div class="price-grid-cont">
											<div class="grid-price-label pull-left">Price:</div>
											<div class="grid-price pull-right">
												$ 500 000
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="grid-offer-params">
											<div class="grid-area">
												<img src="images/area-icon.png" alt="" />210m<sup>2</sup>
											</div>
											<div class="grid-rooms">
												<img src="images/rooms-icon.png" alt="" />6
											</div>
											<div class="grid-baths">
												<img src="images/bathrooms-icon.png" alt="" />2
											</div>							
										</div>	
									</div>
									<div class="grid-offer-back">
										<div id="grid-map6" class="grid-offer-map"></div>
										<div class="button">	
											<a href="estate-details-right-sidebar.html" class="button-primary">
												<span>read more</span>
												<div class="button-triangle"></div>
												<div class="button-triangle2"></div>
												<div class="button-icon"><i class="fa fa-search"></i></div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="margin-top-45"></div>
				</div>
				<div class="col-xs-12 col-md-3">
					<div class="sidebar">
						<h3 class="sidebar-title">narrow search<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						
						<div class="sidebar-select-cont">
							<select name="transaction1" class="bootstrap-select" title="Transaction:" multiple>
								<option>For sale</option>
								<option>For rent</option>
							</select>
							<select name="conuntry1" class="bootstrap-select" title="Country:" multiple data-actions-box="true">
								<option>United States</option>
								<option>Canada</option>
								<option>Mexico</option>
							</select>
							<select name="city1" class="bootstrap-select" title="City:" multiple data-actions-box="true">
								<option>New York</option>
								<option>Los Angeles</option>
								<option>Chicago</option>
								<option>Houston</option>
								<option>Philadelphia</option>
								<option>Phoenix</option>
								<option>Washington</option>
								<option>Salt Lake Cty</option>
								<option>Detroit</option>
								<option>Boston</option>
							</select>					
							<select name="location1" class="bootstrap-select" title="Location:" multiple data-actions-box="true">
								<option>Some location 1</option>
								<option>Some location 2</option>
								<option>Some location 3</option>
								<option>Some location 4</option>
							</select>
						</div>
							<div class="adv-search-range-cont">	
								<label for="slider-range-price-sidebar-value" class="adv-search-label">Price:</label>
								<span>$</span>
								<input type="text" id="slider-range-price-sidebar-value" readonly class="adv-search-amount">
								<div class="clearfix"></div>
								<div id="slider-range-price-sidebar" data-min="0" data-max="300000" class="slider-range"></div>
							</div>
							<div class="adv-search-range-cont">	
								<label for="slider-range-area-sidebar-value" class="adv-search-label">Area:</label>
								<span>m<sup>2</sup></span>
								<input type="text" id="slider-range-area-sidebar-value" readonly class="adv-search-amount">
								<div class="clearfix"></div>
								<div id="slider-range-area-sidebar" data-min="0" data-max="180" class="slider-range"></div>
							</div>
							<div class="adv-search-range-cont">	
								<label for="slider-range-bedrooms-sidebar-value" class="adv-search-label">Bedrooms:</label>
								<input type="text" id="slider-range-bedrooms-sidebar-value" readonly class="adv-search-amount">
								<div class="clearfix"></div>
								<div id="slider-range-bedrooms-sidebar" data-min="1" data-max="10" class="slider-range"></div>
							</div>
							<div class="adv-search-range-cont">	
								<label for="slider-range-bathrooms-sidebar-value" class="adv-search-label">Bathrooms:</label>
								<input type="text" id="slider-range-bathrooms-sidebar-value" readonly class="adv-search-amount">
								<div class="clearfix"></div>
								<div id="slider-range-bathrooms-sidebar" data-min="1" data-max="4" class="slider-range"></div>
							</div>
						<div class="sidebar-search-button-cont">
							<a href="#" class="button-primary">
								<span>search</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-search"></i></div>
							</a>
						</div>
						<div class="sidebar-title-cont">
							<h4 class="sidebar-title">featured offers<span class="special-color">.</span></h4>
							<div class="title-separator-primary"></div>
						</div>
						<div class="sidebar-featured-cont">
							<div class="sidebar-featured">
								<a class="sidebar-featured-image" href="estate-details-right-sidebar.html">
									<img src="images/sidebar-featured1.jpg" alt="" />
									<div class="sidebar-featured-type">
										<div class="sidebar-featured-estate">A</div>
										<div class="sidebar-featured-transaction">S</div>
									</div>
								</a>
								<div class="sidebar-featured-title"><a href="estate-details-right-sidebar.html">Fort Collins, Colorado 80523, USA</a></div>
								<div class="sidebar-featured-price">$ 320 000</div>
								<div class="clearfix"></div>						
							</div>
							<div class="sidebar-featured">
								<a class="sidebar-featured-image" href="estate-details-right-sidebar.html">
									<img src="images/sidebar-featured2.jpg" alt="" />
									<div class="sidebar-featured-type">
										<div class="sidebar-featured-estate">A</div>
										<div class="sidebar-featured-transaction">S</div>
									</div>
								</a>
								<div class="sidebar-featured-title"><a href="estate-details-right-sidebar.html">West Fourth Street, New York 10003, USA</a></div>
								<div class="sidebar-featured-price">$ 350 000</div>
								<div class="clearfix"></div>						
							</div>
							<div class="sidebar-featured">
								<a class="sidebar-featured-image" href="estate-details-right-sidebar.html">
									<img src="images/sidebar-featured3.jpg" alt="" />
									<div class="sidebar-featured-type">
										<div class="sidebar-featured-estate">A</div>
										<div class="sidebar-featured-transaction">S</div>
									</div>
								</a>
								<div class="sidebar-featured-title"><a href="estate-details-right-sidebar.html">E. Elwood St. Phoenix, AZ 85034, USA</a></div>
								<div class="sidebar-featured-price">$ 410 000</div>
								<div class="clearfix"></div>					
							</div>
						</div>
						<div class="sidebar-title-cont">
							<h4 class="sidebar-title">latest news<span class="special-color">.</span></h4>
							<div class="title-separator-primary"></div>
						</div>
						<div class="sidebar-blog-cont">
							<article>
								<a href="blog-right-sidebar.html"><img src="images/footer-blog1.jpg" alt="" class="sidebar-blog-image" /></a>
								<div class="sidebar-blog-title"><a href="blog-right-sidebar.html">This post title, lorem ipsum dolor sit</a></div>
								<div class="sidebar-blog-date"><i class="fa fa-calendar-o"></i>28/09/15</div>
								<div class="clearfix"></div>					
							</article>
							<article>
								<a href="blog-right-sidebar.html"><img src="images/footer-blog2.jpg" alt="" class="sidebar-blog-image" /></a>
								<div class="sidebar-blog-title"><a href="blog-right-sidebar.html">This post title, lorem ipsum dolor sit</a></div>
								<div class="sidebar-blog-date"><i class="fa fa-calendar-o"></i>28/09/15</div>
								<div class="clearfix"></div>					
							</article>
							<article>
								<a href="blog-right-sidebar.html"><img src="images/footer-blog3.jpg" alt="" class="sidebar-blog-image" /></a>
								<div class="sidebar-blog-title"><a href="blog-right-sidebar.html">This post title, lorem ipsum dolor sit</a></div>
								<div class="sidebar-blog-date"><i class="fa fa-calendar-o"></i>28/09/15</div>
								<div class="clearfix"></div>					
							</article>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <footer class="large-cont">
		<div class="container">
			<div class="row">
				<div class="col-xs-6 col-sm-6 col-lg-3">
					<h4 class="second-color">contact us<span class="special-color">.</span></h4>
					<div class="footer-title-separator"></div>
					<p class="footer-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<address>
						<span><i class="fa fa-map-marker"></i>00456 Some Address line</span>
						<div class="footer-separator"></div>
						<span><i class="fa fa-envelope fa-sm"></i><a href="#">email@domain.tld</a></span>
						<div class="footer-separator"></div>
						<span><i class="fa fa-phone"></i>01-23456789</span>
					</address>
					<div class="clear"></div>
				</div>
				<div class="col-xs-6 col-sm-6 col-lg-3">
					<h4 class="second-color">quick links<span class="special-color">.</span></h4>
					<div class="footer-title-separator"></div>
					<ul class="footer-ul">
						<li><span class="custom-ul-bullet"></span><a href="index.php">Home</a></li>
						<li><span class="custom-ul-bullet"></span><a href="listing-grid-right-sidebar.html">Listing</a></li>
						<li><span class="custom-ul-bullet"></span><a href="agencies-listing-right-sidebar.html">Agencies</a></li>
						<li><span class="custom-ul-bullet"></span><a href="archive-grid.html">Blog</a></li>
						<li><span class="custom-ul-bullet"></span><a href="contact1.html">Contact us</a></li>
						<li><span class="custom-ul-bullet"></span><a href="submit-property.php">Submit property</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-6 col-lg-3">
					<h4 class="second-color">from the blog<span class="special-color">.</span></h4>
					<div class="footer-title-separator"></div>
					<div class="row">
						<div class="col-xs-6 col-sm-12">
							<article>
								<a href="blog-right-sidebar.html"><img src="images/footer-blog1.jpg" alt="" class="footer-blog-image" /></a>
								<div class="footer-blog-title"><a href="blog-right-sidebar.html">This post title, lorem ipsum dolor sit</a></div>
								<div class="footer-blog-date"><i class="fa fa-calendar-o"></i>28/09/15</div>
								<div class="clearfix"></div>					
							</article>
							<div class="footer-blog-separator hidden-xs"></div>
						</div>
						<div class="col-xs-6 col-sm-12">
							<article>
								<a href="blog-right-sidebar.html"><img src="images/footer-blog2.jpg" alt="" class="footer-blog-image" /></a>
								<div class="footer-blog-title"><a href="blog-right-sidebar.html">This post title, lorem ipsum dolor sit</a></div>
								<div class="footer-blog-date"><i class="fa fa-calendar-o"></i>28/09/15</div>
								<div class="clearfix"></div>					
							</article>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-lg-3">
					<h4 class="second-color">newsletter<span class="special-color">.</span></h4>
					<div class="footer-title-separator"></div>
					<p class="footer-p">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<form class="form-inline footer-newsletter">
						<input type="email" class="form-control" id="exampleInputEmail2" placeholder="enter your email">
						<button type="submit" class="btn"><i class="fa fa-lg fa-paper-plane"></i></button>
					</form>
				</div>
			</div>
		</div>
    </footer>
	<footer class="small-cont">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-6 small-cont">
					<img src="images/logo-light.png" alt="" class="img-responsive footer-logo" />
				</div>
				<div class="col-xs-12 col-md-6 footer-copyrights">
					&copy; Copyright 2015 <a href="http://themeforest.net/user/johnnychaos?ref=johnnychaos" target="blank">Jan Skwara</a>. All rights reserved. Buy on <a href="http://themeforest.net/user/johnnychaos/portfolio?ref=johnnychaos" target="blank">Themeforest</a>.
				</div>
			</div>
		</div>
	</footer>
</div>	

<!-- Move to top button -->

<div class="move-top">
	<div class="big-triangle-second-color"></div>
	<div class="big-icon-second-color"><i class="jfont fa-lg">&#xe803;</i></div>
</div>	

<!-- Login modal -->
	<div class="modal fade apartment-modal" id="login-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>Login<span class="special-color">.</span></h1>
						<div class="short-title-separator"></div>
					</div>
					<input name="login" type="email" class="input-full main-input" placeholder="Email" />
					<input name="password" type="password" class="input-full main-input" placeholder="Your Password" />
					<a href="my-profile.php" class="button-primary button-shadow button-full">
						<span>Sing In</span>
						<div class="button-triangle"></div>
						<div class="button-triangle2"></div>
						<div class="button-icon"><i class="fa fa-user"></i></div>
					</a>
					<a href="#" class="forgot-link pull-right">Forgot your password?</a>
					<div class="clearfix"></div>
					<p class="login-or">OR</p>
					<a href="#" class="facebook-button">
						<i class="fa fa-facebook"></i>
						<span>Login with Facebook</span>
					</a>
					<a href="#" class="google-button margin-top-15">
						<i class="fa fa-google-plus"></i>
						<span>Login with Google</span>
					</a>
					<p class="modal-bottom">Don't have an account? <a href="#" class="register-link">REGISTER</a></p>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

<!-- Register modal -->
	<div class="modal fade apartment-modal" id="register-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>Register<span class="special-color">.</span></h1>
						<div class="short-title-separator"></div>
					</div>
					<input name="first-name" type="text" class="input-full main-input" placeholder="Frist name" />
					<input name="last-name" type="text" class="input-full main-input" placeholder="Last name" />
					<input name="email" type="email" class="input-full main-input" placeholder="Email" />
					<input name="password" type="password" class="input-full main-input" placeholder="Password" />
					<input name="repeat-password" type="password" class="input-full main-input" placeholder="Repeat Password" />
					<a href="my-profile.php" class="button-primary button-shadow button-full">
						<span>Sing up</span>
						<div class="button-triangle"></div>
						<div class="button-triangle2"></div>
						<div class="button-icon"><i class="fa fa-user"></i></div>
					</a>
					<div class="clearfix"></div>
					<p class="login-or">OR</p>
					<a href="#" class="facebook-button">
						<i class="fa fa-facebook"></i>
						<span>Sing Up with Facebook</span>
					</a>
					<a href="#" class="google-button margin-top-15">
						<i class="fa fa-google-plus"></i>
						<span>Sing Up with Google</span>
					</a>
					<p class="modal-bottom">Already registered? <a href="#" class="login-link">SING IN</a></p>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

<!-- Forgotten password modal -->
	<div class="modal fade apartment-modal" id="forgot-modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-title">
						<h1>Forgot your password<span class="special-color">?</span></h1>
						<div class="short-title-separator"></div>
					</div>
					<p class="negative-margin forgot-info">Instert your account email address.<br/>We will send you a link to reset your password.</p>
					<input name="login" type="email" class="input-full main-input" placeholder="Your email" />
					<a href="my-profile.php" class="button-primary button-shadow button-full">
						<span>Reset password</span>
						<div class="button-triangle"></div>
						<div class="button-triangle2"></div>
						<div class="button-icon"><i class="fa fa-user"></i></div>
					</a>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

<!-- jQuery  -->
    <script type="text/javascript" src="js/jQuery/jquery.min.js"></script>
	<script type="text/javascript" src="js/jQuery/jquery-ui.min.js"></script>
	
<!-- Bootstrap-->
    <script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>

<!-- Google Maps -->
	<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDfDCV5hXiPamCIT8_vwGXuzimLQ9MF76g&amp;sensor=false&amp;libraries=places"></script>
	
<!-- plugins script -->
	<script type="text/javascript" src="js/plugins.js"></script>

<!-- template scripts -->
	<script type="text/javascript" src="mail/validate.js"></script>
    <script type="text/javascript" src="js/apartment.js"></script>

<!-- google maps initialization -->
	<script type="text/javascript">
            google.maps.event.addDomListener(window, 'load', init);
			function init() {						
				mapInit(39.6282,-86.1320,"estate-map","images/pin-house.png", true);
				streetViewInit(39.6282,-86.1320,"estate-street-view");
				
				mapInit(41.2693,-70.0874,"grid-map1","images/pin-house.png", false);
				mapInit(33.7544,-84.3857,"grid-map2","images/pin-apartment.png", false);
				mapInit(33.7337,-84.4443,"grid-map3","images/pin-land.png", false);
				mapInit(33.8588,-84.4858,"grid-map4","images/pin-commercial.png", false);
				mapInit(34.0254,-84.3560,"grid-map5","images/pin-apartment.png", false);
				mapInit(40.6128,-73.9976,"grid-map6","images/pin-house.png", false);
			}
	</script>
	
	</body>
</html>