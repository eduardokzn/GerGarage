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
if ( empty($_REQUEST['email']) || empty($_REQUEST['password']))
{
    header("Location: index.php?login=empty");
    exit;
}
else
{   $email = $db->escapeString(htmlspecialchars($_REQUEST['email']));
    $password1 = $db->escapeString(htmlspecialchars($_REQUEST['password']));
    $password = password_hash($password1,PASSWORD_DEFAULT);}

if(!$db) 
{
  echo $db->lastErrorMsg();
  header("Location: index.php?login=dbfail");
  exit;
} 
else 
{ 
    $stm = "  SELECT id_usr,email_usr, pass_usr, link_tu from 
                    user u 
                LEFT JOIN 
                    typeUser t 
                WHERE 
                    u.type_usr = t.id_tu
                AND u.email_usr='$email' 
                LIMIT 1;";
echo $stm ;
echo '<br>';
     try
     {
         $results = $db->query($stm);
     }
     catch (PDOException $e)
     {
         die($e->getMessage());
     }

    $theData = array();
    while($entry = $results->fetchArray(SQLITE3_ASSOC))
    {
        array_push($theData, $entry );
    }
    foreach($theData as $row)
    {
//troubleshooting
        echo 'data: ';
        echo $row["pass_usr"];
        echo '<br>form: ';
        echo $password1;
        echo '<br>password_verify:<br>';
        echo password_verify($password, $row["pass_usr"]);
        if (password_verify($password1, $row["pass_usr"]))
            {echo 'TRUE';}
        else
            {echo 'FALSE';}
        if ($results->numColumns() > 1)
        {echo '<br> TRUE';}
        echo '<br>link: ';
        $lk = $row["link_tu"];
        echo $lk;
        $user_id=$row["id_usr"];
        echo '<br>id: '+$user_id;
//  
    if (password_verify($password1, $row["pass_usr"]))
    {
        //we have a result if we had an encrypted password we would check here
        //as the select would only be on the email
        $entry = $results->fetchArray(SQLITE3_ASSOC);
        
        //set session as logged in
        $_SESSION["loggedIn"]=1;
        $_SESSION["id"] = $user_id;
        header("Location: ".$lk);
    }
    else
    {
        //no result
        header("Location: index.php?login=nouser");
    }
        
    }
    $db->close();
}


