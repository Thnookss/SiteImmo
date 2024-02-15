<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST["update-submit"])) {
    $id = $_POST["property-id"];
    $_SESSION['property-id'] = $id;
}


include "BDD.php";

class Property
{
    private $PropertyToUpdateId;
    private $title;
    private $totroom;
    private $nroom;
    private $desc1;
    private $desc2;
    private $superficie;
    private $address_zip;
    private $address_city;
    private $address_street;
    private $address_complement;
    private $address_geo;
    private $currency;
    private $price;
    private $fees;
    private $comm;
    private $vendor_givename;
    private $vendor_familyname;
    private $vendor_phone;
    private $vendor_mobile;
    private $vendor_email;
    private $vendor_webpage;
    private $transaction;
    private $type;
    private $datecreate;
    private $dateupdate;
    private $datedelete;
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function setPropertyToUpdateId($PropertyToUpdateId)
    {
        $this->PropertyToUpdateId = $PropertyToUpdateId;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function setTotroom($totroom)
    {
        $this->totroom = $totroom;
    }

    public function setNroom($nroom)
    {
        $this->nroom = $nroom;
    }

    public function setDesc1($desc1)
    {
        $this->desc1 = $desc1;
    }

    public function setDesc2($desc2)
    {
        $this->desc2 = $desc2;
    }

    public function setSuperficie($superficie)
    {
        $this->superficie = $superficie;
    }

    public function setAddress_zip($address_zip)
    {
        $this->address_zip = $address_zip;
    }

    public function setAddress_city($address_city)
    {
        $this->address_city = $address_city;
    }

    public function setAddress_street($address_street)
    {
        $this->address_street = $address_street;
    }

    public function setAddress_complement($address_complement)
    {
        $this->address_complement = $address_complement;
    }

    public function setAddress_geo($address_geo)
    {
        $this->address_geo = $address_geo;
    }

    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function setFees($fees)
    {
        $this->fees = $fees;
    }

    public function setComm($comm)
    {
        $this->comm = $comm;
    }

    public function setVendor_givename($vendor_givename)
    {
        $this->vendor_givename = $vendor_givename;
    }

    public function setVendor_familyname($vendor_familyname)
    {
        $this->vendor_familyname = $vendor_familyname;
    }

    public function setVendor_phone($vendor_phone)
    {
        $this->vendor_phone = $vendor_phone;
    }

    public function setVendor_mobile($vendor_mobile)
    {
        $this->vendor_mobile = $vendor_mobile;
    }

    public function setVendor_email($vendor_email)
    {
        $this->vendor_email = $vendor_email;
    }

    public function setVendor_webpage($vendor_webpage)
    {
        $this->vendor_webpage = $vendor_webpage;
    }

    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function setDatecreate($datecreate)
    {
        $this->datecreate = $datecreate;
    }

    public function setDateupdate($dateupdate)
    {
        if ($dateupdate) {
            $this->dateupdate = $dateupdate;
            return true;
        } else {
            return false;
        }
    }
    public function setDatedelete($datedelete)
    {
        $this->datedelete = $datedelete;
    }

    public function addProperty($idDta, $idDpe, $idGaz, $idUser, $idCategory) : bool
    {

        $this->bdd->bdQuery("INSERT INTO properties (title,totroom,nroom,desc1,superficie,address_geo,address_street,address_city,address_zip,price,transaction,type,datecreate,gazDiag_id,DTA_id,DPE_id,users_id,category_id,vendor_givename,vendor_familyname,vendor_email) VALUES (:title,:totroom,:nroom,:desc1,:superficie,:address_geo,:address_street,:address_city,:address_zip,:price,:transaction,:type,:datecreate,:idGaz,:idDta,:idDpe,:idUser,:idCategory,:vendor_givename,:vendor_familyname,:vendor_email)",
            [
                'title' => $this->title,
                'totroom' => $this->totroom,
                'nroom' => $this->nroom,
                'desc1' => $this->desc1,
                'superficie' => $this->superficie,
                'address_geo' => $this->address_geo,
                'address_street' => $this->address_street,
                'address_city' => $this->address_city,
                'address_zip' => $this->address_zip,
                'price' => $this->price,
                'transaction' => $this->transaction,
                'type' => $this->type,
                'datecreate' => $this->datecreate,
                'idGaz' => $idGaz,
                'idDta' => $idDta,
                'idDpe' => $idDpe,
                'idUser' => $idUser,
                'idCategory' => $idCategory,
                'vendor_givename' => $_SESSION['user']['firstname'],
                'vendor_familyname' => $_SESSION['user']['lastname'],
                'vendor_email' => $_SESSION['user']['email']
            ]);
        //return true if passes
        return true;
    }

    public function updateProperty(): bool
    {
        $this->bdd->bdQuery("UPDATE properties SET title = :title, totroom = :totroom, nroom = :nroom, desc1 = :desc1, superficie = :superficie, address_geo = :address_geo, address_street = :address_street, address_city = :address_city,address_zip = :address_zip , price = :price, transaction = :transaction, type = :type, dateupdate = :dateupdate WHERE id = :id",
            ['title' => $this->title,
                'totroom' => $this->totroom,
                'nroom' => $this->nroom,
                'desc1' => $this->desc1,
                'superficie' => $this->superficie,
                'address_geo' => $this->address_geo,
                'address_street' => $this->address_street,
                'address_city' => $this->address_city,
                'address_zip' => $this->address_zip,
                'price' => $this->price,
                'transaction' => $this->transaction,
                'type' => $this->type,
                'dateupdate' => $this->dateupdate,
                'id' => $_SESSION['property-id']
            ]);
        //return true if passes
        return true;
    }

    public function getPropertyToUpdate() : array
    {
        // recupere les données de la propriété à modifier
        $query = "SELECT * FROM properties WHERE id = :id";
        $result = $this->bdd->bdQuery($query,[
            'id' => $_SESSION['property-id']
        ]);
        return $result->fetch();
    }
}

$bdd = new BDD();
$property = new Property($bdd);

$resultDta = $bdd->bdQuery("SELECT id FROM DTA WHERE id = 2", []);
$idDta = $resultDta->fetch();

$resultDPE = $bdd->bdQuery("SELECT id FROM DPE WHERE id = 2", []);
$idDpe = $resultDPE->fetch();

$resultGaz = $bdd->bdQuery("SELECT id FROM gazDiag WHERE id = 2", []);
$idGaz = $resultGaz->fetch();

//select random user
$resultUser = $bdd->bdQuery("SELECT id FROM users WHERE id = :id", [
    'id' => $_SESSION['user']['id']
]);
$idUser = $resultUser->fetch();

$category = $bdd->bdQuery("SELECT id FROM category WHERE id = 2", []);
$idCategory = $category->fetch();

echo $idDta['id'];
echo $idDpe['id'];
echo $idGaz['id'];
echo $idUser['id'];
echo $idCategory['id'];


if (isset($_POST['property-id'])) {
    $propertyToUpdate = $property->getPropertyToUpdate();

    $address_geo = $propertyToUpdate['address_geo'];
    list($lng, $lat) = explode(',', $address_geo);

    $address_street = $propertyToUpdate['address_street'];
    $address_city = $propertyToUpdate['address_city'];
    $address = $address_street . ', ' . $address_city;
}

if (isset($_POST['update-property']) or isset($_POST['add-property'])){
    if (!empty($_POST['property-title'])) {
        $property->setTitle($_POST['property-title']);
    } else {
        echo "La variable 'title' est vide.<br>";
    }

    if (!empty($_POST['rooms'])) {
        $property->setTotroom($_POST['rooms']);
    } else {
        echo "La variable 'rooms' est vide.<br>";
    }

    if (!empty($_POST['bathrooms'])) {
        $property->setNroom($_POST['bathrooms']);
    } else {
        echo "La variable 'bathrooms' est vide.<br>";
    }

    if (!empty($_POST['message'])) {
        $property->setDesc1($_POST['message']);
    } else {
        echo "La variable 'message' est vide.<br>";
    }

    if (!empty($_POST['area'])) {
        $property->setSuperficie($_POST['area']);
    } else {
        echo "Le champ 'area' est vide.<br>";
    }

    if (!empty($_POST['lng']) && !empty($_POST['lat'])) {
        $lng = $_POST['lng'];
        $lat = $_POST['lat'];
        $geo = $lng . "," . $lat; // longitude,latitude
        $property->setAddress_geo($geo);
    } else {
        echo "La variable 'address_geo' est vide.<br>";
    }

    if (!empty($_POST['address'])) {
        $address = $_POST['address']; // get the address from the form
        $address_parts = explode(',', $address); // split the address into parts

        $address_street = trim($address_parts[0]); // remove spaces
        $address_city = isset($address_parts[1]) ? trim($address_parts[1]) : ''; // remove spaces and ignore the third part of the address

        $property->setAddress_street($address_street); // set the address
        $property->setAddress_city($address_city); // set the city
    } else {
        echo "La variable 'address_street ou address_city' est vide.<br>";
    }

    if (!empty($_POST['address_zip'])) {
        $property->setAddress_zip($_POST['address_zip']);
    } else {
        echo "La variable 'zip' est vide.<br>";
    }

    if (!empty($_POST['price'])) {
        $property->setPrice($_POST['price']);
    } else {
        echo "La variable 'price' est vide.<br>";
    }
    if (!empty($_POST['transaction2'])) {
        $property->setTransaction($_POST['transaction2']);
    } else {
        echo "La variable 'transaction' est vide.<br>";
    }
    if (!empty($_POST['transaction1'])) {
        $property->setType($_POST['transaction1']);
    } else {
        echo "La variable 'type' est vide.<br>";
    }
    if ($property->setDateupdate(date('Y-m-d'))){
        // La date a été mise à jour avec succès
    } else {
        echo "La variable 'dateupdate' a pas pu etre remplie.<br>";
    }

    if (isset($_POST['update-property'])) {
        $property->updateProperty();
        header('Location: my-offers.php');
        $_SESSION['property-id'] = null;
    }

    if (isset($_POST['add-property'])) {
        $property->setDatecreate(date('Y-m-d'));

        if ($property->addProperty($idDta['id'], $idDpe['id'], $idGaz['id'], $idUser['id'], $idCategory['id'])) {
            // La propriété a été ajoutée avec succès
            header('Location: my-offers.php');
        } else {
            echo "La propriété n'a pas pu être ajoutée.<br>";
        }
    }

}


function setFormSubmitType(): string
{
    if (!empty($_POST['property-id'])) {
        return 'update-property';
    } else {
        return 'add-property';
    }
}

$propertyTypes = ['Apartment', 'House', 'Commercial', 'Land'];
$transactionTypes = ['For sale', 'For rent'];


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
						<li><a href="submit-property.html" class="special-color">Submit property</a></li>
					</ul>
				</div>
			</div>
		</nav><!-- /.mani-menu-cont -->	
    </header>
	
  	
    <section class="short-image no-padding blog-short-title">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-lg-12 short-image-title">
					<h5 class="subtitle-margin second-color">add listing</h5>
					<h1 class="second-color">my account</h1>
					<div class="short-title-separator"></div>
				</div>
			</div>
		</div>
    </section>
	
