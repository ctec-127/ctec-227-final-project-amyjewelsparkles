<?php  //landing page after successful login 
//starting new user session
session_start();
if (!isset($_SESSION['user_id'])){
    header('location: home.php');
}
include_once 'inc/layout/header.php';
include_once 'inc/layout/navbar.php';
?>
<div class="container">

    <h1>Welcome to Self-Cared <?= isset($_SESSION['first_name']) ? $_SESSION['first_name'] : 'New User!' ?></h1>

</div>
    


<?php include_once 'inc/layout/footer.php'; ?>