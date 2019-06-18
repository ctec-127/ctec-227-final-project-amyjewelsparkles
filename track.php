<?php  // user mental health tracking page
    //form for entering data into mood table like: stress, anexiety etc.
session_start();
if (!isset($_SESSION['user_id'])){
    header('location: home.php');
}
$pageTitle = 'Track - Mental Health'; 
include_once 'inc/layout/header.php';
include_once 'inc/layout/navbar.php';
?>

<?php

    $user_id = $_SESSION['user_id'];
    $date = date("Y-m-d");
    $heading = '<div id="heading">Use this form to enter your daily log.</div><br>';

//checking to see if user entered data for today, if yes then fetch that data and insert it in form
    $fetch_sql = "SELECT * FROM `daily_log` WHERE user_id=". $user_id . " AND log_date=". '"' . $date .'"';

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
            $sleep = $row['sleep'];
            $physical = $row['physical'];
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
        }
        
        // switch ($sleep) {
        //     case '1':
        //         $sleep = 5;
        //         break;
        //     case '2':
        //         $sleep = 4;
        //         break;
        //     case '3':
        //         $sleep = 3;
        //         break;
        //     case '4':
        //         $sleep = 2;
        //         break;
        //     case '5':
        //         $sleep = 1;
        //         break;
        //     default:
        //         $sleep = $sleep;
        //         break;
        // }
        // switch ($physical) {
        //     case '1':
        //         $physical = 5;
        //         break;
        //     case '2':
        //         $physical = 4;
        //         break;
        //     case '3':
        //         $physical = 3;
        //         break;
        //     case '4':
        //         $physical = 2;
        //         break;
        //     case '5':
        //         $physical = 1;
        //         break;
        //     default:
        //         $physical = $physical;
        //         break;
        // }

        $flag = true;
        $heading = '<div class="alert alert-warning">You Have already saved Daily Log for '. $date .'.  You can make changes and update.</div>';
    } else {
        $flag = false;
    }

//getting current weight from weight table ---------------------------
    $weight_sql = "SELECT weight FROM weight WHERE user_id=" . $user_id;

    $db = new mysqli('localhost','root','','care');
    if ($db->connect_error) {
        $error = $db->connect_error;
        echo $error;
    }
    $db->set_charset('utf8');
    $weight_result = $db->query($weight_sql);

    if ($weight_result->num_rows == 1) {
        while ($row = $weight_result->fetch_assoc()){
            $weight = $row['weight'];
        }
    }


