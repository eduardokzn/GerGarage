<?php

/*****************************************
 * Author: Conor O'Reilly
 ***************************************** */

//Start session
session_start();

define("MY_INC_CODE", 888);
define("APPLICATION_PATH", "app");
define("VIEW_PATH", APPLICATION_PATH . "/view");

include (APPLICATION_PATH . "/inc/config.inc.php");
include (APPLICATION_PATH . "/inc/db.inc.php");


//get the values sent in by GET or POST.
// THIS CODE WOULD ALLOW SQL INJECTION
// $user = $_REQUEST['user']; should wrap all inputs with the following
// $input = $db->escapeString(htmlspecialchars( $_REQUEST['fieldName']));

// input checking
if ( empty($_REQUEST['username']) || empty($_REQUEST['password']))
{
    header("Location: index.php?login=empty");
    exit;
}
else
{   $username = $db->escapeString(htmlspecialchars($_REQUEST['username']));
    $password = $db->escapeString(htmlspecialchars($_REQUEST['password']));
}

if(!$db) 
{
  echo $db->lastErrorMsg();
  header("Location: index.php?login=dbfail");
  exit;
} 
else 
{ 
    $query = "  SELECT 
                    user_ID, user_name, user_password, 
                    user_password_hash, user_email from User 
                WHERE 
                    user_name='$username' AND 
                    user_password='$password' limit 1";
     
    $results = $db->query($query);
     
    if ($results->numColumns() > 1)
    {
        //we have a result if we had an encrypted password we would check here
        //as the select would only be on the username
        $entry = $results->fetchArray(SQLITE3_ASSOC);
        
        //set session as logged in
        $_SESSION["loggedIn"]=1;
		header("Location: home.php");
    }
    else
    {
        //no result
        header("Location: index.php?login=nouser");
    }
    
    $db->close();
    
}


