<?php

require_once 'BDD.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class loginUser
{
    private $email;
    private $password;
    private $bdd;

    public function __construct($bdd)
    {
        $this->bdd = $bdd;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function loginUser() : void
    {
        $stmt = $this->bdd->bdQuery("SELECT * FROM users WHERE email = :email", ['email' => $this->email]);
        $result = $stmt->fetch();
        if ($result) {
            if (password_verify($this->password, $result['password'])) {
                $_SESSION['user'] = $result;
                header('Location: my-profile.php');
            } else {
                echo "Mot de passe incorrect";
            }
        } else {
            echo "Email incorrect";
        }
    }
}

if (isset($_POST['login-email']) && isset($_POST['login-password'])) {
    $bdd = new BDD();
    $login = new loginUser($bdd);
    $login->setEmail($_POST['login-email']);
    $login->setPassword($_POST['login-password']);
    $login->loginUser();

}

class registerUser
{
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $repeatPassword;
    private $role = "[\"ROLE_USER\"]";
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

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setRepeatPassword($repeatPassword)
    {
        $this->repeatPassword = $repeatPassword;
    }

    public function registerUser() : void
    {
        if ($this->password !== $this->repeatPassword) {
            echo "Les mots de passe ne correspondent pas";
            return;
        }

        if ($this->bdd->checkDouble('users', 'email', $this->email)) { // check if exists in database
            echo "Email déjà utilisé";
            return;
        }

        $this->bdd->bdQuery("INSERT INTO users (firstname,lastname,email,password,role) VALUES (:firstname, :lastname, :email, :password, :role)",
            ['firstname' => $this->firstname,
                'lastname' => $this->lastname,
                'email' => $this->email,
                'password' => password_hash($this->password, PASSWORD_DEFAULT),
                'role' => $this->role
            ]);
    }
}

if (isset($_POST['register-firstname']) && isset($_POST['register-lastname']) && isset($_POST['register-email']) && isset($_POST['register-password']) && isset($_POST['register-repeatPassword'])) {
    $bdd = new BDD();
    $register = new registerUser($bdd);
    $register->setFirstname($_POST['register-firstname']);
    $register->setLastname($_POST['register-lastname']);
    $register->setEmail($_POST['register-email']);
    $register->setPassword($_POST['register-password']);
    $register->setRepeatPassword($_POST['register-repeatPassword']);
    $register->registerUser();
}

?>

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
                <form method="post" id="login-form">
                    <input name="login-email" type="email" class="input-full main-input" placeholder="Email" />
                    <input name="login-password" type="password" class="input-full main-input" placeholder="Your Password" />
                    <button type="submit" id="login-submit-btn" class="button-primary button-shadow button-full">
                        <span>Sign In</span>
                        <div class="button-triangle"></div>
                        <div class="button-triangle2"></div>
                        <div class="button-icon"><i class="fa fa-user"></i></div>
                    </button>
                </form>
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
                <form method="post">
                    <input name="register-firstname" type="text" class="input-full main-input" placeholder="Frist name" />
                    <input name="register-lastname" type="text" class="input-full main-input" placeholder="Last name" />
                    <input name="register-email" type="email" class="input-full main-input" placeholder="Email" />
                    <input name="register-password" type="password" class="input-full main-input" placeholder="Password" />
                    <input name="register-repeatPassword" type="password" class="input-full main-input" placeholder="Repeat Password" />
                    <button type="submit" name="register-submit" class="button-primary button-shadow button-full">
                        <span>Sing up</span>
                        <div class="button-triangle"></div>
                        <div class="button-triangle2"></div>
                        <div class="button-icon"><i class="fa fa-user"></i></div>
                    </button>
                </form>
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
                <a href="my-profile.html" class="button-primary button-shadow button-full">
                    <span>Reset password</span>
                    <div class="button-triangle"></div>
                    <div class="button-triangle2"></div>
                    <div class="button-icon"><i class="fa fa-user"></i></div>
                </a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