#inserting data after form submit
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

        $sleep = $_POST['sleep'];
        $physical = $_POST['physical'];
        $activity = $_POST['activity'];
        switch ($sleep) {
            case '5':
                $sleepsc = 1;
                break;
            case '4':
                $sleepsc = 2;
                break;
            case '3':
                $sleepsc = 3;
                break;
            case '3':
                $sleepsc = 4;
                break;
            case '1':
                $sleepsc = 5;
                break;
            default:
                $sleepsc = $sleep;
                break;
        }
        switch ($physical) {
            case '5':
                $physicalsc = 1;
                break;
            case '4':
                $physicalsc = 2;
                break;
            case '3':
                $physicalsc = 3;
                break;
            case '2':
                $physicalsc = 4;
                break;
            case '1':
                $physicalsc = 5;
                break;
            default:
                $physicalsc = $physical;
                break;
        }
        $stress = $_POST['stress'];
        $stresstrig = $_POST['stresstrig'];
        $anxiety = $_POST['anxiety'];
        $anxietytrig = $_POST['anxietytrig'];
        $depression = $_POST['depression'];
        $depressiontrig = $_POST['depressiontrig'];
        $mania = $_POST['mania'];
        $maniatrig = $_POST['maniatrig'];
        $anger = $_POST['anger'];
        $angertrig = $_POST['angertrig'];
        $score = $sleepsc+$physicalsc+$stress+$anxiety+$depression+$mania+$anger;
        
        $weight = $_POST['weight'];
        $note = $_POST['note'];
        
        if ($flag){
            $sql = "UPDATE daily_log SET sleep='$sleep',physical='$physical',activity='$activity',stress='$stress',stresstrig='$stresstrig',anxiety='$anxiety',anxietytrig='$anxietytrig',depression='$depression',depressiontrig='$depressiontrig',mania='$mania',maniatrig='$maniatrig',anger='$anger',angertrig='$angertrig',weight='$weight',note='$note',score='$score'
            WHERE user_id=". $user_id . " AND log_date=". '"' . $date .'"';
            //echo $sql;
            $heading = '<div class="alert alert-success" role="alert">Successfully Updated!</div>';
        }else {
            $sql = "INSERT INTO daily_log(user_id,log_date,sleep,physical,activity,stress,stresstrig,anxiety,anxietytrig,depression,depressiontrig,mania,maniatrig,anger,angertrig,weight,note,score) 
            VALUES('$user_id','$date','$sleep','$physical','$activity','$stress','$stresstrig','$anxiety','$anxietytrig','$depression','$depressiontrig','$mania','$maniatrig','$anger','$angertrig','$weight','$note','$score')";
            //echo $sql;
            $heading = '<div class="alert alert-success" role="alert">Successfully Inserted Data! </div>';
        }
        // echo $sql;
        
        $result = $db->query($sql);

        //updating weight in weight table
        $update_weight = "UPDATE weight SET weight='$weight' WHERE user_id=" . $user_id; 
        $weight_result2 = $db->query($update_weight);

        if (!$result) {
            $heading = '<div class="alert alert-danger" role="alert">There was a problem with data or database connection!</div>';
        }
    }
    if (isset($score)){
        $class = 'alert alert-success';

            if ($score >0 && $score <=20){
                $class = 'alert alert-success';
            }elseif ($score >20 && $score <=28){
                $class = 'alert alert-warning';
            }elseif ($score >28 && $score <=35){
                $class = 'alert alert-danger';
            }
    }
?>

