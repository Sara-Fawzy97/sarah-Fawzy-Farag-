<?php
session_start();
if($_POST){
   
    $familyCount = $_SESSION['familyCount'];

    if(isset($_POST['football'],$_POST['swimming'],$_POST['volley'],$_POST['others'])){
    $football=$_POST['football'];
    $swimming=$_POST['swimming'];
    $volley=$_POST['volley'];
    $others=$_POST['others'];

    $membersNo=$_POST['membersname'];
    
    print_r($football);
    // foreach($football->football as $key=>$value){
    //     echo $value;
    // } 
    $_SESSION['football']=$football;
    $_SESSION['swimming']=$swimming;
    $_SESSION['others']=$others;
    $_SESSION['volley']=$volley;
    $_SESSION['membersName']=$membersNo;
    }
    header('location:result.php');
}

?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Club</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 </head>
 <body>
     <div class="container">
    <div class="row">
        <h1 class="text-center text-primary mt-5">CLUB</h1>

    <form class="col-5 offset-3" method="post">
   <?php for($i=0 ; $i < $_SESSION['familyCount'] ; $i++){?>

    <h1 class="mt-5"> Member <?= $i+1 ?> </h1> 
    <div class="mb-3">
            <input type="text" class="form-control" name="membersname[]" id="Membername" placeholder="Member Name" required>
        </div>
       <div class="form-check">
            <input class="form-check-input" type="checkbox" value="300"  name="football[]" id="Football">
            <label class="form-check-label" for="Football" >
               Football <strong>300 LE</strong>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox"  name="swimming[]" value="250" id="Swimming" >
            <label class="form-check-label" for="Swimming">
                 Swimming <strong>250 LE</strong>
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="150"  name="volley[]"  id="Volley">
            <label class="form-check-label" for="Volley">
                Volleyball <strong>150 LE</strong>           
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="100"  name="others[]"  id="Others" >
            <label class="form-check-label" for="Others">
                Others <strong>100 LE</strong>
            </label>
        </div>
     <?php } ?>
     <div class="d-grid gap-2 col-6 mx-auto mt-5 mb-5">
  <button class="btn btn-primary" >Check Price</button> </div>
    </form>
    </div>
    </div>
 </body>
 </html>