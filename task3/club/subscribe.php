<?php
session_start();
if($_POST){

    $memberName=$_POST['membername'];
    $familyCount=$_POST['memberscount'];

    $_SESSION['familyCount']=$familyCount;

    $cost=($familyCount * 2500) + 10000;
    // echo $cost;
    $_SESSION['cost']=$cost ;
    $_SESSION['username']=$memberName;

    header('location:games.php');
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
        <div class="mb-3">
            <label for="Membername" class="form-label">Member Name</label>
            <input type="text" class="form-control" name="membername" id="Membername" aria-describedby="emailHelp" required>
            <div id="emailHelp" class="form-text">Club subscribtion starts with 10,000 LE.</div>
        </div>
        <div class="mb-3">
            <label for="Memberscount" class="form-label">Count of family members</label>
            <input type="number" class="form-control" name="memberscount" id="Memberscount" required>
            <div id="emailHelp" class="form-text">Cost of each member is 2,500 LE.</div>

        </div>
     
        <button type="submit" class="btn btn-primary">Subscribe</button>
    </form>
    </div>
    </div>
 </body>
 </html>