<div class="container" id="trackdiv">
    <div class="row">
        <?php echo (isset($score))? '<div class="col-2 text-center">Daily Score<br><h6 class="'. $class . '">'. $score . '</h6></div>' : ''; ?>
        <div class="col-10">
            <h3>Use this page to track your Daily Activity and Mental Health </h3>
        </div>
    </div>
    <form action="track.php" method="POST">
        <div id="day" class="col bg-light text-center p-4">
            <div class="row">
                <div class="col-2">
                </div>
                <div class="col-8">
                    <?php echo $heading; ?>
                </div>
                <div class="col-2">Triggers</div>
            </div>
                    <div class="row my-auto">
                    <div class="col-2">
                        <label for="sleep"> Sleep:</label>
                    </div>
                    <div class="col w-50">
                        <input type="range" id="sleep" name="sleep" class="slider" min="1" max="5" step="1" value="<?php echo (isset($sleep)) ? $sleep : '1'; ?>" onChange="levelsleep('#sleep','#sleepLevel','Hours')">
                    </div>
                    <div class="col-3">
                        <div class="sleepspan" id="sleepLevel" onLoad="levelsleep('#sleep','#sleepLevel','Hours')">0-2 Hours</div>
                    </div>
                    <div class="col-2">
                        
                    </div>
                </div>
            <br>   
                <div class="row">
                <div class="col-2">
                    <label for="physical"> Active Min:</label>
                </div>
                <div class="col w-50">
                    <input type="range" id="physical" name="physical" class="slider" min="1" max="5" step="1" value="<?php echo (isset($physical)) ? $physical : '1'; ?>" onChange="levelphysical('#physical','#physicalLevel')">
                </div>
                <div class="col-3">
                    <div class="sleepspan" id="physicalLevel" onload="levelphysical('#physical','#physicalLevel')">0-15 Minutes</div>
                </div>
                <div class="col-2">
                    <input type="text" class="form-control" name="activity" id="activity" maxlength="40" <?php echo (isset($activity)) ? 'value="'. $activity .'"' : 'placeholder="Activity?"'; ?>>
                </div>
            </div>
            <br>                     
                <div class="row ">
                    <div class="col-2">
                        <label for="stress">Stress:</label>
                    </div>
                    <div class="col w-50">
                        <input type="range" id="stress" name="stress" class="slider" min="1" max="5" step="1" value="<?php echo (isset($stress)) ? $stress : '1'; ?>" onChange="levelrange('#stress','#stressLevel','Stressed')">
                    </div>
                    <div class="col-3">
                        <div class="levelspan" id="stressLevel">Not Stressed</div>
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" name="stresstrig" id="stresstrig" maxlength="40" <?php echo (isset($stresstrig)) ? 'value="'. $stresstrig .'"' : 'placeholder="Trigger?"'; ?>>
                    </div>
                </div>
            <br>
                <div class="row">
                    <div class="col-2">
                        <label for="anxiety">Anxiety:</label>
                    </div>
                    <div class="col w-50">
                        <input type="range" id="anxiety" name="anxiety" class="slider" min="1" max="5" step="1" value="<?php echo (isset($anxiety)) ? $anxiety : '1'; ?>" onChange="levelrange('#anxiety','#anxietyLevel','Anxious')">
                    </div>
                    <div class="col-3">
                        <div class="levelspan" id="anxietyLevel">Not Anxious</div>
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" name="anxietytrig" id="anxietytrig" maxlength="40" <?php echo (isset($anxietytrig)) ? 'value="'. $anxietytrig .'"' : 'placeholder="Trigger?"'; ?>>
                    </div>
                </div>
            <br>
                <div class="row">
                    <div class="col-2">
                        <label for="depression">Depression:</label>
                    </div>
                    <div class="col w-50">
                        <input type="range" id="depression" name="depression" class="slider" min="1" max="5" step="1" value="<?php echo (isset($depression)) ? $depression : '1'; ?>" onChange="levelrange('#depression','#depressionLevel','Depressed')">
                    </div>
                    <div class="col-3">
                        <div class="levelspan" id="depressionLevel">Not Depressed</div>
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" name="depressiontrig" id="depressiontrig" maxlength="40" <?php echo (isset($depressiontrig)) ? 'value="'. $depressiontrig .'"' : 'placeholder="Trigger?"'; ?>>
                    </div>
                </div>
            <br>
                <div class="row">
                    <div class="col-2">
                        <label for="mania">Mania:</label>
                    </div>
                    <div class="col w-50">
                        <input type="range" id="mania" name="mania" class="slider" min="1" max="5" step="1" value="<?php echo (isset($mania)) ? $mania : '1'; ?>" onChange="levelrange('#mania','#maniaLevel','Manic')">
                    </div>
                    <div class="col-3">
                        <div class="levelspan" id="maniaLevel">Not Manic</div>
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" name="maniatrig" id="maniatrig" maxlength="40" <?php echo (isset($maniatrig)) ? 'value="'. $maniatrig .'"' : 'placeholder="Trigger?"'; ?>>
                    </div>
                </div>
            <br>
                <div class="row">
                    <div class="col-2">
                        <label for="anger">Anger:</label>
                    </div>
                    <div class="col w-50">
                        <input type="range" id="anger" name="anger" class="slider" min="1" max="5" step="1" value="<?php echo (isset($anger)) ? $anger : '1'; ?>" onChange="levelrange('#anger','#angerLevel','Angry')">
                    </div>
                    <div class="col-3">
                        <div class="levelspan" id="angerLevel">Not Angry</div>
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" name="angertrig" id="angertrig" maxlength="40" <?php echo (isset($angertrig)) ? 'value="'.$angertrig .'"' : 'placeholder="Trigger?"'; ?>>
                    </div>
                </div>
            <br>
            <div class="row">
                <div class="col-2">
                    <label for="weight">Weight (lbs):</label>
                </div>
                <div class="col-2">
                    <input type="number" class="form-control" name="weight" id="weight" min="0" max="999" value="<?php echo (isset($weight)) ? $weight : ''; ?>">
                </div>
                <div class="col-3">

                </div>
            </div>
            <br>
                <div class="row">
                    <div class="col-2">
                        <label for="note">Notes:</label>
                    </div>
                    <div class="col w-50">
                        <textarea class="form-control" rows="5" cols="50" name="note" id="note" <?php echo (!isset($note)) ? 'placeholder="Use this space to log your thoughts, feelings, frusterations etc...">' : '>'.$note; ?></textarea>
                    </div>
                    <div class="col-5">

                    </div>
                </div>
        
            <br><br>
            <div class="text-left">
                <button class="btn btn-lg mybutton" type="submit"><?php echo ($flag) ? 'Update' : 'Save'; ?></button>
            </div>
        </div>
    </form>
