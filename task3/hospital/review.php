<?php
session_start();

if($_POST){
 
 
    $questionsRate=  array($_POST['question1'],$_POST['question2'],$_POST['question3'],$_POST['question4'],$_POST['question5']);
//    print_r($questionsRate);
  $_SESSION['questionRate']=$questionsRate;

  $reviews=[];
 
    foreach($questionsRate as  $value){
       
        if( $value==0)
          $review='Bad';
        elseif($value==3)
          $review='Good';
        elseif($value==5)
          $review='V.Good';
        else  $review="Excellent";
        
           array_push($reviews,$review);
        
     
    }
// print_r($reviews);

    $_SESSION['reviews']=$reviews;
   $total=$question1Value +$question2Value +$question3Value +$question4Value + $question5Value;
    
 $_SESSION['total'] = $total;
  
    header('location:result.php');

}
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
                    <th scope="col">Ques.</th>
                    <th scope="col">Bad</th>
                    <th scope="col">Good</th>
                    <th scope="col">V.Good</th>
                    <th scope="col">Exellent</th>
                    </tr>
                </thead>
                <tbody>
                <form method='post'>  
                    <tr>
                    <th scope="row">Are You Satisfied with the level of cleanliness ?</th>
                    <td> <input class="form-check-input" type="radio" name="question1" id="input1" value='0' ></td>
                    <td> <input class="form-check-input" type="radio" name="question1" id="input2" value='3' ></td>
                    <td> <input class="form-check-input" type="radio" name="question1" id="input3" value='5' ></td>
                    <td> <input class="form-check-input" type="radio" name="question1" id="input3" value='10' ></td>
                    </tr>
                    <tr>
                    <th scope="row">Are you satisfied with the service prices ?</th>
                    <td> <input class="form-check-input" type="radio" name="question2" id="input3" value='0' ></td>
                    <td> <input class="form-check-input" type="radio" name="question2" id="input3" value='3' ></td>
                    <td> <input class="form-check-input" type="radio" name="question2" id="input3" value='5' ></td>
                    <td> <input class="form-check-input" type="radio" name="question2" id="input3" value='10' ></td>
                    </tr>
                    <tr>
                    <th scope="row">Are you satisfied with the nursing service ? </th>
                    <td> <input class="form-check-input" type="radio" name="question3" id="input3" value='0' ></td>
                    <td> <input class="form-check-input" type="radio" name="question3" id="input3" value='3' ></td>
                    <td> <input class="form-check-input" type="radio" name="question3" id="input3" value='5' ></td>
                    <td> <input class="form-check-input" type="radio" name="question3" id="input4" value='10' ></td>
                    </tr> 
                    <tr>
                    <th scope="row">Are you satisfied with the level of doctors ? </th>
                    <td> <input class="form-check-input" type="radio" name="question4" id="input3" value='0' ></td>
                    <td> <input class="form-check-input" type="radio" name="question4" id="input3" value='3' ></td>
                    <td> <input class="form-check-input" type="radio" name="question4" id="input3" value='5' ></td>
                    <td> <input class="form-check-input" type="radio" name="question4" id="input4" value='10' ></td>
                    </tr>
                    <tr>
                    <th scope="row">Are you satisfied with the calmness in the hospital ? </th>
                    <td> <input class="form-check-input" type="radio" name="question5" id="input3" value='0' ></td>
                    <td> <input class="form-check-input" type="radio" name="question5" id="input3" value='3' ></td>
                    <td> <input class="form-check-input" type="radio" name="question5" id="input3" value='5' ></td>
                    <td> <input class="form-check-input" type="radio" name="question5" id="input4" value='10' ></td>
                    </tr>
                    <div>
                  
              
                </tbody>
                <tfoot>
                   <button type="submit" class="btn btn-primary">Result</button> 
                </tfoot>
                </form>
            </table>
            
   </div>
   </div>
 </body>
 </html>