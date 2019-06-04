<?php // nav bar
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php"><i class="fas fa-hand-holding-heart mr-2"></i>Self - Cared</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="home.php">Contact</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="home.php">Privacy</a>
            </li>
            <?php 
                if (isset($_SESSION['user_id'])) {
                echo '<li class="nav-item">';
                    echo '<a class="nav-link" href="logout.php">Logout</a>';
                echo '</li>';

            } ?>
        </ul>
    </div>
</nav>