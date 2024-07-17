<?php
include 'config.php';

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $user_type = $_POST['user_type'];

    
    $check_user_query = "SELECT * FROM register WHERE email='$email'";
    $check_user_result = mysqli_query($conn, $check_user_query);
    if(mysqli_num_rows($check_user_result) > 0){
        $message = 'User already exists!';
    } else {
        
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        
        $insert_user_query = "INSERT INTO register (name, email, password, user_type) VALUES ('$name', '$email', '$hashed_password', '$user_type')";
        if(mysqli_query($conn, $insert_user_query)){
            $message = 'Registered Successfully!';
            header('Location: login.php');
            exit();
        } else {
            $message = 'Registration failed. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
<?php if(isset($message)): ?>
    <div class="message">
        <span><?php echo $message; ?></span>
        <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
    </div>
<?php endif; ?>

<div class="box">
    <span class="borderline"></span>
    <form action="" method="post">
        <h2>Register</h2>
        <div class="inputbox">
            <input type="text" name="name" required>
            <span>Name</span>
            <i></i>
        </div>

        <div class="inputbox">
            <input type="email" name="email" required>
            <span>Email</span>
            <i></i>
        </div>

        <div class="inputbox">
            <input type="password" name="password" required>
            <span>Password</span>
            <i></i>
        </div>

        <div class="inputbox">
            <input type="password" name="cpassword" required>
            <span>Confirm Password</span>
            <i></i>
        </div>
        
        <div class="inputbox">
            <select name="user_type">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
            <i></i>
        </div>
        
        <div class="links">
            <a href="#">Forgot Password</a>
            <a href="login.php">Login</a>
        </div>

        <input type="submit" value="Register Now" name="submit">
    </form>
</div>
</body>
</html>