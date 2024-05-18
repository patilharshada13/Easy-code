<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">

    <title>Contact Us</title>
  </head>
  <body>
    
      

      <?php
if ($_SERVER['REQUEST_METHOD']=='POST')
{
$Name=$_POST['Name'];
$email=$_POST['email'];
$Address = $_POST['Address'];


//connecting to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "contact";

//create a connection
$conn = mysqli_connect($servername,$username,$password,$database);


//Die if connection was not successful
if (!$conn){
    die ("sorry we failed to connect".mysqli_connect_error());
}
else{
  $sql = "INSERT INTO `contactas` ( `name`, `email`, `address`) VALUES ( '$Name', '$email', '$Address')";
  $result = mysqli_query($conn, $sql);
}

//sumbited to databse
// sql query to be excuted


if($result){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> Your entry has been submitted successfully!
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
  </button>
</div>';
}
else{
     echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
}
}


?>
      <div class="container mt-3">
        <center>
        <h3>Registration form</h3>
</center>
        <form action="form.php" method="post">

  <div class="form-group">
    <label for="Name">Name </label>
    <input type="text" name="Name" class="form-control" id="Name" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</div>
  </div>
  <div class="form-group">
    <label for="email">email </label>
    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="Address">Address</label>
    <textarea class="form-control" name="Address" id="Address" cols="30" rows="10"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
      

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

   
</body>
</html>