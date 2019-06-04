<?php // user profile page
session_start();
session_destroy();  
include_once 'inc/layout/header.php';
include_once 'inc/layout/navbar.php';
?>


<div class="container">
    <h2>You have successfully logged out!</h2>


</div>


<?php include_once 'inc/layout/footer.php'; ?>