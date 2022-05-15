<?php
session_start();


$_SESSION['total'];
  if($_SESSION['total'] < 25){
        $totalReview="Bad";
        $msg=" We will call you later on this phone <strong>". $_SESSION['userPhone']. "</strong>";
    }
    else{
        $totalReview="Good";
         $msg="Thank you!!!!!";}
        
       

?>

<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Hospital Review</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 </head>
 <body>
     <div class="container">
    <div class="row">
            <h1 class="text-center text-primary mt-5 ">Hospital Review</h1>
            <table class="table table-primary table-striped mt-5"">
                <thead>
                    <tr>
                    <th scope="col">Question</th>
                    <th scope="col">Reviews</th>
                    </tr>
                </thead>
                <tbody>
                <form method='post'>  
           
                    <tr>
                    <th scope="row">Are You Satisfied with the level of cleanliness ?</th>
                <td> <?=  $_SESSION['reviews'][0]?></td>
                  </tr>
                    <tr>
                    <th scope="row">Are you satisfied with the service prices ?</th>
                <td> <?=  $_SESSION['reviews'][1]?></td>
                    </tr>
                    <tr>
                    <th scope="row">Are you satisfied with the nursing service ? </th>
                <td> <?=  $_SESSION['reviews'][2]?></td>
                   </tr> 
                    <tr>
                    <th scope="row">Are you satisfied with the level of doctors ? </th>
                <td> <?=  $_SESSION['reviews'][3]?></td>
                   </tr>
                    <tr>
                    <th scope="row">Are you satisfied with the calmness in the hospital ? </th>
                    <td> <?=  $_SESSION['reviews'][4]?></td>
                   </tr>
                   <tr>
                    <th scope="row">Total Review : </th>
                <td><strong> <?=$totalReview?></strong></td>
                   </tr>
                    <div>
                  

                </tbody>
              
                </form>
            </table>
            <p class="text-center text-danger"><strong><?= $msg?></strong></p>
            
   </div>
   </div>
 </body>
 </html>