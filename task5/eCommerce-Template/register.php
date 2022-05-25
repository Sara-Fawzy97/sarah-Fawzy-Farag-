<?php

$title = "Register";
$breadcrumbHeader = "Register Page";
include_once "layouts/header.php";
include_once "layouts/navbar.php";
include_once "layouts/breadcrumb.php";

use App\Database\Models\User;
use App\Http\Requests\Validation;


$validation = new Validation;

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $validation->setKey('firstname')->setValue($_POST['firstname'])->required()->string()->min(2)->max(32);
    $validation->setKey('lastname')->setValue($_POST['lastname'])->required()->string()->min(2)->max(32);
    $validation->setKey('email')->setValue($_POST['email'])->required()->regex('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/ ') ->unique('users','email');
    $validation->setKey('password')->setValue($_POST['password'])->required()->string();
    $validation->setKey('phone')->setValue($_POST['phone'])->required()->regex('/^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/')->string();
    $validation->setKey('gender')->setValue($_POST['gender'])->required()->string();

    if (empty($validation->getErrors())) {
     
        $code=rand(100000,999999);
        $user = new User;
        $user->setFirst_name($_POST['firstname']);
        $user->setLast_name($_POST['lastname']);
        $user->setEmail($_POST['email']);
        $user->setPassword($_POST['password']);
        $user->setPhone($_POST['phone']);
        $user->setGender($_POST['gender']);
        $user->setCode($code);

        try {
            $user->insert();
            $body="<p>Hello {$_POST['firstname']}</p>";

            $verificationCode= new Verificationcode($_POST['email'],"Verification Code", $body);

            if($verificationCode->send()){
                $_SESSION['email']=$_POST['email'];
                header('location:checkCode.php');die;
            }
            else $error ="<p>Something went wrong</p>";
            
        } catch (\Exception $e) {
            $error = "<p>Something went wrong</p>";
        }
    }

    //  print_r( $validation->getErrors());die;
}

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
                                    <form method="post">
                                        <?=$error ?? ""?>
                                        <input type="text" name="firstname" placeholder="First Name" value="<?= $_POST['firstname'] ?? "" ?>">
                                        <?="<p>".$validation->getError('firstname')."</p>"?> 
                                        <input type="text" name="lastname" placeholder="Last Name" value="<?= $_POST['lastname'] ?? "" ?>">
                                        <?="<p>".$validation->getError('lastname')."</p>"?>
                                        <input name="email" placeholder="Email" type="email" value="<?= $_POST['email'] ?? "" ?>">
                                        <?="<p>".$validation->getError('email')."</p>"?>
                                        <input type="password" name="password" placeholder="Password">
                                        <?="<p>".$validation->getError('password')."</p>"?>
                                        <input name="confirmPassword" placeholder="Confirmed Password" type="password">
                                       
                                        <input name="phone" placeholder="Phone" type="number" value="<?= $_POST['phone'] ?? "" ?>">
                                        <?="<p>".$validation->getError('phone')."</p>"?>
                                        <select name="gender" class="form-control" id="">
                                            <option <?= (isset($_POST['gender']) && $_POST['gender'] == 'm') ?  "selected" : '' ?> value="m">Male</option>
                                            <option <?= (isset($_POST['gender']) && $_POST['gender'] == 'f') ?  "selected" : '' ?> value="f">Female</option>
                                        </select>
                                        <div class="button-box m-4">
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

include_once "layouts/footer.php";
include_once "layouts/footerscript.php";

?>