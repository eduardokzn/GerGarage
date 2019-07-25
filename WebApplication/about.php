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
      
      <h2>About Ger's Garage</h2>

      <!-- ROW 1 -->
      <div class="row">
        <div class="col-sm-12">

            <div class="col-12 col-md-6 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Address
                </h5>
                <p class="mbr-text">
                    1234 Street Name
                    <br>Dublin, Ireland</p>
            </div>

        </div><!-- column -->
        <div class="col-sm-12">
            <div class="col-12 col-md-6 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Contacts
                </h5>
                <p class="mbr-text">
                    Email: gersgarage@email.com<br>Phone: +353 (0) 80 000 0000<br></p>
            </div>
        </div><!-- column -->
        
      </div><!-- row -->
      <!-- END ROW 1 -->      
      <br>
      <br>
        
      <div class="col-sm-12">
            <div class="col-12 col-md-6 mbr-fonts-style display-7">
                <h5 class="pb-3">
                    Contact the Web Developer
                </h5>
                <p class="mbr-text">
                    Name: Eduardo Kenji Zen Nakashima<br>
                    Email: eduardo.k.z.n@gmail.com<br>
                    Phone: +353 (0) 83 825 0470<br>
                </p>
            </div>
        </div><!-- column -->
    
    </div>
            
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


    