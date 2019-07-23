<!DOCTYPE html>

<?php
    $menuActive_debug = "active";
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
    include (VIEW_PATH . "/public/banner.php");
    echo "</header>";
    
    include (APPLICATION_PATH . "/inc/db.inc.php");
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<main class="margin-top-6">    
<div class="container-fluid">
    
<!-- .................................................... -->      
<section id="review">
      
<h2>User Table</h2>

<div class="row">
<div class="col-sm-12">

<?php

$query = 
        "select 
            user_ID, 
            user_name, 
            user_password, 
            user_password_hash, 
            user_email 
        from User";
$query = 
        "select 
            *
        from user";
        
if(!$db) 
   {
      echo $db->lastErrorMsg();
   } 
     else 
   { 
       $results = $db->query($query);
        
       if ( $results->numColumns() < 1 )
       {
           echo "The query has returned no data";
       }
       else
       {
           $theData = array();
         
           while($entry = $results->fetchArray(SQLITE3_ASSOC))
           { 
               array_push( $theData, $entry );          
           }
           
           //Ref: https://getbootstrap.com/docs/4.0/content/tables/
           
           echo '<table class="table table-bordered table-striped table-hover table-sm table-responsive">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Password</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Address</th>
                </tr>
                </thead>
                <tbody>';
           
           foreach($theData as $row)
           {
                echo "<tr><td>" 
                  .$row["type_usr"]
                  ."</td><td>"
                  .$row["id_usr"]
                  ."</td><td>"
                  .$row["nameF_usr"]
                  ."</td><td>"
                  .$row["nameL_usr"]
                  ."</td><td>"
                  .$row["pass_usr"]
                  ."</td><td>"
                  .$row["email_usr"]
                  ."</td><td>"
                  .$row["mobile_usr"]
                  ."</td><td>"
                  .$row["address_usr"]
                  ."</td></tr>";
           }
           
            echo "</tbody></table>";
       }
         
       // to debug     
       // echo json_encode($theData);
             
   }
          
$db->close();
   
?>

</div>
</div>                     
            
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