	<section class="section-light section-top-shadow">
		<form name="offer-from" action="#" method="post" enctype="multipart/form-data">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-6">
						<h3 class="title-negative-margin">Listing details<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<div class="row">
                                <div class="col-xs-12 col-sm-12 margin-top-15">
                                    <input name="property-title" type="text" class="input-full main-input" placeholder="Title" value="<?php echo isset($propertyToUpdate) ? $propertyToUpdate['title'] : ''; ?>"/>
                                </div>
								
								<div class="col-xs-12 col-sm-6">
                                    <select name="transaction1" class="bootstrap-select" title="Property type:">
                                        <?php foreach ($propertyTypes as $type): ?>
                                            <option value="<?php echo $type; ?>" <?php if (isset($propertyToUpdate) && $type == $propertyToUpdate['type']) echo 'selected'; ?>>
                                                <?php echo $type; ?>
                                            </option>
                                        <?php endforeach; ?>
									</select>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-xs-15">
									<select name="transaction2" class="bootstrap-select" title="Transaction:">
                                        <?php foreach ($transactionTypes as $transaction): ?>
                                            <option value="<?php echo $transaction; ?>" <?php if (isset($propertyToUpdate) && $transaction == $propertyToUpdate['transaction']) echo 'selected'; ?>>
                                                <?php echo $transaction; ?>
                                            </option>
                                        <?php endforeach; ?>
									</select>
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15">
                                    <input name="price" type="text" class="input-full main-input" placeholder="Price" value="<?php echo isset($propertyToUpdate) ? $propertyToUpdate['price'] : ''; ?>"/>
                                </div>
								<div class="col-xs-12 col-sm-6 margin-top-15 margin-top-xs-0">
									<input name="area" type="text" class="input-full main-input" placeholder="Area" value="<?php echo isset($propertyToUpdate) ? $propertyToUpdate['superficie'] : ''; ?>"/>
								</div>
								<div class="col-xs-12 col-sm-6">
									<input name="rooms" type="text" class="input-full main-input" placeholder="Rooms" value="<?php echo isset($propertyToUpdate) ? $propertyToUpdate['totroom'] : ''; ?>" />
								</div>
								<div class="col-xs-12 col-sm-6">
									<input name="bathrooms" type="text" class="input-full main-input" placeholder="Bathrooms" value="<?php echo isset($propertyToUpdate) ? $propertyToUpdate['nroom'] : ''; ?>" />
								</div>
							</div>
							<textarea name="message" class="input-full main-input property-textarea" placeholder="Description"><?php echo isset($propertyToUpdate) ? $propertyToUpdate['desc1'] : ''; ?></textarea>
							<div class="row">
								<div class="col-xs-12 col-sm-4 col-md-6 col-lg-4 margin-top-15">
									<input type="checkbox" id="c1" name="cc" class="main-checkbox" />
									<label for="c1"><span></span>Air Conditioning</label><br/>
									<input type="checkbox" id="c2" name="cc" class="main-checkbox" />
									<label for="c2"><span></span>Internet</label><br/>
									<input type="checkbox" id="c3" name="cc" class="main-checkbox" />
									<label for="c3"><span></span>Cable TV</label><br/>
									<input type="checkbox" id="c4" name="cc" class="main-checkbox" />
									<label for="c4"><span></span>Balcony</label><br/>
									<input type="checkbox" id="c5" name="cc" class="main-checkbox" />
									<label for="c5"><span></span>Roof Terrace</label><br/>
									<input type="checkbox" id="c6" name="cc" class="main-checkbox" />
									<label for="c6"><span></span>Terrace</label>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-6 col-lg-4 margin-top-15">
									<input type="checkbox" id="c7" name="cc" class="main-checkbox" />
									<label for="c7"><span></span>Lift</label><br/>
									<input type="checkbox" id="c8" name="cc" class="main-checkbox" />
									<label for="c8"><span></span>Garage</label><br/>
									<input type="checkbox" id="c9" name="cc" class="main-checkbox" />
									<label for="c9"><span></span>Security</label><br/>
									<input type="checkbox" id="c10" name="cc" class="main-checkbox" />
									<label for="c10"><span></span>High Standard</label><br/>
									<input type="checkbox" id="c11" name="cc" class="main-checkbox" />
									<label for="c11"><span></span>City Centre</label><br/>
									<input type="checkbox" id="c12" name="cc" class="main-checkbox" />
									<label for="c12"><span></span>Furniture</label>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-6 col-lg-4 margin-top-15">
									<input type="checkbox" id="c13" name="cc" class="main-checkbox" />
									<label for="c13"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c14" name="cc" class="main-checkbox" />
									<label for="c14"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c15" name="cc" class="main-checkbox" />
									<label for="c15"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c16" name="cc" class="main-checkbox" />
									<label for="c16"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c17" name="cc" class="main-checkbox" />
									<label for="c17"><span></span>Another Option</label><br/>
									<input type="checkbox" id="c18" name="cc" class="main-checkbox" />
									<label for="c18"><span></span>Another Option</label>
								</div>
							</div>
						</div>				
					</div>
					<div class="col-xs-12 col-md-6 margin-top-xs-60 margin-top-sm-60">
						<h3 class="title-negative-margin">Localization<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
						<div class="dark-col margin-top-60">
							<input id="geocomplete" name="address" type="text" class="input-full main-input" placeholder="Localization" value="<?php echo isset($propertyToUpdate) ? $address : ''; ?>" />
                            <input id="zip" name="address_zip" type="text" class="input-full main-input" placeholder="Zip Code" value="<?php echo isset($propertyToUpdate) ? $propertyToUpdate['address_zip'] : ''; ?>" />
                            <p class="negative-margin bold-indent">Or drag the marker to property position<p>
							<div id="submit-property-map" class="submit-property-map"></div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="lng" type="text" class="input-full main-input input-last" placeholder="Longitude" readonly="readonly" value="<?php echo isset($propertyToUpdate) ? $lng : ''; ?>" />
								</div>
								<div class="col-xs-12 col-sm-6 margin-top-15">
									<input name="lat" type="text" class="input-full main-input input-last" placeholder="Latitude" readonly="readonly" value="<?php echo isset($propertyToUpdate) ? $lat : ''; ?>" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 margin-top-60">
						<h3 class="title-negative-margin">gallery<span class="special-color">.</span></h3>
						<div class="title-separator-primary"></div>
					</div>
					<div class="col-xs-12 margin-top-60">
						<input id="file-upload" name="files[]" type="file" multiple>
					</div>
					<div class="col-xs-12">
						<div class="center-button-cont margin-top-60">
							<button name="<?php echo setFormSubmitType(); ?>" type="submit" class="button-primary button-shadow" style="border: none">
								<span>submit property</span>
								<div class="button-triangle"></div>
								<div class="button-triangle2"></div>
								<div class="button-icon"><i class="fa fa-lg fa-home"></i></div>
							</button>
						</div>
					</div>
				</div>
			</div>
		</form>
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
						<li><span class="custom-ul-bullet"></span><a href="submit-property.html">Submit property</a></li>
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

<?php include 'modal.php'; ?>

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
	
	</body>
</html>