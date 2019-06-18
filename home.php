<?php session_start(); 
$pageTitle = 'Welcome to Self-Cared';
include_once 'inc/layout/header.php';
include_once 'inc/layout/navbar.php';
?>

<?php
    function getInterests(){

        $interest_sql = "SELECT interest, title, description, image FROM interest order by RAND() LIMIT 1";
        $db = new mysqli('localhost','root','','care');
        if ($db->connect_error) {
            $error = $db->connect_error;
            echo $error;
        }
        $db->set_charset('utf8');

        $interest_result = $db->query($interest_sql);
        //building an array of intrest cards
        
        if ($interest_result->num_rows > 0) {
            while ($row = $interest_result->fetch_assoc()){
                echo '<div class="card" style="width: 35rem;">';
                    echo '<img class="card-img-top" src="img/'.$row['image'].'.jpg" alt="'.$row['image'].'">';
                    echo '<div class="card-body">';
                        echo '<h5 class="card-title">'.$row['title'].'</h5>';
                        echo '<p class="card-text">'.$row['description'].'</p>';
                    echo '</div>';
                echo '</div>';
            }
        }

    }

    $message = "";

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
        $_SESSION['interest'] = $row['interest'];

        header('location: user_home.php');

        } else {
            $message = '<p class="alert alert-danger">The email and/or password do not match. Please try again.</p>';
        } 
     
    }// end main if server request POST

?>

<div class="row">
    <div class="col-6">
        <?php echo (isset($message)) ? $message : ''; ?>
        <hr>
        <h2>Welcome to Self - Cared</h2>
        <hr>
        <p>This site is not used to diagnose or treat any medical condition. It is a tool to keep a track of ones daily emotional state so that one is better able to understand their emotions and get help if needed. </p>
        <p>Unlike other tracking apps, Self-Cared, provides a simple and easy to use medium to track ones moods, what triggered them, weight, and personal notes in one simple form.</p>
        <p>Once you enter your daily log, the system generates a score based on your input. Ideal daily score should be under 20 points. Any score above that highlights possible issues that may need to be addressed.</p>

        <hr>
        <?php getInterests(); ?>

    </div>
    <div class="col-1"></div>
        
    <div class="col-md-4">
        <div id="logindiv">

            <h3>Login</h3>
            <form action="home.php" method="POST">
                <label for="email">Email</label>
                <br>
                <input class="form-control" type="email" name="email" id="email" required <?php echo (isset($_POST['email'])) ? 'value="'.$_POST['email'].'"' : 'placeholder="e-mail"'; ?>>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="password">Password:</label>
                    </div>
                    <div class="col text-right">
                        <input type="checkbox" id="show" onclick="showPassword('password')"><label for="show"><i class="far fa-eye"></i></label>
                    </div>
                </div>
                <input class="form-control" type="password" name="password" id="password" required <?php echo (isset($_POST['password'])) ? 'value="'.$_POST['password'].'"' : ''; ?>>
                <br>
                <input class="btn btn-block mybutton" type="submit" value="Login">
                <br>
                <div class="text-center">
                    New user?<a href="register.php"> Click here to signup!</a>
                </div>
                </form>
            </div>
        </div>
    <div class="col-1"></div>   
</div>
</div><!-- End of main div mentioned in header / Must include-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        //$('#logindiv').fadeIn("slow");
        $('#email').focus();
    });
    function showPassword(p) {
        var x = document.getElementById(p);
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<?php include_once 'inc/layout/footer.php'; ?>
