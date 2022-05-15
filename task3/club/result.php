<?php
session_start();
// $_SESSION['username'];
// $_SESSION['membersName'];

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
        <div class="card border-primary mb-3 mt-5" >
        <div class="card-header bg-transparent border-primary"><?= "<strong> Subscriber </strong>".  $_SESSION['username']?></div>
           <div class="card-body text-primary">
        <table class="table table-primary">
     <thead>
      <tr>
        <th scope="col">Subscriber</th>
        
       
       </tr>
      </thead>
    <tbody>
  <?php for($i=0 ; $i< $_SESSION['familyCount'];$i++){?> 
     <tr> 
      <td><?= $_SESSION['membersName'][$i]?></td>
      <td><?=$_SESSION['football'][$i];?></td>
      <td><?=$_SESSION['swimming'][$i];?></td>
      <td><?=$_SESSION['volley'][$i];?></td>
      <td><?=$_SESSION['others'][$i];?></td>
      <td><?=  ?></td>
      </tr>
   <?php }?>
     
  </tbody>
    </table>
</div></div>
    </div>
    </div>
 </body>
 </html>