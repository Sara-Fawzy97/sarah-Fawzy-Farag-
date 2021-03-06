<?php

use App\Database\Models\User;
use App\Http\Requests\Validations;

$title = "Verification Code";
include_once("layouts\header.php");
$validation = new Validations;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $validation->setKey('code')->setValue($_POST['code'])->required()->digits(6)->exist('users', 'code');
    if (empty($validation->getErrors())) {
        $user = new User;
        $user->setCode($_POST['code']);
        $user->setEmail($_SESSION['email']);

        if ($user->checkCode()->get_result()->num_rows == 1) {
            $user->setEmail_verfied_at(date('y-m-d h:i:s'));
            if ($user->makeUserVerified()) {
                unset($_SESSION['email']);
                header('location:login.php');
                die;
            } else {
                $error = '<p>Check Your Data</p>';
            }
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
                            <h4> Check Code </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form action="" method="post">
                                        <?= $error ?? "" ?>
                                        <input type="number" name="code" placeholder="Verification Code">
                                        <?= "<p class='text-danger font-weight-bold'>" . $validation->getError('code') . '</p>' ?>
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