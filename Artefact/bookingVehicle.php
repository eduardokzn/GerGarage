<!DOCTYPE html>

<html lang="en">
<?php

// PRIVATE PAGE

// THIS PAGE IS NOT AN INCLUDE IT IS BEING AJAX CALLED SO WE ECHO THE OUTPUT
// AND THERE ARE NO REDIRECTS

//Ref: https://www.tutorialspoint.com/sqlite/sqlite_php.htm
//Ref: http://php.net/manual/en/sqlite3stmt.execute.php
//Ref: http://www.sqlitetutorial.net/sqlite-php/

//needs to be at the start of every page where you will use $_SESSION
session_start();

if (!isset($_SESSION["loggedIn"]) && !$_SESSION["loggedIn"] == 1)
{
    //throw you off the page if not logged in
    // just in case someone trys the page with a direct URL
    header("Location:index.php");
}

define("MY_INC_CODE", 888);
define("APPLICATION_PATH", "app");
define("VIEW_PATH", APPLICATION_PATH . "/view");
define("MODEL_PATH", APPLICATION_PATH . "/model");
include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");

?><head><?php include (VIEW_PATH . "/head.php"); ?></head><?php 
// input checking
//declare variables
//    if($user =null){$user =16;}else
    {$user =$_SESSION["id"];}
    if (empty($_REQUEST['iid']) )
    {
        echo '<p class="text-warning"> No ID was provided </p>'	;
        exit;
    }
    else
    {
        $vhc=$db->escapeString(htmlspecialchars($_REQUEST['iid']));
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
                vehicle v
            LEFT JOIN
                bookingType bt
            LEFT JOIN
                status s
            WHERE
                vehicle_bk=id_vhc
            AND
                type_bk=id_bt
            AND 
                status_bk=id_sts
            AND
                vehicle_bk='".$vhc."'
            AND
                owner_vhc = ".$user."
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
//                echo 'bookingVehicle - rows: '.$nrows.'<br>';
    //            echo 'count rows: '.count($theData).'<br>';
//                if(count($theData) > 1){echo 'has rows<br>';}else {echo 'has no rows<br>';}
        if ($nrows == 0)
        {
            // no record
            echo '<p class="text-warning"> No bookings: No records exists to this vehicle</p>';
            {//calendar
                $today = date("d/m/y");
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
//           echo '<br>before bookingList.php<br>';
            include ("bookingList.php");
//           echo '<br>after bookingList.php<br>';
//            include ("bookingAddForm.php");
//
// echo json_encode($theData); 
        $db->close();   
        
        }
    } catch (PDOException $e) { die($e->getMessage()); }
     
}

?>
</html>