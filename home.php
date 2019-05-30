<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Home / Sign-In</title>
</head>
<body>
<div class="container">
    <section>
        <h2>Welcome to Care</h2>
        <h3>Login</h3>    
        <form action="page.php" method="POST">
            <label for="email">Email</label>
            <br><br>
            <input type="email" name="email" id="email" required>
            <br><br>
            <label for="password">Password</label>
            <br><br>
            <input type="password" name="password" id="password" required>
            <br><br>
            <input type="submit" value="Login">
        </form>
        <h3>New user? Want to sign up? <a href="register.php">Click here to Register</a></h3>
    </section>
</div>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
     # Create a new connection to the database
     $db = new mysqli('localhost','root','','care');

     # If there was an error connecting to the database
     if ($db->connect_error) {
         $error = $db->connect_error;
         echo $error;
     }

     # Set the character encoding of the database connection to UTF-8
     $db->set_charset('utf8');

     $email = $_POST['email'];
     $password = hash('sha512',$_POST['password']);

     $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    //  echo $sql;

     $result = $db->query($sql);
     if ($result->num_rows == 1) {

        $_SESSION['loggedin'] = 1;
        $_SESSION['email'] = $email;

        $row = $result->fetch_assoc();
        $_SESSION['first_name'] = $row['first_name'];

        header('location: user_home.php');
        
     } else {
         echo '<p>Please try again or go away</p>';
     }
     
    //  var_dump($result);

    }

    ?>

<!-- jQuery -->
<script src="js/jquery-3.3.1.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>