</div>
</div><!-- End of main div mentioned in header / Must include-->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('#sleep').focus();
        levelsleep('#sleep','#sleepLevel','Hours');
        levelphysical('#physical','#physicalLevel');
        levelrange('#stress','#stressLevel','Stressed');
        levelrange('#anxiety','#anxietyLevel','Anxious');
        levelrange('#depression','#depressionLevel','Depressed');
        levelrange('#mania','#maniaLevel','Manic');
        levelrange('#anger','#angerLevel','Angry');
    });

    function levelrange(rangeid,spanid,key){
        let a = $(rangeid).val();
        switch (a) {
            case "1":
                $(spanid).html('Not ' + key);
                $(spanid).css('background-color','#4dc04d');
                break;
            case "2":
                $(spanid).html('Little ' + key);
                $(spanid).css('background-color','#a6c34c');                
                break;
            case "3":
                $(spanid).html('Somewhat ' + key);
                $(spanid).css('background-color','#ffc84a');                                
                break;
            case "4":
                $(spanid).html('Very ' + key);
                $(spanid).css('background-color','#f48847');              
                break;
            case "5":
                $(spanid).html('Extremely ' + key);
                $(spanid).css('background-color','#eb4841');
                break;        
            default:
                $(spanid).html('Not '+ key);
                break;
        }
    }
    
    function levelsleep(rangeid,spanid,key){
        let a = $(rangeid).val();
        switch (a) {
            case "1":
                $(spanid).html('0-2 ' + key);
                $(spanid).css('background-color','#f48847');
                break;
            case "2":
                $(spanid).html('2-4 ' + key);
                $(spanid).css('background-color','#ffc84a');              
                break;
            case "3":
                $(spanid).html('4-6 ' + key);
                $(spanid).css('background-color','#a6c34c');                                
                break;
            case "4":
                $(spanid).html('6-8 ' + key);
                $(spanid).css('background-color','#4dc04d');                
                break;
            case "5":
                $(spanid).html('8+ ' + key);
                $(spanid).css('background-color','#4dc04d');
                break;        
            default:
                $(spanid).html('0-2 '+ key);
                break;
        }
    }
    function levelphysical(rangeid,spanid){
        let a = $(rangeid).val();
        switch (a) {
            case "1":
                $(spanid).html('0-15 Minutes');
                $(spanid).css('background-color','#f48847');
                break;
            case "2":
                $(spanid).html('15-30 Minutes');
                $(spanid).css('background-color','#ffc84a');              
                break;
            case "3":
                $(spanid).html('30-45 Minutes');
                $(spanid).css('background-color','#a6c34c');                                
                break;
            case "4":
                $(spanid).html('45-60 Minutes');
                $(spanid).css('background-color','#4dc04d');                
                break;
            case "5":
                $(spanid).html('1 Hour +');
                $(spanid).css('background-color','#4dc04d');
                break;        
            default:
                $(spanid).html('0-15 Minutes');
                break;
        }
    }

</script>
<?php include_once 'inc/layout/footer.php'; ?>