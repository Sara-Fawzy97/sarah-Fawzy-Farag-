<?php

use App\Database\Models\User;
use App\Mails\VerificationCode;
use App\Http\Requests\Validations;

$title = "Forget Password";
include_once('layouts\header.php');
include_once('App/Middleware/auth.php');

$validation = new Validations;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $validation->setKey('email')->setValue($_POST['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->exist('users', 'email');
    if (empty($validation->getErrors())) {
        $code = rand(100000, 999999);
        $user = new User;

        $user->setEmail($_POST['email']);
        $user->setCode($code);
        try {
            $user->updateCodeByEmail();
            $body = "<p>Hello {$_POST['email']}.</p> <p>We received A new request to reset your password. Enter Your Verification Code<b>{$code}</b> </p>";

            $verificationCode = new VerificationCode($_POST['email'], "Forget Password Code", $body);
            if ($verificationCode->send()) {
                $_SESSION['email'] = $_POST['email'];
                header("location:checkCode.php");
                die;
            } else {
                $error = "<p>Something Wrong</p>";
            }
        } catch (\Exception $e) {
            $error = "<p>Something Wrong</p>";
        }
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
                            <h4> <?= $title ?> </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="" method="post">
                                        <?= $error ?? "" ?>
                                        <input type="email" name="email" placeholder="Email Address" value="<?= $_POST['email'] ?? "" ?>">
                                        <!-- <?= "<p class='text-danger font-weight-bold'>" . $validation->getError('email') . "</p>" ?> -->

                                        <div class="button-box">
                                            <button type="submit"><span>Check</span></button>
                                        </div>
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

include_once "layouts/footerscript.php";
?>