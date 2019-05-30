<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Register</title>
</head>
<body>

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
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $password = hash('sha512',$_POST['password']);

            $sql = "INSERT INTO user (email,first_name,last_name,password) 
                    VALUES('$email','$first_name','$last_name','$password')";
            // echo $sql;
            $result = $db->query($sql);

            if (!$result) {
                echo "<h3>There was a problem registering your account</h3>";
            } else {
                echo "<h3>You are now ready to go!</h3>";
            }
        }
    ?>

    <div class="container">

            <h1>Register</h1>
            <form action="register.php" method="POST">

                <div class="form-group" id="first">
                    <label for="first_name">First Name<br>
                        <input type="text" name="first_name" id="first_name" maxlength="20">
                    </label>
                    <label for="last_name">Last Name<br>
                        <input type="text" name="last_name" id="last_name" maxlength="20">
                    </label>
                </div>
            
                <span id="gender_span">
                    <div class="form-check form-check-inline pl-3" id="gender">
                        <br>
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                        <label class="form-check-label" for="male">Male</label>
                        
                        <input class="form-check-input ml-4" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">Female</label>

                        <input class="form-check-input ml-4" type="radio" name="gender" id="none" value="none">
                        <label class="form-check-label" for="none">Prefer Not to Answer</label>
                    </div>
                </span>         
                <br>       
                <label for="email">Email</label>
                <input type="email" id="email" required name="email">
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" required name="password">
                <br><br>
                <label for="password2">Re-Enter Password:</label>
                <input type="password" id="password2" required name="password2">
                <br><br>
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
                <div class="form-group">
                    <label for="description">What are you most intersted in?</label>
                    <select name="description" id="description">
                        <option value="">--Select--</option>
                        <option value="1">Mental Health Wellness</option>
                        <option value="2">Reducing Stress</option>
                        <option value="3">Tracking Anexiety</option>
                        <option value="4">Tracking Depression</option>
                        <option value="5">Physical Wellness</option>
                    </select>
                </div>   
                
                <h4>Terms and Conditions</h4>
                    <span id="terms_span">
                        <div class="form-group form-check-inline pl-3"></div>
                            <input class="form-check-input" type="checkbox" id="terms" value="accept" name="terms">
                            <label class="form-check-label pl-3" for="terms">I Accept</label>
                            <br><br><input class="btn btn-primary" type="submit" value="Submit" id="submit">
                        </div>
                    </span>
                
            </form>
            
            <h3>Already a user? <a href="home.php">Click here to Sign-In</a></h3>

    </div>
</body>
</html>