<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// when installed via composer
require_once 'vendor/autoload.php';

include "BDD.php";

$faker = Faker\Factory::create('fr_FR');

class Property
{
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
    private $datecreate;
    private $dateupdate;
    private $datedelete;
    private $transaction;
    private $type;
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
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

    public function setDatecreate($datecreate)
    {
        $this->datecreate = $datecreate;
    }

    public function setDateupdate($dateupdate)
    {
        $this->dateupdate = $dateupdate;
    }

    public function setDatedelete($datedelete)
    {
        $this->datedelete = $datedelete;
    }
    public function setTransaction($transaction)
    {
        $this->transaction = $transaction;
    }
    public function setType($type)
    {
        $this->type = $type;
    }

    public function addProperty($idDta, $idDpe, $idGaz, $idUser, $idCategory) : void
    {

        $this->bdd->bdQuery("INSERT INTO properties (title,totroom,nroom,desc1,desc2,superficie,address_zip,address_city,address_street,address_complement,address_geo,currency,price,fees,comm,vendor_givename,vendor_familyname,vendor_phone,vendor_mobile,vendor_email,vendor_webpage,datecreate,dateupdate,datedelete, gazDiag_id, DTA_id, DPE_id, users_id, category_id,transaction,type) VALUES (:title, :totroom, :nroom, :desc1, :desc2, :superficie, :address_zip, :address_city, :address_street, :address_complement, :address_geo, :currency, :price, :fees, :comm, :vendor_givename, :vendor_familyname, :vendor_phone, :vendor_mobile, :vendor_email, :vendor_webpage, :datecreate, :dateupdate, :datedelete, :idGaz, :idDta, :idDpe, :idUser, :idCategory,:transaction,:type)",
            ['title' => $this->title,
                'totroom' => $this->totroom,
                'nroom' => $this->nroom,
                'desc1' => $this->desc1,
                'desc2' => $this->desc2,
                'superficie' => $this->superficie,
                'address_zip' => $this->address_zip,
                'address_city' => $this->address_city,
                'address_street' => $this->address_street,
                'address_complement' => $this->address_complement,
                'address_geo' => $this->address_geo,
                'currency' => $this->currency,
                'price' => $this->price,
                'fees' => $this->fees,
                'comm' => $this->comm,
                'vendor_givename' => $this->vendor_givename,
                'vendor_familyname' => $this->vendor_familyname,
                'vendor_phone' => $this->vendor_phone,
                'vendor_mobile' => $this->vendor_mobile,
                'vendor_email' => $this->vendor_email,
                'vendor_webpage' => $this->vendor_webpage,
                'datecreate' => $this->datecreate,
                'dateupdate' => $this->dateupdate,
                'datedelete' => $this->datedelete,
                'idGaz' => $idGaz['id'],
                'idDta' => $idDta['id'],
                'idDpe' => $idDpe['id'],
                'idUser' => $idUser['id'],
                'idCategory' => $idCategory['id'],
                'transaction' => $this->transaction,
                'type' => $this->type
            ]);
    }
}

class addUsers
{
    private $firstname;
    private $lastname;
    private $email;
    private $phone;
    private $password;
    private $address;
    private $role = "[\"ROLE_USER\"]";
    private $description;
    private $updated_at;
    private $created_at;
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;
    }

    public function addUser()
    {
        $this->bdd->bdQuery("INSERT INTO users (firstname,lastname,email,phone,password,address,role,description,updated_at,created_at) VALUES (:firstname, :lastname, :email, :phone, :password, :address, :role, :description, :updated_at, :created_at)",
            ['firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'phone' => $this->phone,
                'password' => $this->password,
                'address' => $this->address,
                'role' => $this->role,
                'description' => $this->description,
                'updated_at' => $this->updated_at,
                'created_at' => $this->created_at
            ]);
    }
}

// select DTA
$bdd = new BDD();

$resultDta = $bdd->bdQuery("SELECT id FROM DTA WHERE id = 2", []);
$idDta = $resultDta->fetch();

