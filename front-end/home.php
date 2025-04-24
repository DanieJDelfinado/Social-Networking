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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body style="background-color:  #353333;">
    
    
        <?php include 'navbar.php';?>
    



<div class="card" style="width: 400px; margin: 30px auto;">
  <div class="card-body"  style="background-color:#5e5e5e;">
    <h5 class="card-title">What's on your mind, <?php echo htmlspecialchars($username); ?>?</h5>
    <form action="../back-end/post.php" method="POST">
      <textarea 
      name="content"
        class="form-control" 
        placeholder="<?php echo htmlspecialchars($username); ?> " 
        rows="4"
        style="color: black; background-color:#e2e2e2;"></textarea>
      <button type="submit" class="btn btn-primary mt-3">Post</button>
    </form>
  </div>
</div>

<div id="posts-container" class="mt-4" style="width: 400px; margin: 0 auto;">
    <!-- Posts will be loaded here -->
</div>



<script>
$(document).ready(function () {
    function loadPosts() {
        $.ajax({
            url: '../back-end/get_post.php',
            method: 'GET',
            dataType: 'json',
            success: function (data) {
                let html = '';
                data.forEach(post => {
                    html += `
                        <div class="card mb-3">
                            <div class="card-body" style="background-color:#d8d8d8;">
                                <h6><strong>${post.username}</strong></h6>
                                <p>${post.content}</p>
                                <small class="text-muted">${post.created_at}</small>
                            </div>
                        </div>
                    `;
                });
                $('#posts-container').html(html);
            },
            error: function () {
                $('#posts-container').html('<p style="color: red;">Failed to load posts.</p>');
            }
        });
    }

    loadPosts(); // Call it on page load
});
</script>

      
</body>
</html>