<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" href="layout/login.css">
</head>
<body>
    
<br><br><br><br>
<center>

<div class="container-lg">

    <h3>Login</h3>
<br><br>
    <form action="back-end/login.php" method="POST">

          <input type="text" name="username" class="form-control" placeholder="Username" required><br>
          <input type="password" name="password" class="form-control" placeholder="Password" required><br>
        
          <input type="submit" class="btn btn-primary" value="Login"><br><br>
          No Account?
            <a href="register.php" >Register</a><br><br>
        </form>

           

</div>
      
</center>

</body>
</html>