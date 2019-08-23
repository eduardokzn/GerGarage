<?php 
    session_start();
    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");

    include (APPLICATION_PATH . "/inc/config.inc.php");
    include (APPLICATION_PATH . "/inc/db.inc.php");
//get the values sent in by GET or POST.
// THIS CODE WOULD ALLOW SQL INJECTION
// $user = $_REQUEST['user'];
// $pass = $_REQUEST['pass'];
// THIS CODE WOULD BLOCK SQL INJECTION
// should wrap all inputs with the following
// $input = $db->escapeString(htmlspecialchars( $_REQUEST['fieldName']));

// input checking

//if ( 
////    empty($_REQUEST['email']) ||
////    empty($_REQUEST['mobile']) || 
////    empty($_REQUEST['password1']) || 
//    empty($_REQUEST['password2'])
//   )
//{
//    header("Location: registration.php?registration=empty");
//    exit;
//}
//else
//{
    if($_REQUEST['password1']!=$_REQUEST['password2'])
    {
        header("Location: registration.php?registration=pass");
        exit;
    }
    else //declare variables
    {
        $email = $db->escapeString(htmlspecialchars($_REQUEST['email']));
        $userFn = $db->escapeString(htmlspecialchars($_REQUEST['userFn']));
        $userLn = $db->escapeString(htmlspecialchars($_REQUEST['userLn']));
        $address = $db->escapeString(htmlspecialchars($_REQUEST['address']));
        $mobile = $db->escapeString(htmlspecialchars($_REQUEST['mobile']));
        $password1 = $db->escapeString(htmlspecialchars($_REQUEST['password1']));
        $password = password_hash($password1,PASSWORD_DEFAULT);
//        $salt="ekzn";
//        $password = password_hash($password1);
    }
//}
//if(!$db) 
//{
//  echo $db->lastErrorMsg();
//  header("Location: registration.php?registration=dbfail");
//  exit;
//} 
// else 
//{ 
    //Check if user or email exists already
    $query = "
            SELECT 
                id_usr
            FROM
                user 
            WHERE
                email_usr='$email';";
     
    $results = $db->query($query);
    $theData = array($results);

    
    while($entry = $results->fetchArray(SQLITE3_ASSOC))
    { 
       array_push($theData, $entry );          
    }
     
    if (count($theData) > 1)
    {
        //Same username or email as an existing user
        header("Location: registration.php?registration=exists");
        exit;
    }
    
     // AUTOINCREMENT is on the ID column
     
    $stm = "INSERT INTO 
            user(
                type_usr,
                id_usr,
                nameF_usr,
                nameL_usr,
                address_usr,
                mobile_usr,
                pass_usr,
                email_usr)
            VALUES (
                2,
                null,
                '".$userFn."', 
                '".$userLn."', 
                '".$mobile."', 
                '".$address."',
                '".$password."',
                '".$email."');";
     
    try
    {
        $return = $db->exec($stm);
    }
    catch (PDOException $e)
    {
        die($e->getMessage());
    }
   
   if(!$return) 
   {
      echo $db->lastErrorMsg();
      header("Location: registration.php?registration=dbfail");
   } 
   else 
   {
       
      header("Location: registration.php?registration=ok");
   }
     
//}

   $db->close(); 


?>