<?php
if($_POST){
    $num1=$_POST['number1'];
    $num2=$_POST['number2'];

    $operation=$_POST['operation'];    


      switch($operation){
            case '+':
                $result=$num1 + $num2; 
                break;
            case '-':
                $result=$num1 - $num2;
                break;
            case '*':
                $result=$num1 * $num2;
                break;
            case '/':
                $result=$num1 / $num2;
                break;
            case '%':
                $result=$num1 % $num2;
                
        }



}
?>

<!doctype html>
<html lang="en">

<head>
    <title> Calculator</title>
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
                Calculator
            </div>
            <div class="col-4 offset-4 my-5">
                <form method="post">
                    <div class="form-group">
                        <label for="Number1">Enter Your Number</label>
                        <input type="number" name="number1" id="Number1" class="form-control">
                    
                        <label for="Number2">Enter The Power </label>
                        <input type="number" name="number2" id="Number2" class="form-control">
                       
                    </div>
                    <div class="form-group">
                        <button name="operation" value="+" class="btn btn-outline-danger rounded btn-sm"> + </button>
                        <button name="operation" value ="-" class="btn btn-outline-danger rounded btn-sm"> - </button>
                        <button name="operation" value ="*"  class="btn btn-outline-danger rounded btn-sm"> * </button>
                        <button name="operation" value ="/"  class="btn btn-outline-danger rounded btn-sm"> / </button>
                        <button name="operation" value ="%"   class="btn btn-outline-danger rounded btn-sm"> % </button>
                    </div>
                        <h5>Result:</h5>
                        <?php
                       if(isset($result))
                           echo $result;
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