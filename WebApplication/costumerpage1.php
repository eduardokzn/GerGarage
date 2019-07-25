<!DOCTYPE html>

<?php

// PRIVATE PAGE

//needs to be at the start of every page where you will use $_SESSION
session_start();

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    //throw you off the page if not logged in
    // just in case someone trys the page with a direct URL
    header("Location:index.php");
}

$menuActive_privatepage1 = "active";
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
    include (VIEW_PATH . "/private/nav-costumer.php"); 
    echo "</header>";
    
    include (APPLICATION_PATH . "/inc/db.inc.php");
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<main class="margin-top-6">    
<div class="container">
    
<!-- .................................................... -->      
<section id="feature">
<p class="pagedebug">
    <!-- javascript working -->
    <script type="text/javascript"> document.write(getCurrentPage());</script>
</p>     
      <h2>AJAX Example</h2>

      <!-- ROW 1 -->
      <div class="row">
      <div class="col-sm-12">
  
        <!-- AJAX EXAMPLE -->

        <div id="AJAXResponseMessage"><h4>Let AJAX change this text</h3></div>
        <br>
        <div id="AJAXResponseErrorMessage"></div>
        <br>
        <div id="AJAXResponseErrorVariables"></div>
        <br>
        <button type="button" onclick="loadXMLDoc()">Make AJAX Call</button>

        <!-- AJAX EXAMPLE END -->

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


    