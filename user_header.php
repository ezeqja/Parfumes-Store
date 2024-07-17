<?php
if(isset($message)){
    foreach($message as $message){
        echo '
        <div class="message">
            <span>'.$message.'</span>
            <i class="fa-solid fa-xmark" onclick="this.parentElement.remove();"></i>
        </div>
    ';    
    } 
}
?>
<header class="user_header">
  <div class="header_1">
    <div class="user_flex">
      <div class="logo_cont">
        <img src="book_logo.png" alt="">
        <a href="home.php" class="book_logo">Parfumes</a>
      </div>

      <nav class="navbar">
        <a href="home.php">Home</a>
        <a href="shop.php">Shop</a>
      </nav>

      <div class="last_part">
        <div class="loginorreg">
          <?php
          if(isset($_SESSION['user_id'])) {
              echo '<a href="logout.php" class="delete-btn">Logout</a>';
          } else {
              echo 'New <a href="login.php">Login</a> | <a href="signup.php">sign up</a>';
          }
          ?>
        </div>
      </div>

      <?php if(isset($_SESSION['user_id'])): ?>
      <div class="header_acc_box">
        <p>Username : <span><?php echo $_SESSION['user_name'];?></span></p>
        <p>Email : <span><?php echo $_SESSION['user_email'];?></span></p>
      </div>
      <?php endif; ?>

    </div>
  </div>
</header>