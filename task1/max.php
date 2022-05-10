<?php
if($_POST){
    $num1=$_POST['number1'];
    $num2=$_POST['number2'];
    $num3=$_POST['number3'];

    if($num1==null || $num2== null || $num3==null)
      $msg="Fill the Form";
    if($num1> $num2 && $num1 > $num3){
        $maxNumber= $num1;
    }elseif($num2> $num1 && $num2 >$num3)
        $maxNumber=$num2;
    elseif($num3> $num1&& $num3>$num2 ) 
        $maxNumber=$num3;
        

    if($num1 < $num2 && $num1 < $num3)
            $minNumber=$num1;
    elseif($num2 < $num1 && $num2 < $num3)
            $minNumber=$num2;
    elseif($num3< $num1&& $num3< $num2 ) 
            $minNumber= $num3;
    

}
?>



<!doctype html>
<html lang="en">

<head>
    <title>min/max numbers</title>
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
                Max / Min number
            </div>
            <div class="col-4 offset-4 my-5">
                <form method="post">
                    <div class="form-group">
                        <label for="Number1">Number 1</label>
                        <input type="number" name="number1" id="Number1" class="form-control">
                        
                        <label for="Number2">Number 2</label>
                        <input type="number" name="number2" id="Number2" class="form-control">
                        
                        <label for="Number3">Number 3</label>
                        <input type="number" name="number3" id="Number3" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger rounded btn-sm"> Check </button>
                    </div>
                     <?php 
                     
                     if (isset($msg)){
                         echo $msg;
                     }
                        if(isset($maxNumber)){
                           echo "<b>Max Number: </b> " . $maxNumber . "<br>";
                        }
                    
                        if(isset($minNumber)){
                        echo "<b>Min Number: </b> " . $minNumber;
                    }
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