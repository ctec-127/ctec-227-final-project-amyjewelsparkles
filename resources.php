<?php // resources page
session_start();
$pageTitle = 'Self Cared - Resources';  
include_once 'inc/layout/header.php';
include_once 'inc/layout/navbar.php';
?>
<div class="row">
        <div class="col-6">
            <hr>
            <h2>Useful Resources</h2>
            <hr>
            <p>This page contains links to useful websites that may aid in understanding mental health issues.</p>
            <p>Studies show that approximately 1 in 5 adults in the U.S. (46.6 million) experiences mental illness in a given year.
            Serious mental illness costs America $193.2 billion in lost earnings per year. Mood disorders, including major depression, dysthymic disorder and bipolar disorder, are the third most common cause of hospitalization in the U.S. for both youth and adults aged 18–44.
            </p>
            <p>
                <a href="https://suicidepreventionlifeline.org/">National Suicide Prevention Lifeline</a>
            </p>

            <span class="text-center">
            <a href="https://www.mentalhealthamerica.net/finding-help"><img src="img/mha.png" alt="MHA website"><br>Mental Health America</a></span>
        </div>
        <div class="col-1"></div>
        <div class="col-5">
            <a href="https://www.nih.gov/health-information/your-healthiest-self-wellness-toolkits"> <img src="img/nih.png" alt="NIH website"><br>National Institutes of Health</a>
        </div>
</div>
</div> <!--main div -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $('#first_name').focus();
    
    });
</script>

<?php include_once 'inc/layout/footer.php'; ?>