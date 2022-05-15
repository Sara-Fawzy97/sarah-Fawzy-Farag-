<?php
session_start();

if($_POST){
   
 $userphone=$_POST['phone'];
 $_SESSION["userPhone"]=$userphone;
 header('location:review.php');
}

?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Hospital</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 </head>
 <body>
     <div class="container">
    <div class="row">
        <form class="col-5 offset-3 " method="post">
            <h1 class="text-center text-primary mt-5">Hospital</h1>
            <div class="mb-3">
            <label for="Phone" class="form-label"> Your Number</label>
            <input type="number" name="phone" class="form-control" id="Phone"  required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   </div>
   </div>
 </body>
 </html>