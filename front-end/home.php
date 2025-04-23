<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: ../index.php');
    exit;
}

// Retrieve the username from the session
$username = $_SESSION['username'];
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../layout/all.css">
</head>
<body style="background-color:  #353333;">
    
    
        <?php include 'navbar.php';?>
    



<div class="card" style="width: 400px; margin: 30px auto;">
  <div class="card-body"  style="background-color:#5e5e5e;">
    <h5 class="card-title">What's on your mind, <?php echo htmlspecialchars($username); ?>?</h5>
    <form>
      <textarea 
        class="form-control" 
        placeholder="<?php echo htmlspecialchars($username); ?>" 
        rows="4"
        style="color: black; background-color:#e2e2e2;"></textarea>
      <button type="submit" class="btn btn-primary mt-3">Post</button>
    </form>
  </div>
</div>

      
</body>
</html>