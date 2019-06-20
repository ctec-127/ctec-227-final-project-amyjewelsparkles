<?php session_start();
$pageTitle = 'Register'; 
include_once 'inc/layout/header.php';
include_once 'inc/layout/navbar.php';

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
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $password = hash('sha512',$_POST['password']);
        $date = date("Y-m-d");
        $select = $_POST['interest'];
        $message = "hello";

        //checking to see if email already exists
        $emailsql = "SELECT * FROM user WHERE email='$email'";
        
        $emailresult = $db->query($emailsql);

        if ($emailresult->num_rows > 0) {
            $message = '<div class="alert alert-danger msg">Email Already Exists.</div>';
        } else {
            $sql = "INSERT INTO user (email,first_name,last_name,password,interest,date_registered) VALUES('$email','$first_name','$last_name','$password','$select','$date')";
            // echo $sql;
            $result = $db->query($sql);

            if (!$result) {
                echo "<h3>There was a problem registering your account</h3>";
            } else {
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

                    header('location: redirect_login.php');
                }
            }
        }

        




    }
?>
    <div class="row">
        <div class="col-6">
            <hr>
            <h2>Register</h2>
            <hr>
            <p>Please fill out this form to create an account. All fields are required.</p>
            <h3>Already a user? <a href="home.php">Click here to Sign-In</a></h3>
            <?php echo (isset($message)) ? $message: ''; ?>
            <div id="errors" class="text-danger ml-4"></div>   

        </div>
        <div class="col-1"></div>
        <div id="registerdiv" class="col-md-4 bg-light">
            <form action="register.php" method="POST">
                <label for="first_name">First Name<br>
                    <input class="form-control" type="text" name="first_name" id="first_name" maxlength="20" <?php echo (isset($first_name)) ? 'value="'.$first_name.'"' : 'placeholder="First"'; ?>>
                </label>
                <br>
                <label for="last_name">Last Name<br>
                    <input class="form-control" type="text" name="last_name" id="last_name" maxlength="20" <?php echo (isset($last_name)) ? 'value="'.$last_name.'"' : 'placeholder="Last"'; ?>>
                </label>
                <br>
                <label for="email">Email
                    <input class="form-control" type="email" id="email" name="email" <?php echo (isset($email)) ? 'value="'.$email.'"' : 'placeholder="e-mail"'; ?>>
                </label>
                <br>
                <label for="password">Password:</label>
                    <input type="checkbox" id="show" onclick="showPassword('password')"><label for="show"><i class="far fa-eye"></i></label>
                    <input class="form-control" type="password" id="password" name="password" <?php echo (isset($_POST['password'])) ? 'value="'.$_POST['password'].'"' : ''; ?>>
                <br>
                <label for="password2">Re-enter Password:</label>
                    <input type="checkbox" id="show2" onclick="showPassword('password2')"><label for="show2"><i class="far fa-eye"></i></label>
                    <input class="form-control" type="password" id="password2" name="password2" <?php echo (isset($_POST['password2'])) ? 'value="'.$_POST['password2'].'"' : ''; ?>>
                <br>
                <label for="interest">What are you most intersted in?
                    <select class="form-control myselect" name="interest" id="interest">
                        <option value="">--Select--</option>
                        <option value="1" <?php echo (isset($select) && $select==1) ? 'selected' : ''; ?>>Mental Health Wellness</option>
                        <option value="2" <?php echo (isset($select) && $select==2) ? 'selected' : ''; ?>>Reducing Stress</option>
                        <option value="3" <?php echo (isset($select) && $select==3) ? 'selected' : ''; ?>>Tracking Anxiety</option>
                        <option value="4" <?php echo (isset($select) && $select==4) ? 'selected' : ''; ?>>Tracking Depression</option>
                        <option value="5" <?php echo (isset($select) && $select==5) ? 'selected' : ''; ?>>Physical Wellness</option>
                    </select>
                </label>
                    <br><br><input class="btn mybutton" type="submit" value="Create Account" id="submit">
            </form>
        </div>
        <div class="col-1"></div>
    </div><!-- end of row-->

</div><!-- End of main div mentioned in header / Must include-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        setTimeout(function(){
            $('.msg').fadeOut(5000)
        },5000);
        $('#first_name').focus();

    });
    function showPassword(p) {
        var x = document.getElementById(p);
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
    
    var bucket = [];
    var flag = 0;

    $('#submit').on('click', function(evt){
        bucket = [];
        flag = 0;

    //check first name
        if ($('#first_name').val() === ''){
            flag++;
            bucket.push(['first_name','First Name is Required']);
            $('#errfirst').remove();
            $('#first_name').after('<span id="errfirst">(Required)</span>');   
        }
    //last name
        if ($('#last_name').val() === ''){
            flag++;
            bucket.push(['last_name', 'Last Name is Required']);
            $('#errlast').remove();  
            $('#last_name').after('<span class="inline" id="errlast">(Required)</span>');   

        }
        if ($('#email').val() === ''){
            flag++;
            bucket.push(['email', 'Email is Required']);
            $('#erremail').remove();  
            $('#email').after('<span class="inline" id="erremail">(Required)</span>');   

        }
        if ($('#password').val() === ''){
            flag++;
            bucket.push(['password', 'Password is Required']);
            $('#errpassword').remove();  
            $('#password').after('<span class="inline" id="errpassword">(Required)</span>');   
        }
        if ($('#password2').val() !== $('#password').val()) {
            flag++;
            bucket.push(['password2', 'Passwords Do Not Match']);
            $('#errpassword2').remove();  
            $('#password2').after('<span class="inline" id="errpassword2">(Required)</span>');   
        }
        //interests
        if ($('#interest').val() === ''){
            flag++;
            bucket.push(['Interest', 'Please Select an Interest']);   
            $('#errinterest').remove();  
            $('#interest').after('<span id="errinterest">(Required)</span>');
        }

    //preventing default and error bucket    
        if (flag > 0){
            console.log("errors: " + flag);
            evt.preventDefault();
            var error_bucket = '';
        //displaying error bucket    
            for (let index = 0; index < bucket.length; index++) {
                error_bucket += '<li>' + bucket[index][1] + '</li>';   
            }
            $('#submit').attr('disabled','true');
            $('#errors').html('<ul>' + error_bucket + '</ul>');
            $('#' + bucket[0][0]).focus();
        }
    }) //end of on.submit()

    $('#first_name').on('change',function(){
        $('#errfirst').remove();
        $("#submit").removeAttr('disabled');
    })
    $('#last_name').on('change',function(){
        $('#errlast').remove();
        $("#submit").removeAttr('disabled');
    })

    $('#email').on('change',function(){
        $('#erremail').remove();
        $("#submit").removeAttr('disabled');
    })
    $('#password').on('change',function(){
        $('#errpassword').remove();
        $("#submit").removeAttr('disabled');
    })
    $('#password2').on('change',function(){
        $('#errpassword2').remove();
        $("#submit").removeAttr('disabled');
    })
    $('#interest').on('change',function(){
        $('#errinterest').remove();
        $("#submit").removeAttr('disabled');
    })
    
</script>

<?php include_once 'inc/layout/footer.php'; ?>