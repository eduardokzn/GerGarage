<!DOCTYPE html>

<?php

// PRIVATE PAGE

//needs to be at the start of every page where you will use $_SESSION
session_start();

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    // throw you off the page if not logged in
    // just in case someone trys the page with a direct URL
    header("Location:index.php");
}

$menuActive_privatepage3 = "active";
define("MY_INC_CODE", 888);
define("APPLICATION_PATH", "app");
define("VIEW_PATH", APPLICATION_PATH . "/view");
define("MODEL_PATH", APPLICATION_PATH . "/model");
include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");

?>

<html lang="en">
    
<head>
    
<?php 
    include (VIEW_PATH . "/head.php"); 
?>
    
</head>

<body>
        
<!-- HEADER ------------------------------------------------>
        
<?php 
    echo "<header>";
    include (VIEW_PATH . "/private/costumer/nav-costumer.php"); 
    echo "</header>";
    
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<main class="margin-top-6">    
<div class="container-fluid">
    
<!-- .................................................... -->      
<section id="review">
    
<!-- ROW 0 -->
<div class="row">
<div class="col-sm-12"> 
    
<?php
    if( $_REQUEST != NULL && !empty($_REQUEST['deleteStatus']) )
    {
        $deleteStatus = $_REQUEST['deleteStatus'];
        
        if($deleteStatus == 'ok')
            {echo "<p class=\"okmessage text-success\">Record Deleted</p>";}
        elseif($deleteStatus == 'dbfail')
            {echo "<p class=\"message text-danger\">Database connection issue</p>";}
        elseif($deleteStatus == 'empty')
            {echo "<p class=\"message text-warning\">No record provided</p>";}
        elseif($deleteStatus == 'dataIssue')
            {echo "<p class=\"message\">Delete failed, more than one record picked</p>";}
        elseif($deleteStatus == 'invalid text-warning')
            {echo "<p class=\"message text-warning\">Delete failed, invalid record ID</p>";}
        else
            {echo "<p class=\"message\">status set to '$deleteStatus' </p>";}
    }
?>
    
</div><!-- column -->  
</div><!-- row -->
<!-- END ROW 1 --> 

<!-- ROW 1 -->
<div class="row">
<div class="col-sm-5">

<h3>Vehicles</h3>
    
<?php include ("vehicle.php"); ?>

</div><!-- column -->
<div class="col-sm-7">    
    
<h3>Additional details</h3>

<!-- AJAX -->
    
<div id="ReviewForm">
    <!-- review data placed here following AJAX call -->
    <p> Click 'more' to review additional information here</p>
</div>
    
<div id="ReviewPanel_AJAXResponseErrorMessage"></div>
<div id="ReviewPanel_AJAXResponseErrorVariables"></div>
    
<!-- END AJAX -->
    
</div><!-- column -->  
</div><!-- row -->
<!-- END ROW 1 -->      
                      
            
</section>
<!-- .................................................... -->

</div> <!-- END container-->    
</main>

<!-- FOOTER ------------------------------------------------>
<footer>
    <?php include (VIEW_PATH . "/private/footer.php"); ?>
</footer>
        
<!-- all content above this line -->    
<?php include (VIEW_PATH . "/foot.php"); ?>
        
</body>
</html>


    