<?php

// PRIVATE PAGE

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
    header("Location: privatepage3.php?deleteStatus=empty");
    exit;
}
else
{
    $iid = $db->escapeString(htmlspecialchars($_REQUEST['iid']));
}

if(!$db) 
{
  echo $db->lastErrorMsg();
  header("Location: privatepage3.php?deleteStatus=dbfail");
  exit;
} 
 else 
{ 
    //Check if exists
     
    $query = "select Robot_ID from Robots WHERE Robot_ID='$iid'";
     
    $results = $db->query($query); 
     
    if ($results->numColumns() == 0)
    {
        // no record
        
        header("Location: privatepage3.php?deleteStatus=invalid");
        exit;   
    }
    elseif( $results->numColumns() != 1 ) 
    {
        //more than one record exists - data issue, should only be one
        
        header("Location: privatepage3.php?deleteStatus=dataIssue");
        exit;   
    }
    else
    {
       //sure we have one record to delete
        
       $stm = "DELETE FROM Robots WHERE Robot_ID='$iid'";

       $return = $db->exec($stm);
        
       if(!$return) 
       {
          echo $db->lastErrorMsg();
          header("Location: privatepage3.php?deleteStatus=dbfail");
       } 
       else 
       {
          header("Location: privatepage3.php?deleteStatus=ok");
       }
        
       $db->close(); 
        
    }
     
}


