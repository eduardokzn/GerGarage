<!DOCTYPE html>

<?php
    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "");
    define("VIEW_PATH", APPLICATION_PATH . "app/view");
    include (APPLICATION_PATH . "app/inc/config.inc.php");
    include (APPLICATION_PATH . "app/inc/db.inc.php");   
    
//    $menuActive_home = "active";
    $menuActive_privatepage1 = "active";
//    $menuActive_privatepage2 = "active";
//    $menuActive_privatepage3 = "active";

//needs to be at the start of every page where you will use $_SESSION
    session_start();

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
    include (VIEW_PATH . "/private/admin/nav-admin.php"); 
    echo "<header>";
?>
        
<!-- MAIN CONTENT ------------------------------------------>
<main class="margin-top-6 center">    

    <?php

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    //throw you off the page if not logged in
    // just in case someone trys the page with a direct URL
    header("Location:index.php");
}


?><head><?php include (VIEW_PATH . "/head.php"); ?></head><?php 
// input checking
//declare variables
//    if($user =null){$user =16;}else
    {$user =$_SESSION["id"];}
    if (empty($user) )
    {
        echo '<p class="text-warning"> No ID was provided </p>'	;
        exit;
    }
    else
    {
        $user =1;
    }

if(!$db) 
{
  echo '<p class="text-warning">'.$db->lastErrorMsg().'</p>';
  exit;
} 
 else 
{ 
    $query = "
            SELECT
                *
            FROM
                 bookings b
            LEFT JOIN
                bookingType bt
            LEFT JOIN
                status s
            LEFT JOIN
                vehicle v
            LEFT JOIN
                make m
            LEFT JOIN
                brand b
            LEFT JOIN
                engine e
            WHERE
                type_bk=id_bt
            AND 
                status_bk=id_sts
            AND
                vehicle_bk=id_vhc
            AND
                make_vhc=id_mk
            AND
                brand_mk=id_br
            AND
                engine_vhc=id_eng
            ORDER BY
                day_bk desc
            ;";
   // echo '<br> '.$query.'<br> ';
    try{
        $results = $db->query($query);
//        echo "vhc:There is no errors running the query.<br>";
        if ($results->numColumns() <1)
         {echo '<br>dbconnection failure<br>';}
        $theData = array();
        while($entry = $results->fetchArray(SQLITE3_ASSOC))
        { array_push($theData, $entry );}
            $nrows = 0;
            while ($results->fetchArray())
            {$nrows++;}
                echo 'admBooking - rows: '.$nrows.'<br>';
    //            echo 'count rows: '.count($theData).'<br>';
//                if(count($theData) > 1){echo 'has rows<br>';}else {echo 'has no rows<br>';}
        if ($nrows == 0)
        {
            // no record
            echo '<p class="text-warning"> No bookings: No records exists in the database</p>';
            {//calendar
                $today = date("y/m/d");
                //echo $today;
//           echo '<br>before bookingAddForm.php<br>';
//            include ("bookingAddForm.php");            
//           echo '<br>after bookingAddForm.php<br>';
                        }
//            echo'<div id="BookingList"></div><!-- replace by AjaxBooking.js-->';
//            include ("bookingAddForm.php");
        }
        else
        {
           //Have record
            ?>
                <div class="container-fluid">                <div class="row">
                    <div class="col-sm-6">
                        <?php include (VIEW_PATH . "/private/admin/admBookingList.php"); ?>
                    </div><!-- column -->
                    <div class="col-sm-6">    
                    <h3>Booking details</h3>
                    <!-- AJAX -->
                    <div id="admBookingForm">
                        <!-- review data placed here following AJAX call -->
                        <p> Click 'Booking' to see details </p>
                    </div>
                    <div id="ReviewPanel_AJAXResponseErrorMessage"></div>
                    <div id="ReviewPanel_AJAXResponseErrorVariables"></div>
                    <!-- END AJAX -->
                    </div><!-- column -->  
                    </div><!-- row -->
                    <!-- END ROW 1 -->      
                </div>
            <?php 
            
            
            
       $db->close();   
        }
    } catch (PDOException $e) { die($e->getMessage()); }
}

?>
</main>
</html>