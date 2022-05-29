<?php

use App\Database\Models\User;
use App\Http\Requests\Validations;

$title = "Login";
$breadcrumbHeader = "Login Page";
include_once('Layouts/header.php');
include_once('Layouts/navbar.php');
include_once('Layouts/breadcrumb.php');

$validation = new Validations;
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $validation->setKey("email")->setValue($_POST['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/', 'wrong email or password')->exist('users', 'email');
    $validation->setKey("password")->setValue($_POST['password'])->required();

    if (empty($validation->getErrors())) {
        $user = new User;
        $user->setEmail($_POST['email']);

    //    print_r( $user->getUserByEmail()->get_result());
        if ($user->getUserByEmail()->get_result()->num_rows == 1) {
            $authUser = $user->getUserByEmail()->get_result()->fetch_object();

            if (password_verify($_POST['password'], $authUser->password)) {
                if ($authUser->email_verfied_at) {
                    if(isset($_POST['rememberme'])){
                        setcookie('rememberme',$_POST['email'],time() + 86400 * 365 , '/');
                    }
                    $_SESSION['user'] = $authUser;
                    header("location:index.php");
                    die;
                } else {
                    $_SESSION['email'] = $_POST['email'];
                    header('location:checkCode.php');
                    die;
                }
            } else {
                ($error = "Wrong email or password");
            }
        } else ($error = "Wrong email or password");
    }
}

?>

<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>

                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="" method="post">
                                        <input type="email" name="email" placeholder="Email">
                                        <?= "<p class='text-danger '>" . $validation->getError('email') . "</p>" ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= "<p class='text-danger '>" . $validation->getError('password') . "</p>" ?>                                     
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox" name="rememberme">
                                                <label>Remember me</label>
                                                <a href="forgotPassword.php">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span>Login</span></button>
                                        </div>
                                        <?= isset($error) ? "<p class='text-danger font-weight-bold  '>" . $error . "</p>" : "" ?>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php


include_once('layouts/footer.php');
include_once('layouts/footerscript.php');
?>