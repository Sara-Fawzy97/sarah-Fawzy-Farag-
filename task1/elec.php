<?php
if($_POST){
   $units=$_POST['unit'];

   if($units < 50 )
         $costPerUnit = .5;
   elseif($units > 50 && $units <= 150 ) 
         $costPerUnit=.75;
   elseif($units > 150 && $units <= 250 ) 
         $costPerUnit= 1.20;
   elseif($units > 250 ) 
         $costPerUnit= 1.50;
   
     define("TAX",.2)    ;
     $cost=$units * $costPerUnit;
     $taxValue= $cost*TAX;
     $costAfterTax= $cost + $taxValue;
   
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>electricity</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center h1 mt-5 text-danger">
                Electricity
            </div>
            <div class="col-4 offset-4 my-5">
                <form method="post">
                    <div class="form-group">
                        <label for="Unit">Enter your consumption</label>
                        <input type="number" name="unit" id="Unit" class="form-control">
                        </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger rounded btn-sm"> Show Cost </button>
                    </div>
                        <?php
                          
                              echo "<b>Unit Cost : </b>". $costPerUnit . "<br>"
                              ."<b>Cost : </b> " . $cost . "<b> EGP </b> <br>"
                              . "<b>Tax : </b>" . TAX*100 . "%<br>"
                              . "<b>Total Cost : </b>". $costAfterTax . "<b> EGP</b>";
                            
                        
                        ?>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>