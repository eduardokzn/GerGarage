<!DOCTYPE html>

<?php
    $menuActive_index = "active"; // CHANGE
    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");
    include (APPLICATION_PATH . "/inc/config.inc.php");
?>

<html lang="en">
    
<head>
    
<?php include (VIEW_PATH . "/head.php"); ?>
    
<!-- needed for the header image -->
<style> 
html,
body,
header {
    height: 100%;
}
</style>
    
</head>

<body class="intro">
        
<!-- HEADER ------------------------------------------------>
        
<?php 
    
    echo '<header>';
    include (VIEW_PATH . "/public/navigation.php"); 
    include (VIEW_PATH . "/public/bossImage.php"); 
    echo "<header>";
    
    include (APPLICATION_PATH . "/inc/db.inc.php");   
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<main class="margin-top-6">  
<div class="container">

<!-- .................................................... --> 
<div class="row">
<div class="col-sm-12">
<?php
    if( $_GET != NULL && !empty($_GET['login']))
    {
        $loginStatus = $_GET['login'];
        if($loginStatus == 'nouser')
            {echo '<p class="text-danger">Invalid user or password</p>';}
        elseif($loginStatus == 'dbfail')
            {echo '<p class="text-danger">Database connection issue</p>';}
        elseif($loginStatus == 'empty')
            {echo '<p class="text-info">Either username or password empty</p>';} 
        else
            {echo '';}
    }
?>
</div><!-- column -->
</div><!-- row -->
    
<!-- .................................................... -->    
<section id="theTop">
    
      <h2>HOME</h2>

      <!-- ROW 1 -->
      <div class="row">
      <div class="col-sm-12">

          <p>Example public page</p>
<?php

echo "PHP Check : YEP I'M GOOD";

?>

      </div><!-- column -->
      </div><!-- row -->
      <!-- END ROW 1 -->      
          
      <!-- ROW 2 -->
      <div class="row margin-top-3">
          
      <div class="col-sm-4">

          <h4>Item 1</h4>
          <p>Some text</p>

      </div><!-- column -->
          
      <div class="col-sm-4">

          <h4>Item 2</h4>
          <p>Some text</p>

      </div><!--column-->
          
      <div class="col-sm-4">

          <h4>Item 3</h4>
          <p>Some text</p>

      </div><!-- column-->
          
      </div><!-- row -->
      <!-- END ROW 2 -->             

            
</section>      
<!-- .................................................... -->

</div> <!-- END container-->    
</main>

<!-- FOOTER ------------------------------------------------>
<footer>
    <?php include (VIEW_PATH . "/public/footer.php"); ?>
</footer>
        
<!-- all content above this line -->    
<?php include (VIEW_PATH . "/foot.php"); ?>
        
</body>
</html>

