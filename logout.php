<?php // user profile page
session_start();
unset($_SESSION['user_id']);
session_destroy();
$pageTitle = 'Redirecting...';  
include_once 'inc/layout/header.php';
include_once 'inc/layout/navbar.php';
?>


<div class="container">
    <h2 class="alert alert-success">You have successfully logged out!</h2>
    <p>You will be redirected in a <strong> <span class="" id="time">5</span> </strong>seconds... <br><a href="home.php">Click here to login again.</a>
    </p>

</div>

</div><!-- End of main div mentioned in header / Must include-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var a = setInterval(countdown,1000);
        window.setTimeout(function(){window.location.href = "home.php"},5000);
   
    });
    function countdown(){
        var number = $('#time').html();
        $('#time').html(number-1);
    }

</script>
<?php include_once 'inc/layout/footer.php'; ?>