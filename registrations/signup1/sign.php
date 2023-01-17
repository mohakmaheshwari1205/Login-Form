<?php

$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password'];


    // $sql="insert into `registrations` (username,password) values('$username','$password')";

    // $result=mysqli_query($con,$sql);

    // if($result){
    //     echo "Data inserted Successfully";
    // }
    // else{
    //     die(mysqli_error($con));
    // }


    $sql="Select * from `registrations` where username='$username'";

    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
         //   echo "User already Exists";
            $user=1;
        }else{
            $sql="insert into `registrations` (username,password) values('$username','$password')";

    $result=mysqli_query($con,$sql);

    if($result){
       // echo "Signup Succesfull";
        $success=1;
        header('location:login.php');
    }
    else{
        die(mysqli_error($con));
    }
        }
    }
}

?>

<script>
  function validateForm() {
  var x = document.forms["myform"]["username"].value;
  var y = document.forms["myform"]["password"].value;
  if (x == "" || y== "") {
    alert("All Entries must be filled out");
    return false;
  }
}
</script>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

 

<?php

if($user){
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Ohh no sorry!</strong> User already exixts.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>


<?php

if($success){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success</strong> User created Successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

?>

    <h1 class="text-center mt-5">Sign up page</h1>
    <div class="container mt-5">
    <form name="myform" action="sign.php" onsubmit="return validateForm()" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" placeholder="Enter your username" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password" name="password">
  </div>
 
  <div class="text-center"><button type="submit" class="btn btn-primary w-20">Signup</button></div>
</form>
    </div>
   
    <div class="text-center mt-5">Already have an account?<br> <a href="login.php">Click here</a></div>

  </body>
</html>