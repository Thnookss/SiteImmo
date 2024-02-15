<?php

require_once "BDD.php";
class UserInfos
{
    private $first_name;
    private $last_name;
    private $old_email;
    private $email;
    private $phone;
    private $address;
    private $description;
    private $password;
    private $repeat_password;
    private $role = "[\"ROLE_USER\"]";
    private  $userPropertiesList;
    private $bdd;

    public function __construct($email, $bdd)
    {
        $this->bdd = $bdd;
        $this->old_email = $email;
    }

    public function setFirstName($first_name):void
    {
        $this->first_name = $first_name;
    }

    public function setLastName($last_name):void
    {
        $this->last_name = $last_name;
    }

    public function setEmail($email):void
    {
        $this->email = $email;
    }

    public function setPhone($phone):void
    {
        $this->phone = $phone;
    }

    public function setAddress($address):void
    {
        $this->address = $address;
    }

    public function setDescription($description):void
    {
        $this->description = $description;
    }

    public function setPassword($password):void
    {
        $this->password = $password;
    }

    public function setRepeatPassword($repeat_password):void
    {
        $this->repeat_password = $repeat_password;
    }

    public function getUserInfos()
    {
        $stmt = $this->bdd->bdQuery("SELECT firstname,lastname,email,phone,address,description FROM users WHERE email = :email", ['email' => $_SESSION["user"]["email"]]);
        return $stmt->fetch();
    }

    public function userLogout() {
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }

    public function getUserProperties()
    {
        // selectionne les 7 dernieres elements de la table properties
        $query = "SELECT * FROM properties WHERE users_id = :userId ORDER BY datecreate DESC LIMIT 7";
        $result = $this->bdd->bdQuery($query,[
            'userId' => $_SESSION['user']['id']
        ]);
        $this->userPropertiesList = $result->fetchAll();
    }

    public function getPropertyList()
    {
        return $this->userPropertiesList;
    }
}

$bdd = new BDD();
$user = new UserInfos($_SESSION["user"]["email"], $bdd);
$user->getUserProperties();
$userPropertiesList = $user->getPropertyList();

if (isset($_POST['logout'])) {
    $user->userLogout();
    header("Location: index.php");
}

?>

<div class="sidebar-left">
    <h3 class="sidebar-title">Welcome back<span class="special-color">.</span></h3>
    <div class="title-separator-primary"></div>

    <div class="profile-info margin-top-60">
        <div class="profile-info-title negative-margin"><?php echo $user->getUserInfos()["firstname"] ." ". $user->getUserInfos()["lastname"]; ?></div>
        <img src="images/comment-photo2.jpg" alt="" class="pull-left" />
        <div class="profile-info-text pull-left">
            <p class="subtitle-margin">Agent</p>
            <p class=""><?php echo count($userPropertiesList); ?> Estates</p>

            <form method="post">
                <button type="submit" name="logout" class="logout-link margin-top-30">
                    <i class="fa fa-lg fa-sign-out"></i>Logout
                </button>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="center-button-cont margin-top-30">
        <a href="my-offers.php" class="button-primary button-shadow button-full">
            <span>My offers</span>
            <div class="button-triangle"></div>
            <div class="button-triangle2"></div>
            <div class="button-icon"><i class="fa fa-th-list"></i></div>
        </a>
    </div>
    <div class="center-button-cont margin-top-15">
        <a href="my-profile.php" class="button-primary button-shadow button-full">
            <span>My profile</span>
            <div class="button-triangle"></div>
            <div class="button-triangle2"></div>
            <div class="button-icon"><i class="fa fa-user"></i></div>
        </a>
    </div>
    <div class="center-button-cont margin-top-15">
        <a href="submit-property.php" class="button-alternative button-shadow button-full">
            <span>add property</span>
            <div class="button-triangle"></div>
            <div class="button-triangle2"></div>
            <div class="button-icon"><i class="jfont fa-lg">&#xe804;</i></div>
        </a>
    </div>


    <h3 class="sidebar-title margin-top-60">Your offers<span class="special-color">.</span></h3>
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
</div>
