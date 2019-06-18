<?php 

function dbconnect(){
    $db = new mysqli('localhost','root','','care');
    if ($db->connect_error) {
        $error = $db->connect_error;
        echo $error;
    }
    $db->set_charset('utf8');
}

// fetching interest cards
function getInterests(){
        $int = $_SESSION['interest'];
        if ($int == 1){
            $interest_sql = "SELECT interest, title, description, image FROM interest order by RAND() LIMIT 1";
        } else {
            $interest_sql = "SELECT interest, title, description, image FROM interest WHERE interest='$int' order by RAND() LIMIT 1";
        }
        dbconnect();
        $interest_result = $db->query($interest_sql);
        //building an array of intrest cards
        
        if ($interest_result->num_rows > 0) {
            while ($row = $interest_result->fetch_assoc()){
                echo '<div class="card" style="width: 35rem;">';
                    echo '<img class="card-img-top" src="img/'.$row['image'].'.jpg" alt="Card image cap">';
                    echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.$row['title'].'</h5>';
                            echo '<p class="card-text">'.$row['description'].'</p>';
                            echo '</div>';
                            echo '</div>';
            }
        }
                    
    }
?>