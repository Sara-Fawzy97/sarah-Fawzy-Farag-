<?php 
if($_POST){
        $subj1=$_POST["sub1"];
        $subj2=$_POST["sub2"];
        $subj3=$_POST["sub3"];
        $subj4=$_POST["sub4"];
        $subj5=$_POST["sub5"];

        $total=$subj1+ $subj2 + $subj3 +$subj4+ $subj5;
       define('MAX_GRADE',100);
        
       $percentage =($total/(MAX_GRADE*5))* MAX_GRADE;
    //    echo '<b>Percentage : </b>' . $result . '%';
            if($percentage >=90 && $percentage < 100)
              $grade= "A";
            elseif ($percentage < 90 && $percentage >= 80)
              $grade= "B";
            elseif ($percentage < 80 && $percentage >= 70)
              $grade= "c";
             elseif ($percentage < 70 && $percentage >=60 )
              $grade="D" ;
              elseif ($percentage < 60 && $percentage >=40 )
              $grade="E";
              elseif ($percentage < 40  )
                $grade="F" ;
              


}
?>

<!doctype html>
<html lang="en">

<head>
    <title>grade</title>
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
              Grade System
            </div>
            <div class="col-4 offset-4 my-5">
                <h4>Enter Student's Marks</h4>
                <form method="post">
                    <div class="form-group">
                        <label for="Sub1">Physics</label>
                        <input type="number" name="sub1" id="Sub1" class="form-control">
                        
                        <label for="Sub2">Chemistry</label>
                        <input type="number" name="sub2" id="Sub2" class="form-control">
                        
                        <label for="Sub3">Biology</label>
                        <input type="number" name="sub3" id="Sub3" class="form-control">
                        
                        <label for="Sub4">Mathematics</label>
                        <input type="number" name="sub4" id="Sub4" class="form-control">
                        
                        <label for="Sub5">Computer</label>
                        <input type="number" name="sub5" id="Sub5" class="form-control">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-outline-danger rounded btn-sm"> Result </button>
                    </div>
                    
                    <?php
                        print_r("<b>Total : </b>" . $total ." <br>");
                         echo   '<b>percentage : </b>' . $percentage  . '% <br>';
                       echo '<b>Grade : </b>' . $grade ."<br>" ;

                    //  echo "<b>Output = </b>" . "$total /" ."(MAX_GRADE*5)*" ." MAX_GRADE ";
            
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