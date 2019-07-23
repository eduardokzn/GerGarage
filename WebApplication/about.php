<!DOCTYPE html>

<?php
    $menuActive_about = "active";
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
        
<!-- HEADER ------------------------------------------------>
        
<?php 
    echo "<header>";
    include (VIEW_PATH . "/public/navigation.php"); 
    echo "</header>";
    
    include (APPLICATION_PATH . "/inc/db.inc.php");
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<main class="margin-top-6">    
<div class="container">
    
<!-- .................................................... -->      
<section id="review">
      
      <h2>About</h2>

      <!-- ROW 1 -->
      <div class="row">
      <div class="col-sm-12">

          <p>This site is part of a basic introduction to web applications. The technologies of HTML, CSS, JavaScript, SQLite and PHP.</p>
          
          <p>The code shown here is not intended for production deployment it. It's intent is to explain the principles of the technologies. The examples evolve towards production deployable caode as the cource evolves and takes into account best practices, team development, continious build, loosly coupled components for maintainability and security issues. </p>

      </div><!-- column -->
      </div><!-- row -->
      <!-- END ROW 1 -->      
                      
            
</section>
<!-- .................................................... -->

</div> <!-- END container--> 

<!-- FOOTER ------------------------------------------------>
<footer>
    <?php include (VIEW_PATH . "/public/footer.php"); ?>
</footer>

   
</main>
        
<!-- all content above this line -->    
<?php include (VIEW_PATH . "/foot.php"); ?>
        
</body>
</html>


    