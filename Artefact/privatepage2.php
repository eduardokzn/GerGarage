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

$menuActive_privatepage2 = "active";
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
<section id="feature">

      <!-- ROW 1 -->
      <div class="row">
      <div class="col-sm-12">

        <h3>A simple AJAX driven jQuery website</h3>
        <br>
		    
        <ul id="ajaxNavPages">
            <li><a href="#page1">Page 1</a></li>
            <li><a href="#page2">Page 2</a></li>
            <li><a href="#page3">Page 3</a></li>
            <li><a href="#page4">Page 4</a></li>
            <li><img id="loading" src="img/ajax_load.gif" alt="loading" /></li>
        </ul>

      </div><!-- column -->
      </div><!-- row -->
      <!-- END ROW 1 -->   
    
      <div class="row">
      <div class="col-sm-12">
          
         <div class="clear"></div>
          
        <div id="pageContent">
        Hello, this is a demo for a <a href="http://tutorialzine.com/2009/09/simple-ajax-website-jquery/" target="_blank">Tutorialzine tutorial</a>. To test it, click some of the buttons above.
        </div>
          
           <div class="clear"></div>

      </div><!-- column -->
      </div><!-- row -->
      <!-- END ROW 2 -->      
                      
            
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


    