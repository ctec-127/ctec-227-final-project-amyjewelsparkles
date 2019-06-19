<?php  // user symptom history page
session_start();
if (!isset($_SESSION['user_id'])){
    header('location: home.php');
}
$pageTitle = 'History'; 
include_once 'inc/layout/header.php';
include_once 'inc/layout/navbar.php';
?>
<?php 
    $user_id = $_SESSION['user_id'];
    $heading = '';
    $message = '';
    $flag = false;

    if(isset($_GET['id'])){
        $db = new mysqli('localhost','root','','care');
        if ($db->connect_error) {
            $error = $db->connect_error;
            echo $error;
        }
        $db->set_charset('utf8');

        $sql = "DELETE FROM daily_log WHERE symptom_id={$_GET['id']} LIMIT 1";

        $result = $db->query($sql); 

        if($db->affected_rows == 1){
            $heading = '<span class="alert alert-success mes">Successfully deleted Log for '. $_GET['deldate'].'</span>';
        } else {
            header('location: home.php');
        }
    }


function history(){
    $user_id = $_SESSION['user_id'];
    $history_sql = "SELECT * FROM `daily_log` WHERE user_id='$user_id' ORDER BY log_date DESC";

    $db = new mysqli('localhost','root','','care');
    if ($db->connect_error) {
        $error = $db->connect_error;
        echo $error;
    }
    $db->set_charset('utf8');

    $history_result = $db->query($history_sql);
    
    if ($history_result->num_rows > 0) {
        echo '<span class="alert alert-success mes">Results Found!</span><br>';
        while ($row = $history_result->fetch_assoc()){
            $id = $row['symptom_id'];
            $date = $row['log_date'];
            $sleep = $row['sleep'];
            $physical = $row['physical'];
            $activity = $row['activity'];
            $stress = $row['stress'];
            $stresstrig = $row['stresstrig'];
            $anxiety = $row['anxiety'];
            $anxietytrig = $row['anxietytrig'];
            $depression = $row['depression'];
            $depressiontrig = $row['depressiontrig'];
            $mania = $row['mania'];
            $maniatrig = $row['maniatrig'];
            $anger = $row['anger'];
            $angertrig = $row['angertrig'];
            $weight = $row['weight'];
            $note = $row['note'];
            $score = $row['score'];
            $class = 'alert alert-success';

            if ($score >0 && $score <=20){
                $class = 'alert alert-success';
            }elseif ($score >20 && $score <=28){
                $class = 'alert alert-warning';
            }elseif ($score >28 && $score <=35){
                $class = 'alert alert-danger';
            }

            echo '<div class="col-md-12 my-3 p-3 historydiv mes">';
                echo '<div class="row">';
                    echo '<div class="col-2 text-center">Daily Score<br><h6 class="'. $class . '">'. $score . '</h6></div>';
                    echo '<div class="col-6 "><h2 class="p-2">Daily Log</h2></div>';
                    echo '<div class="col-3 "><h5 class="p-3"><i class="fas fa-calendar-day"></i> ' . $date . '</h5><strong>Triggers</strong></div>';
                    echo '<div class="col-1 text-center">'.'<a href="history.php?id='. $id .'&deldate='.$date.'" onclick=deleteRecord()><span id="del"><i class="fas fa-trash"></i> Delete</span></a></div>';
                echo '</div>';
                echo '<div class="row">';
                    echo '<div class="col-2">';
                        echo '<i class="fas fa-weight"></i> Weight: '. $weight;
                        echo '<br><i class="fas fa-bed"></i> Sleep: '. $sleep; 
                        echo '<br><i class="fas fa-walking"></i>   Active: '. $physical ." (". $activity.")";
                    echo '</div>';
                    echo '<div class="col-6">';
                        echo '<p>'. $note.'</p>';
                    echo '</div>';
                    echo '<div class="col-2">';
                            echo $stress .' <i class="far fa-tired"></i> Stress: ';
                            echo '<br>'.$anxiety.' <i class="far fa-dizzy"></i> Anxiety: ';
                            echo '<br>'. $depression .' <i class="far fa-frown-open"></i> Depression: ';
                            echo '<br>'. $mania .' <i class="far fa-laugh-squint"></i> Mania: ';
                            echo '<br>'. $anger .' <i class="far fa-angry"></i> Anger: ';
                    echo '</div>';
                    echo '<div class="col-2">';
                            echo '(' . $stresstrig.')';
                            echo '<br>('. $angertrig.')';
                            echo '<br>('.$depressiontrig.')';
                            echo '<br>('.$maniatrig.')';
                            echo '<br>('.$angertrig.')';
                    echo '</div>';
                    
                echo '</div>';
            echo '</div>';
        }

        $flag = true;
    } else {
        $flag = false;
        echo '<br><span class="alert alert-warning mes">No Logs found! You can enter <a href="track.php"> Daily Log Here </a>to get started.</span><br>';
    }
} //end of history function
?>


<div class="row">
    <div class="col-12">
        <?php echo (isset($heading)) ? $heading : ''; ?>
        <hr>
        <h2>History</h2>
        <hr>
        <p>This page displays previously logged data.<br> You can look at daily log summary and compare scores and triggers for that day. A score of 20 or less indicates good mental health. A score of 21-35 suggest poor mental health. Continuous higher score should be evaluated by a medical professional to help diagnose and treat any undlying medical conditions. </p>
        <hr>
        <?php history(); ?>

    </div>
    <div class="col-1"></div>

    <div class="col-1"></div>   
</div>

</div><!-- End of main div mentioned in header / Must include-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.mes').fadeIn("slow");
        
    });
    function deleteRecord(){
        var check = confirm("Are you sure you want to delete?");
        if (check == true) {
            return true;
        }
        else {
            return false;
        }
    }
    

</script>

<?php include_once 'inc/layout/footer.php'; ?>