










  <?php
  $showAlert=false;
//   $id=$_GET['id'];
  if ($_SERVER['REQUEST_METHOD']== "POST") {
    include 'dbconnect.php';

    
    $id=$_POST['id'];
    $product=$_POST['product'];
    $description=$_POST['description'];
    $color=$_POST['color'];
    $price=$_POST['price'];
    $countity=$_POST['countity'];
    $image =$_FILES['image']['name'];

    if (isset($_POST['update_btn'])) {
      $id=$_POST['id'];
    $product=$_POST['product'];
    $description=$_POST['description'];
    $color=$_POST['color'];
    $price=$_POST['price'];
    $countity=$_POST['countity'];
    $image =$_FILES['image']['name'];
    
     if ($image!="") {
      move_uploaded_file($_FILES['image']['tmp_name'], "data/".$image);
       $sql= "UPDATE `product` SET `product-name`='$product',`description`='$description',`color`='$color',`price`='$price',`countity`='$countity',`image`='$image' WHERE id=$id";
      $result = mysqli_query($conn,$sql);
      header('location:index.php');
      
    }
    else {
      $sql= "UPDATE `product` SET `product-name`='$product',`description`='$description',`color`='$color',`price`='$price',`countity`='$countity' WHERE id=$id";
      $result = mysqli_query($conn,$sql);
      header('location:index.php');
    }
  }

      // print_r($_POST);
      // print_r($_FILES);


  }











  if ($_SERVER['REQUEST_METHOD']== "GET") {
  $id=$_GET['id'];
  include 'dbconnect.php';
  $sql= "SELECT * FROM `product`WHERE id=$id ";  
  $result=mysqli_query($conn,$sql);
  $row=mysqli_fetch_assoc($result);
  // print_r($row);

  }
    

?>



<!doctype html>
<html lang="eg" >
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

   
  </head>
  <body>






<div class="container">
  <h2 class="text">Update the product</h2>

<form action="/product/edit.php" method="POST" enctype="multipart/form-data">
<div class="form-group">
<label for="product">Product-Name</label>
<input type="text" class="form-control" id="product" name="product" value="<?php if ($_SERVER['REQUEST_METHOD']== "GET") { echo $row['product-name'];}?>" aria-describedby="emailHelp">
<input type="text" class="form-control" id="product" name="id" value="<?php echo $row['id']?>" aria-describedby="emailHelp">
</div>

<div class="form-group">
<label for="description">Description</label>
<input type="text" class="form-control" id="description" name="description" value="<?php if ($_SERVER['REQUEST_METHOD']== "GET"){ echo $row['description'];}?>">
</div>

<div class="form-group">
<label for="color">Color</label>
<input type="text" class="form-control" id="color" name="color" value="<?php if ($_SERVER['REQUEST_METHOD']== "GET") {echo $row['color'];}?>">
</div>

<div class="form-group">
<label for="price">Price</label>
<input type="text" class="form-control" id="price" name="price" value="<?php if ($_SERVER['REQUEST_METHOD']== "GET") { echo $row['price'];}?>">
</div>

<div class="form-group">
<label for="countity">Countity</label>
<input type="text" class="form-control" id="countity" name="countity" value="<?php if ($_SERVER['REQUEST_METHOD']== "GET"){ echo $row['countity'];}?>">
</div>

<div class="form-group">
<label for="image">Image</label>
<input type="file" class="form-control" id="image" name="image" value="">
<img src="data/<?php if ($_SERVER['REQUEST_METHOD']== "GET"){ echo $row['image'];}?>" alt="" width="100px">
</div>


<button type="submit" class="btn btn-primary my-3" name="update_btn">update</button>
</form>

</div>


<!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
  </body>
</html>



<!-- ###################################################################### -->
    

    






