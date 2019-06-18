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
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        // $address = $_POST['address'];
        // $city = $_POST['city'];
        // $state = $_POST['state'];
        // $zip = $_POST['zip'];
        $date = date("Y-m-d");
        $interest = $_POST['interest'];

        $sql = "INSERT INTO user (email,first_name,last_name,password,dob,interest,date_registered) 
                VALUES('$email','$first_name','$last_name','$password','$dob','$interest','$date')";
        // echo $sql;
        $result = $db->query($sql);

        if (!$result) {
            echo "<h3>There was a problem registering your account</h3>";
        } else {
            echo "<h3>Successfully Registered! Please login to access the site.</h3>";
        }
    }
?>

    <h1>Register</h1>
    <p>    
        <h3>Already a user? <a href="home.php">Click here to Sign-In</a></h3>
    </p>
    <div id="registerdiv" class="bg-light">
        <form action="register.php" method="POST">
            <div class="form-group" id="first">
                <label for="first_name">First Name<br>
                    <input class="form-control" type="text" name="first_name" id="first_name" maxlength="20" <?php echo (isset($first_name)) ? 'value="'.$first_name.'"' : 'placeholder="First"'; ?>>
                </label>
                <label for="last_name">Last Name<br>
                    <input class="form-control" type="text" name="last_name" id="last_name" maxlength="20" <?php echo (isset($last_name)) ? 'value="'.$last_name.'"' : 'placeholder="Last"'; ?>>
                </label>
                <br>
                <label for="dob">Date of Birth
                    <input class="form-control" type="date" id="dob" name="dob" max="2000-01-02" <?php echo (isset($dob)) ? 'value="'.$dob.'"' : ''; ?>>
                </label>
            </div> 
                
            <div class="col-4">
                <label for="email">Email</label>
                <br>
                <input class="form-control" type="email" id="email" name="email" <?php echo (isset($email)) ? 'value="'.$email.'"' : 'placeholder="e-mail"'; ?>>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="password">Password:</label>
                    </div>
                    <div class="col text-right">
                        <input type="checkbox" id="show" onclick="showPassword('password')"><label for="show">Show</label>
                    </div>
                </div>
                <input class="form-control" type="password" id="password" name="password" <?php echo (isset($_POST['password'])) ? 'value="'.$_POST['password'].'"' : ''; ?>>
                <br>
                <div class="row">
                    <div class="col">
                        <label for="password">Re-enter Password:</label>
                    </div>
                    <div class="col text-right">
                        <input type="checkbox" id="show2" onclick="showPassword('password2')"><label for="show2">Show</label>
                    </div>
                </div>
                <input class="form-control" type="password" id="password2" name="password2" <?php echo (isset($_POST['password2'])) ? 'value="'.$_POST['password2'].'"' : ''; ?>>
                <br>
                   
            <!--
            <div class="form-group">
                <label for="address">Address<br>
                    <input type="text" name="address" id="address" maxlength="40">
                </label>
            </div>
            <div class="form-group">
                <label for="city">City<br>
                    <input type="text" name="city" id="city" maxlength="30">
                </label>
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <select name="state" id="state">
                    <option value="" selected="selected">Select a State</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>

            <div class="form-group">
                <label for="zip">Zip Code<br>
                    <input type="text" pattern="[0-9]{5}" title="Five digit zip code" name="zip" id="zip">
                </label>
            </div>
            -->
                <div class="form-group">
                    <label for="interest">What are you most intersted in?</label>
                    <select class="form-control" name="interest" id="interest">
                        <option value="">--Select--</option>
                        <option value="1">Mental Health Wellness</option>
                        <option value="2">Reducing Stress</option>
                        <option value="3">Tracking Anxiety</option>
                        <option value="4">Tracking Depression</option>
                        <option value="5">Physical Wellness</option>
                    </select>
                </div>   
            </div>
        
        </form>
    </div>
</div><!-- End of main div mentioned in header / Must include-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        //$('#registerdiv').fadeIn("slow");
        // $('#formdiv').fadeIn("slow");
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
    $('#')
</script>

<?php include_once 'inc/layout/footer.php'; ?>