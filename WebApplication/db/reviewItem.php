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

// input checking

if ( empty($_REQUEST['iid']) )
{
    echo '<p class="text-warning"> No ID was provided </p>'	;
    exit;
}
else
{
    $iid = $db->escapeString(htmlspecialchars($_REQUEST['iid']));
    
    //echo '<p>iid :'.$iid.'</p>';
}

if(!$db) 
{
  echo '<p class="text-warning">'.$db->lastErrorMsg().'</p>';
  exit;
} 
 else 
{ 
    //Check if exists
     
    $query = "select * from Robots WHERE Robot_ID='".$iid."'";

    $results = $db->query($query);

    $theData = array();
         
    while($entry = $results->fetchArray(SQLITE3_ASSOC))
    { 
       array_push( $theData, $entry );          
    }
     
    if (count($theData) == 0)
    {
        // no record
        
        echo '<p class="text-danger"> Invalid ID : No records exist with this ID </p>'	;
        $db->close();
        exit;   
    }
    elseif( count($theData) != 1 ) 
    {
        //more than one record exists - data issue, should only be one
        
        echo '<p class="text-danger"> Invalid ID : Multiple records with this ID </p>'	;
        $db->close();
        exit;   
    }
    else
    {
       //Have one record
        
        echo '<div class="card card-container-fluid py-2 px-2">
        <form>';

        foreach($theData as $row)
        {    
            echo
            '<div class="form-group row">
                <label for="robotID" class="col-sm-4 col-form-label">ID</label>
                <div class="col-sm-8">
                <input id="robotID" readonly class="form-control" type="text" value="'
                .$row["Robot_ID"].'">'
                .'</div></div>'
            .'<div class="form-group row">
                <label for="robotName" class="col-sm-4 col-form-label">Robot Name</label>
                <div class="col-sm-8">
                <input id="robotName" readonly class="form-control" type="text" value="'
                .$row["RobotName"].'">'
                .'</div></div>'
            .'<div class="form-group row">
                <label for="robotDesc" class="col-sm-4 col-form-label">Description</label>
                <div class="col-sm-8">
                <textarea id="robotDesc" readonly class="form-control" type="text" rows="3" >'
                .$row["RobotDescription"].'</textarea>'
                .'</div></div>'
            .'<div class="form-group row">
                <label for="robotCost" class="col-sm-4 col-form-label">Robot Cost</label>
                <div class="col-sm-8">
                <input id="robotCost" readonly class="form-control" type="text" value="'
                .$row["RobotCost"].'">'
                .'</div></div>'
           .'<div class="form-group row">
                <label for="robotImage" class="col-sm-4 col-form-label"> Image</label>
                <div class="col-sm-8">'
                .'<img src="img/'.$row["RobotImage"].'" class="img-rounded img-responsive" alt="'.$row["RobotName"].'">'
                
                //<input id="robotImage" readonly class="form-control" type="text" value="'
                //.$row["RobotImage"].'">'
                
                .'</div></div>'
            ;
        }

        echo '   
        </form>
        </div><!-- /card-container -->';
        
       // echo json_encode($theData); 
        
       $db->close();   
    }
     
}