<?php

use App\Database\Models\User;
use App\Http\Requests\Validations;
use App\Mails\VerificationCode;

$title = "Register";
$breadcrumbHeader = "Register Page";
include_once('Layouts/header.php');
include_once('Layouts/navbar.php');
include_once('Layouts/breadcrumb.php');

$validation = new Validations;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $validation->setKey('firstname')->setValue($_POST['firstname'])->required()->string()->min(2)->max(32);
    $validation->setKey('lastname')->setValue($_POST['lastname'])->required()->string()->min(2)->max(32);
    $validation->setKey('email')->setValue($_POST['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/')->unique('users', 'email');
    $validation->setKey('password')->setValue($_POST['password'])->required()->confirmed($_POST['confirmed_password']);
    $validation->setKey('phone')->setValue($_POST['phone'])->required()->unique('users', 'phone');
    $validation->setKey('gender')->setValue($_POST['gender'])->required()->in(['m', 'f']);

    if (empty($validation->getErrors())) {
        //     echo "ok";die;
        $code = rand(100000, 999999);
        $user = new User;
        $user->setFirstname($_POST['firstname']);
        $user->setLastname($_POST['lastname']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $user->setPhone($_POST['phone']);
        $user->setGender($_POST['gender']);
        $user->setCode($code);

        try {
            $user->insert();

            $body = "<p>Hello {$_POST['firstname']}.</p> <p>Your verification Code <b>{$code}</b> </p>";
            $verificationCode = new VerificationCode($_POST['email'], "Verification Code", $body);
            if ($verificationCode->send()) {
                $_SESSION['email'] = $_POST['email'];
                header("location:checkCode.php");die;
            } else {
                $error = '<p>Check Your Data</p>';
            }
        } catch (\Exception $e) {
            $error = '<p>Check Your Data</p>';
        }
    }
}
// print_r($validation->getErrors());die;

?>


<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="" method="post">
                                        <?= $error ?? "" ?>
                                        <input type="text" name="firstname" placeholder="First Name" value="<?= $_POST['firstname'] ?? "" ?>">
                                        <?= "<p class='text-danger  '>" . $validation->getError('firstname') . "</p>" ?>
                                        <input type="text" name="lastname" placeholder="Last Name" value="<?= $_POST['firstname'] ?? "" ?>">
                                        <?= "<p class='text-danger   '>" . $validation->getError('lastname') . "</p>" ?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?= "<p class='text-danger   '>" . $validation->getError('password')  . "</p>" ?>
                                        <input type="password" name="confirmed_password" placeholder="Confirm Password">
                                        <?= "<p class='text-danger  '>" . $validation->getError('confirmed_password') . "</p>" ?>
                                        <input name="email" placeholder="Email" type="email" value="<?= $_POST['email'] ?? "" ?>">
                                        <?= "<p class='text-danger  '>" . $validation->getError('email') . "</p>" ?>
                                        <input name="phone" placeholder="Phone" type="number" value="<?= $_POST['phone'] ?? "" ?>">
                                        <?= "<p class='text-danger  '>" . $validation->getError('phone') . "</p>" ?>
                                        <select name="gender" class="form-control" id="">
                                            <option <?= (isset($_POST['gender']) && $_POST['gender'] == 'm') ?  "selected" : '' ?> value="m">Male</option>
                                            <option <?= (isset($_POST['gender']) && $_POST['gender'] == 'f') ?  "selected" : '' ?> value="f">Female</option>
                                        </select>
                                        <?= "<p class='text-danger  '>" . $validation->getError('gender') . "</p>" ?>

                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Register</span></button>
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


include_once('layouts/footer.php');
include_once('layouts/footerscript.php');
?>