$resultDPE = $bdd->bdQuery("SELECT id FROM DPE WHERE id = 2", []);
$idDpe = $resultDPE->fetch();

$resultGaz = $bdd->bdQuery("SELECT id FROM gazDiag WHERE id = 2", []);
$idGaz = $resultGaz->fetch();

//select random user
$resultUser = $bdd->bdQuery("SELECT id FROM users WHERE id BETWEEN 0 AND 100 ORDER BY RAND() LIMIT 1", []);
$idUser = $resultUser->fetch();

$category = $bdd->bdQuery("SELECT id FROM category WHERE id = 2", []);
$idCategory = $category->fetch();

if (isset($_POST['addProperties'])) {
    for ($i = 0; $i < 10; $i++) {
        $bdd = new BDD();
        $property = new Property($bdd);
        $property->setTitle($faker->sentence($nbWords = 6, $variableNbWords = true));
        $property->setTotroom($faker->numberBetween($min = 1, $max = 10));
        $property->setNroom($faker->numberBetween($min = 1, $max = 10));
        $property->setDesc1($faker->sentence($nbWords = 6, $variableNbWords = true));
        $property->setDesc2($faker->sentence($nbWords = 6, $variableNbWords = true));
        $property->setSuperficie($faker->numberBetween($min = 10, $max = 1000));
        $property->setAddress_zip($faker->postcode);
        $property->setAddress_city($faker->city);
        $property->setAddress_street($faker->streetAddress);
        $property->setAddress_complement($faker->streetAddress);
        $property->setAddress_geo($faker->latitude($min = -90, $max = 90) . ',' . $faker->longitude($min = -180, $max = 180));
        $property->setCurrency($faker->currencyCode);
        $property->setPrice($faker->numberBetween($min = 10000, $max = 1000000));
        $property->setFees($faker->numberBetween($min = 100, $max = 10000));
        $property->setComm($faker->numberBetween($min = 1, $max = 10));
        $property->setVendor_givename($faker->firstName);
        $property->setVendor_familyname($faker->lastName);
        $property->setVendor_phone($faker->phoneNumber);
        $property->setVendor_mobile($faker->phoneNumber);
        $property->setVendor_email($faker->companyEmail);
        $property->setVendor_webpage($faker->url);
        $property->setDatecreate($faker->dateTimeThisDecade($max = 'now', $timezone = null)->format('Y-m-d'));
        $property->setDateupdate($faker->dateTimeThisDecade($max = 'now', $timezone = null)->format('Y-m-d'));
        $property->setDatedelete($faker->dateTimeThisDecade($max = 'now', $timezone = null)->format('Y-m-d'));
        $property->setTransaction($faker->randomElement($array = array('For sale', 'For rent')));
        $property->setType($faker->randomElement($array = array('Appartment','House','Commercial','Land')));
        $property->addProperty($idDta, $idDpe, $idGaz, $idUser, $idCategory);
    }
}

if (isset($_POST['addUsers'])) {
    for ($i = 0; $i < 10; $i++) {
        $bdd = new BDD();
        $addUsers = new addUsers($bdd);
        $addUsers->setFirstname($faker->firstName);
        $addUsers->setLastname($faker->lastName);
        $addUsers->setEmail($faker->companyEmail);
        $addUsers->setPhone($faker->phoneNumber);
        $addUsers->setPassword(password_hash('0000', PASSWORD_DEFAULT));
        $addUsers->setAddress($faker->address);
        $addUsers->setDescription($faker->sentence($nbWords = 6, $variableNbWords = true));
        $addUsers->setUpdated_at($faker->dateTimeThisDecade($max = 'now', $timezone = null)->format('Y-m-d'));
        $addUsers->setCreated_at($faker->dateTimeThisDecade($max = 'now', $timezone = null)->format('Y-m-d'));
        $addUsers->addUser();
    }
}



?>

<form method="post">
    <button type="submit" name="addProperties">add 10 properties to a random user </button>
    <button type="submit" name="addUsers">add 10 users</button>
</form>
