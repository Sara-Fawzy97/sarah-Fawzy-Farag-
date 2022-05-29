<?php
$title="Reset Your Password";
include_once('layouts\header.php');
include_once ("App/Middleware/auth.php");

use App\Database\Models\User;
use App\Http\Requests\Validations;
 
$validation = new Validations;
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $validation->setKey('password')->setValue($_POST['password'])->required()->confirmed($_POST['password_confirmation']);
    $validation->setKey('password_confirmation')->setValue($_POST['password_confirmation'])->required();
 
    if(empty($validation->getErrors())){
        $code = rand(100000,999999);
        $user = new User;
        $user->setEmail($_SESSION['email']);
        $user->setPassword($_POST['password']);
    try{
        $user->updatePasswordByEmail();
        header('location:login.php');die;

    }catch(\Exception $e){
        $error = "<p > something  wrong </p>";
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
                                        <input type="password" name="password" placeholder="New Password">
                                        <?= "<p class='text-danger font-weight-bold'>".$validation->getError('password')."</p>" ?>
                                        <input type="password" name="password_confirmation" placeholder="Confrim Password">
                                        <?= "<p class='text-danger font-weight-bold'>".$validation->getError('password_confirmation')."</p>" ?>
                                        <div class="button-box">
                                            <button type="submit"><span>Change</span></button>
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