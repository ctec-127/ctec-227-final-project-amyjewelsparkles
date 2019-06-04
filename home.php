<?php session_start(); 
include_once 'inc/layout/header.php';
include_once 'inc/layout/navbar.php';
?>

<div class="container mt-4">
    <section>
        <h2>Welcome to Self-Cared</h2>
        <h3>Login</h3>    
        <form action="home.php" method="POST">
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
        $_SESSION['user_id'] = $row['user_id'];

        header('location: user_home.php');
        
     } else {
         echo '<p>Please try again or go away</p>';
     }
     
    //  var_dump($result);

    }

    ?>
<?php include_once 'inc/layout/footer.php'; ?>
