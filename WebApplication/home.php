<!DOCTYPE html>

<?php

// PRIVATE PAGE

//needs to be at the start of every page where you will use $_SESSION
session_start();

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    //throw you off the page if not logged in
    header("Location:index.php");
}

$menuActive_home = "active";
define("MY_INC_CODE", 888);
define("APPLICATION_PATH", "app");
define("VIEW_PATH", APPLICATION_PATH . "/view");
define("MODEL_PATH", APPLICATION_PATH . "/model");
include (APPLICATION_PATH . "/inc/config.inc.php");

?>

<html lang="en">
    
<head>
    
<?php include (VIEW_PATH . "/head.php"); ?>
    
</head>

<body>
        
<!-- HEADER ------------------------------------------------>
        
<?php 
    echo "<header>";
    include (VIEW_PATH . "/private/navigation.php"); 
    echo "</header>";
    
    include (APPLICATION_PATH . "/inc/db.inc.php");  
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<main class="margin-top-6">  
<div class="container">

<!-- .................................................... -->      
<section id="featured">
      
<h4>PRIVATE HOMEPAGE</h4>

<!-- ROW 1 -->
<div class="row">
<div class="col-sm-12">

<h3>LONG LIVE THE ROBOT REVOLUTION!!!</h3>
    
<img src="img/ultron.jpg" class="img-rounded img-responsive" alt="Ultron">  
    
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

