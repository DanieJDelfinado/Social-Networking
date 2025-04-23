<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="layout/login.css">
</head>
<body>
    
<br><br><br><br>
<center>

<div class="container-lg">

    <h3>Sign up</h3>
<br><br>
    <form action="back-end/signup.php" method="POST">

          <input type="text" name="username" class="form-control" placeholder="Username" required><br>
          <input type="text" name="email" class="form-control" placeholder="Email" required><br>
          <input type="password" name="password" class="form-control" placeholder="Password" required><br>
          <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required><br>
          <input type="submit" class="btn btn-primary" value="Signup"><br><br>
          Alread have an Account?
            <a href="index.php" >Sign in</a><br><br>
        </form>

           

</div>
      
</center>

</body>
</html>


<?php
if (isset($_GET['signup']) && $_GET['signup'] === 'success') {
    echo "<script>
        Swal.fire({
            icon: 'success',
            title: 'Signup Successful',
            text: 'Your account has been created successfully!',
            confirmButtonText: 'OK'
        });
    </script>";
}
?>