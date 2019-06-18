<?php // nav bar
?>
<nav class="navbar navbar-expand-lg navbar-light m-3">
    <a class="navbar-brand" href="<?php if(isset($_SESSION['user_id'])){ echo 'user_home.php'; } else{ echo 'home.php';} ?>"><img id="logo" src="img/logo2.png" alt="Self-Cared Logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <?php  
            if(isset($_SESSION['user_id'])){
                
                echo '<li class="nav-item"><a class="nav-link" href="user_home.php">Home</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="track.php">Daily Log</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="history.php">History</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="profile.php">Profile</a></li>';
            } else {
                echo '<li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>';
                echo '<li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>';
            }
        ?>
            <li class="nav-item">
                <a class="nav-link" href="resources.php">Resources</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="privacy.php">Privacy</a>
            </li>
            <?php 
                if(isset($_SESSION['user_id'])){ 
                    echo '<li class="nav-item login"><a id="logout" class="nav-link" href="logout.php">Logout</a></li>';
                } else {
                    echo '<li class="nav-item login"><a class="nav-link" href="home.php">Login</a></li>';
                }
            ?>
        </ul>
    </div>
</nav>