<?php  // user profile / account update page

session_start();
if (!isset($_SESSION['user_id'])){
    header('location: home.php');
}
$pageTitle = 'Profile'; 
include_once 'inc/layout/header.php';
include_once 'inc/layout/navbar.php';
?>

<?php
//fetching user profile info from user table
    $user_id = $_SESSION['user_id'];
    $db = new mysqli('localhost','root','','care');
    if ($db->connect_error) {
        $error = $db->connect_error;
        echo $error;
    }
    $db->set_charset('utf8');

    $user_sql = "SELECT * FROM user WHERE user_id=" . $user_id;

    $user_result = $db->query($user_sql);

    if ($user_result->num_rows == 1) {
        while ($row = $user_result->fetch_assoc()){
            $email = $row['email'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $fetchedpassword = $row['password'];
            $select = $row['interest'];
        }
        $flag = true;
        $heading = '';
    } else {
        $heading = '<div class="alert alert-danger">I couldnt find your record or something went wrong.</div>';
        $flag = false;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        
        # Create a new connection to the database
        $db = new mysqli('localhost','root','','care');
        if ($db->connect_error) {
            $error = $db->connect_error;
            echo $error;
        }
        $db->set_charset('utf8');
        
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $oldpassword = hash('sha512',$_POST['oldpassword']);
        $newpassword = hash('sha512',$_POST['newpassword']);
        $select = $_POST['interest'];
        
        if($_POST['newpassword'] == ''){
            $sql = "UPDATE user SET email='$email',first_name='$first_name',last_name='$last_name',interest='$select'  
            WHERE user_id='$user_id'";
            $heading = '<div class="alert alert-success">Account information updated!</div>';

        } elseif ($oldpassword == $fetchedpassword) {

            $sql = "UPDATE user SET email='$email',first_name='$first_name',last_name='$last_name',password='$newpassword',interest='$select' 
            WHERE user_id='$user_id'"; 
            $heading = '<div class="alert alert-success">Account information and password updated!</div>';

        }
        $result = $db->query($sql);

        if (!$result) {
            echo "<h3>There was a problem Updating your account Info.</h3>";
        } else {
            $_SESSION['interest'] = $select;
            echo "<h3>Successfully Updated!</h3>";
        }
    }

?>

<div class="row">
        <div class="col-6">
            <hr>
            <h2>Update Profile</h2>
            <hr>
            <p>Use this form to to update your account. <br>
                If no password is entered, your password will NOT be changed.</p>

            <?php echo $heading ?>
            <div id="errors" class="text-danger ml-4"></div>   

        </div>
        <div class="col-1"></div>
        <div id="registerdiv" class="col-md-4 bg-light">
            <form action="profile.php" method="POST">
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

                <label for="oldpassword">Old Password:</label>
                    <label for="showold"><input type="checkbox" id="showold" onclick="showPassword('oldpassword')"><i class="far fa-eye"></i></label>
                    <input class="form-control" type="password" id="oldpassword" name="oldpassword">
                

                <label for="newpassword">New Password:</label>
                    <input type="checkbox" id="show" onclick="showPassword('newpassword')"><label for="show"><i class="far fa-eye"></i></label>
                    <input class="form-control" type="password" id="newpassword" name="newpassword">
                
                <label for="password2">Re-enter Password:</label>
                    <input type="checkbox" id="show2" onclick="showPassword('password2')"><label for="show2"><i class="far fa-eye"></i></label>
                    <input class="form-control" type="password" id="password2" name="password2">
                
                <br>
                <label for="interest">What are you most intersted in?
                    <select class="form-control myselect" name="interest" id="interest">
                        <option value="">--Select--</option>
                        <option value="1" <?php echo ($select==1) ? 'selected' : ''; ?>>Mental Health Wellness</option>
                        <option value="2" <?php echo ($select==2) ? 'selected' : ''; ?>>Reducing Stress</option>
                        <option value="3" <?php echo ($select==3) ? 'selected' : ''; ?>>Tracking Anxiety</option>
                        <option value="4" <?php echo ($select==4) ? 'selected' : ''; ?>>Tracking Depression</option>
                        <option value="5" <?php echo ($select==5) ? 'selected' : ''; ?>>Physical Wellness</option>
                    </select>
                </label>

                <br><input class="btn mybutton" type="submit" value="Save" id="submit">

            </form>
        </div>
    </div>

</div><!-- End of main div mentioned in header / Must include-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
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
    //check email
        if ($('#email').val() === ''){
            flag++;
            bucket.push(['email', 'Email is Required']);
            $('#erremail').remove();  
            $('#email').after('<span class="inline" id="erremail">(Required)</span>');   

        }
        if ($('#oldpassword').val() === '' && $('#newpassword').val() !== ''){
            flag++;
            bucket.push(['oldpassword', 'Old Password is Required']);
            $('#erroldpassword').remove();  
            $('#oldpassword').after('<span class="inline" id="erroldpassword">(Required)</span>');   
        }
        // if ($('#password').val() === ''){
        //     flag++;
        //     bucket.push(['password', 'Password is Required']);
        //     $('#errpassword').remove();  
        //     $('#password').after('<span class="inline" id="errpassword">(Required)</span>');   
        // }
        if ($('#password2').val() !== $('#newpassword').val()) {
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
    $('#newpassword').on('change',function(){
        $('#errnewpassword').remove();
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