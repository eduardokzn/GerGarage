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
<main class="margin-top-6 center">    
<div class="container"> 
<br>
<div class="card card-container mx-auto">
          
<h2 class="text-center">Add Vehicle</h2>
    
    <form action="registerVehicle.php" method="POST" id="registration1">

        <!--<label for="type">Vehicle Type:</label>-->
        <select 
            class="form-control" 
            id="vhc_type"
            name="vhc_type"
            value="<?php echo $vhc_type;?>"
            >
            <?php
                include ("sqlTypeVhc.php");
            ?>
        </select>
        <br>

        <select 
            class="form-control" 
            id="vhc_make"  
            name="vhc_make"  
            value="<?php echo $vhc_make;?>"
        >
            <?php
                include ("sqlMake.php");
            ?>
        </select>
        <br>

        <select 
            class="form-control" 
            id="vhc_engine"
            name="vhc_engine"  
            value="<?php //echo $vhc_engine;?>"
        >
            <?php
                include ("sqlEngine.php");
            ?>
        </select>
        <br>

        
        <input type="text"  
               id="vhc_register"  
               name="vhc_register"
               class="form-control"
               placeholder="Register. Ex: 192D1234" 
               value="<?php //echo $vhc_register;?>"
               required 
        >
        <br>        
        <button class="btn btn-lg btn-mute btn-block btn-signin" type="submit">Register</button>
        <?php $db->close();?>
    </form>

    <p>

    <!-- if there is an issue with registration, 
         return here with a registration parameter so we can show a status
    -->
    <?php
        //$('vehicleAdd').load("vehicleAdd.php");
        if( $_GET != NULL && !empty($_GET['vehicleAdd']))
        {
            $regStatus = $_GET['vehicleAdd'];

            if($regStatus == 'exists')
                {echo '<p>Register plate already exists</p>';}
            elseif($regStatus == 'dbfail')
                {echo '<p>Database connection issue</p>';}
            //elseif($regStatus == 'empty')
            //    {echo '<p>Either mobile, email or password are empty</p>';}   
//            elseif($regStatus == 'pass')
//                {echo '<p>Password does not match</p>';}
            elseif($regStatus == 'ok')
                {echo '<p>registration was sucessful</p>';}     
            else
                {echo $regStatus;}
        }
    ?>
    </p>

</div><!-- /card-container -->
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
