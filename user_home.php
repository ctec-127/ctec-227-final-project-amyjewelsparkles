<?php  //landing page after successful login 
//starting new user session
session_start();
if (!isset($_SESSION['user_id'])){
    header('location: home.php');
}
$pageTitle = 'Welcome';
if (isset($_SESSION['first_name'])){
    $name = $_SESSION['first_name'];
}else{
    $name = "";
}
include_once 'inc/layout/header.php';
include_once 'inc/layout/navbar.php';
?>
<?php 

// fetching interest cards
    function getInterests(){
        $int = $_SESSION['interest'];
        if ($int == 1){
            $interest_sql = "SELECT interest, title, description, image FROM interest order by RAND() LIMIT 1";
        } else {
            $interest_sql = "SELECT interest, title, description, image FROM interest WHERE interest='$int' order by RAND() LIMIT 1";
        }
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


//end of interests
  //================================================  
    $user_id = $_SESSION['user_id'];
    $date = date("Y-m-d");
    $heading = '';
    //checking to see if user entered data for today, if yes then fetch that data and insert it in form
    $fetch_sql = "SELECT note FROM `daily_log` WHERE user_id=". $user_id . " AND log_date=". '"' . $date .'"';

    $db = new mysqli('localhost','root','','care');
    # If there was an error connecting to the database
    if ($db->connect_error) {
        $error = $db->connect_error;
        echo $error;
    }
    # Set the character encoding of the database connection to UTF-8

    $db->set_charset('utf8');

    $fetch_result = $db->query($fetch_sql);

    if ($fetch_result->num_rows == 1) {
        while ($row = $fetch_result->fetch_assoc()){
            $note = $row['note'];
        }
        $flag = true;
        //$heading = '<div class="alert alert-warning">You Have already saved Daily Log for '. $date .'.  You can make changes and update.</div>';
    } else {
        $flag = false;
    }

    #inserting note after form submit
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
        
        $user_id = $_SESSION['user_id'];
        $date = date("Y-m-d");

        $note = $db->real_escape_string($_POST['note']);
        
        if ($flag){
            $sql = "UPDATE daily_log SET note='$note'
            WHERE user_id=". $user_id . " AND log_date=". '"' . $date .'"';
            //echo $sql;
            $heading = '<div class="alert alert-success" role="alert">Note Updated!</div>';
        }else {
            $sql = "INSERT INTO daily_log(user_id,log_date,note) 
            VALUES('$user_id','$date','$note')";
            //echo $sql;
            $heading = '<div class="alert alert-success" role="alert">Successfully Inserted Data! </div>';
        }
        // echo $sql;
        
        $result = $db->query($sql);

        if (!$result) {
            $heading = '<div class="alert alert-danger" role="alert">There was a problem with data or database connection!</div>';
        }
    }
?>


<hr>
<?php if(isset($heading) && $heading != ''){
    echo $heading;
 }else{
     echo "<h2>Welcome ".$_SESSION['first_name']."</h2>";
 } ?>
<hr>
<div class="row">
    <div class="col-6">
        <?php getInterests(); ?>
    </div>
        
    <div class="col-1"></div>
        
    <div class="col-md-4">
        <div id="logindiv">
            <form action="user_home.php" method="POST">
                    <label for="note"><strong>Quick Note : <?php echo (isset($date)) ? $date : ''; ?></strong></label>
                    <div class="row">
                        <div class="col">
                            <textarea class="form-control" rows="5" cols="50" name="note" id="note" <?php echo (!isset($note)) ? 'placeholder="Use this space to log your thoughts, feelings, frusterations etc...">' : '>'.$note; ?></textarea>
                        </div>
                    </div>
                <br>
                <input class="btn btn-block mybutton" type="submit" value="Save">
                <br>
                <div class="text-center">
                    <a href="track.php">Enter Daily Log Here</a>
                </div>
            </form>
        </div>
    </div>
    <div class="col-1"></div>   
</div>    

</div><!-- End of main div mentioned in header / Must include-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#note').focus();
    });

</script>    
<?php include_once 'inc/layout/footer.php'; ?>