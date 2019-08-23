<!DOCTYPE html>

<?php
    $menuActive_XXXX = "active";
    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");
    include (APPLICATION_PATH . "/inc/config.inc.php");
?>

<html lang="en">  
<head>
<?php include (VIEW_PATH . "/head.php"); ?>
</head>
<body>  
<?php
echo "<header>";
include (VIEW_PATH . "/public/navigation.php");
echo "</header>";
include (APPLICATION_PATH . "/inc/db.inc.php");
?>
<main class="margin-top-6 ">    
<div class="container">   
<section id="review">
      
<div class="row"> <!-- ROW 1 -->
<div class="col-sm-12">

  <p>content </p>

</div><!-- column -->
</div><!-- END ROW 1 -->      
                               
</section>
</div>   
</main>
<footer>
    <?php include (VIEW_PATH . "/public/footer.php"); ?>
</footer>   
<?php include (VIEW_PATH . "/foot.php"); ?>       
</body>
</html>


    