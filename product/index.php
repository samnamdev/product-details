<?php
    session_start();
    
?>
<?php
  $showAlert=false;
  if ($_SERVER['REQUEST_METHOD']== "POST") {
    include 'dbconnect.php';

    
    $product=$_POST['product'];
    $description=$_POST['description'];
    $color=$_POST['color'];
    $price=$_POST['price'];
    $countity=$_POST['countity'];
    $image =$_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "data/".$image);
    

     $sql= "INSERT INTO `product` ( `id`,`product-name`, `description`, `color`, `price`, `countity`, `image`, `date`) VALUES ('', '$product', '$description', '$color', '$price', '$countity', '$image', current_timestamp())";
    $result = mysqli_query($conn,$sql);
    if ($result) {
      $showAlert=true;
    }

      // print_r($_POST);
      // print_r($_FILES);


  }


?>










<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <title>Product</title>
  </head>
  <body>

  <style>
    h2{
      color:DodgerBlue;
    }
  </style>
   
   
   <div class="container">
      <h2 class=" my-4">Hello,Enter your product details</h2>

    <form action="/product/index.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="product">Product-Name</label>
    <input type="text" class="form-control" id="product" name="product" aria-describedby="emailHelp">
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description">
  </div>

  <div class="form-group">
    <label for="color">Color</label>
    <input type="text" class="form-control" id="color" name="color">
  </div>

  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" id="price" name="price">
  </div>

  <div class="form-group">
    <label for="countity">Countity</label>
    <input type="text" class="form-control" id="countity" name="countity">
  </div>

  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control" id="image" name="image">
  </div>
  
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>



    <div class="container my-4">
     

<h3> <b>Product Data </b></h3>

     <form action="delete.php" method="POST">
    <table class="table my-2" id="myTable">
  <thead>
    <tr>
      <th scope="col"><button class="btn btn-danger" name="product_delete" type="submit">Delete</button></th>
      <th scope="col">Id</th>
      <th scope="col">Image</th>
      <th scope="col">Product-Name</th>
      <th scope="col">Description</th>
      <th scope="col">Color</th>
      <th scope="col">Price</th>
      <th scope="col">Countity</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody>
    <?php
    include 'dbconnect.php';
        $sql= "SELECT * FROM `product` ";  
        $result=mysqli_query($conn,$sql);
        $id=0;
        while ($row=mysqli_fetch_assoc($result)) {
        $id=$id+1;
        
        echo '<tr>
                    <th scope="row"><input type="checkbox" name="product_delete_id[]" value="'.$row['id'].'"></th>
                    <th scope="row">'.$id.'</th>
                    <td><img src="data/'.$row['image'].'" alt="" width="100px"></td>
                    <td>'.$row['product-name'].'</td>
                    <td>'.$row['description'].'</td>
                    <td>'.$row['color'].'</td>
                    <td>'.$row['price'].'</td>
                    <td>'.$row['countity'].'</td>
                    <td><a href="edit.php?id='.$row['id'].' " class="btn btn-primary" >Edit</a></td>
              </tr>';


        }
    ?>
   
    
  </tbody>
</table>
</form>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>  

<hr>
<!-- ################################################################################################################################### -->

<!-- <div class="container my-2">

    <div class="card" style="width: 18rem;">
  <img src="https://th.bing.com/th/id/R.408190a9595200ee3311f564e05092cc?rik=lkB2hLzUAqkjBQ&riu=http%3a%2f%2f1.bp.blogspot.com%2f-mHEBFiFHfnk%2fT8JZH3G2S6I%2fAAAAAAAAANI%2fBIer9FosFek%2fs1600%2fwild-animal-wallpaper-016.jpg&ehk=B95VjuD4lkYi3NvWQUUnybubtT5XCucogJ3iWQ2sdZo%3d&risl=&pid=ImgRaw&r=0" class="card-img-top" alt="..." >
  <div class="card-body">
    <h5 class="card-title">Wild</h5>
    <p class="card-text">Wildlife refers to undomesticated animal species, but has come to include all organisms that grow or live wild in an area without being introduced by humans.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

   
</div> -->

</body>
</html>