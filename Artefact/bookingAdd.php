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
    
<form action="registerBooking.php" method="POST" id="registration1">
        <!--<label for="type">Vehicle Type:</label>-->
        <select 
            class="form-control" 
            required
            id="bk_vhc"
            name="bk_vhc"
            selected 
            >
            <?php
                include ("sqlVehicle.php");
            ?>
        </select>
        <br>

        <input type="date" 
            class="form-control" 
            id="bk_date" name="bk_date" 
            required autofocus
        >
        <br> 
        
        <select 
            class="form-control" 
            required
            id="bk_type"
            name="bk_type"
            selected 
            >
            <?php
                include ("sqlTypeBk.php");
            ?>
        </select>
        <br>

        <input type="text" 
            class="form-control" 
            id="bk_note" name="bk_note"
            placeholder="Give us some previus information here"
        >
        <br>
        <button class="btn btn-lg btn-mute btn-block btn-signin" type="submit">Book now</button>
        <?php $db->close();?>
    </form>

    <p>

    <!-- if there is an issue with registration, 
         return here with a registration parameter so we can show a status
    -->
    <?php
        //$('vehicleAdd').load("vehicleAdd.php");
        if( $_GET != NULL && !empty($_GET['bookingAdd']))
        {
            $regStatus = $_GET['bookingAdd'];
            if($regStatus == 'exists')
                {echo '<p>Booking already exists</p>';}
            elseif($regStatus == 'dbfail')
                {echo '<p>Database connection issue</p>';}
            elseif($regStatus == 'ok')
                {echo '<p>Booking was sucessful</p>';}     
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
