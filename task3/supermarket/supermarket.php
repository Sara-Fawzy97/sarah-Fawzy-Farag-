<?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
 $userName=$_POST['username'];
 $city=$_POST['city'];
 $productsnumber=$_POST['number'];

 if($city =="cairo"){
     $fees=0;
 }elseif($city=="giza")
  {$fees=30;}
  elseif($city=="alex")
 { $fees=50;}
  else {$fees=100;}

if(!empty($_POST['productname'])){
 $products=$_POST['productname'];
 $price=$_POST['price'];
 $quantity=$_POST['quantity'];
}
  
}

?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Supermarket</title>

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 </head>
 <body>
     <div class="container">
    <div class="row">
 <form class="col-5 offset-3 " method="post">
     <h1 class="text-center text-success mt-5">Super Market</h1>
  <div class="mb-3">
    <label for="Name" class="form-label"> User Name</label>
    <input type="text" name="username" value="<?= $_POST['username'] ??'' ?>" class="form-control" id="Name"  required>
  </div>
  <div class="mb-3">
    <label for="City" class="form-label">City</label>
    <input type="text" class="form-control" value="<?= $_POST['city']??'' ?>"  id="City" name="city" required>
  </div>
  <div class="mb-3">
    <label for="Number" class="form-label">Products Number</label>
    <input type="number" class="form-control" value="<?= $_POST['number']?? ''?>"  id="Number" name="number" required>
   
  </div>
  <button type="submit" class="btn btn-success">Continue</button>
  
  <!-- form for enter  products data -->
  <?php if(!empty($_POST['number']) && !isset($_POST['productname'])){
        for ($i=0; $i < $productsnumber ; $i++) { 
      ?>
        <div class="row mt-5">
        <div class="col">
            <input type="text" class="form-control"   placeholder="Product Name" name="productname[]" required>
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="Product Price" name="price[]" required >
        </div>
        <div class="col">
            <input type="number" class="form-control" placeholder="Quantity"  name="quantity[]" required >
        </div>
        </div>
<?php  
 } ?>

  <button type="submit" class="btn btn-success mt-3 ">Receipt</button>
  <?php }?>

     </form>

<!-- To display reciept details -->
<?php 
if(!empty($_POST["productname"])&& isset($_POST["price"] )&& isset( $_POST["quantity"])){
  
  ?> 
    <div class="card border-success mb-3 mt-5" >
        <div class="card-header bg-transparent border-success"><?= $userName?></div>
           <div class="card-body text-success">

  <table class="table table-success">
     <thead>
      <tr>
        <th scope="col">Product Name</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Sub Total</th>
       </tr>
      </thead>
    <tbody>
     <?php 
      for( $i=0 ; $i < $productsnumber ; $i++ ){ 
       ?>
     <tr> 
      <td><?= $_POST['productname'][$i];?></td>
      <td><?=$_POST['price'][$i];?></td>
      <td><?=$_POST['quantity'][$i];?></td>
      <td><?= $subtotal= $_POST['price'][$i]*$_POST['quantity'][$i]; ?></td>
      </tr>

     <?php 
     $total=0;
     $total+= $subtotal; 
      if($total<= 1000 )
      $discount =$total*0;
    elseif($total >1000 && $total <= 3000)
      $discount=$total*.1;
    elseif($total >3000 && $total <= 4500)
      $discount=$total*.15;
    elseif ( $total >4500)
      $discount=$total*.2;} 
    $totalAfterDiscount=$total- $discount ;
           }   ?>
  </tbody>
    </table>
    <?php 
     
    if(isset($city) && isset($totalAfterDiscount)){
    echo"<strong>City : </strong>" . $city ."<br>"
    ."<strong>Total : </strong>".$total." EGP <br>"
    ."<strong>Discount : </strong>".$discount." EGP <br>" 
    ."<strong>Total After Discount : </strong>". $totalAfterDiscount ." EGP <br>" 
    ."<strong>Delivery : </strong>" .$fees. " EGP <br>"; ?>
</div>
  <div class="card-footer bg-transparent border-success"><?= "<strong>Net Total : </strong>" . $totalAfterDiscount + $fees ." EGP" ;}?></div>
</div>


</div>
 </body>
 </html>