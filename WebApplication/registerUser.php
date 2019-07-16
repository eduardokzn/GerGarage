<?php

class DBConnection extends SQLite3 {
  function __construct() {
     $this->open('./db/ShopStore');
  }
}

$db = new DBConnection();

//get the values sent in by GET or POST.
// THIS CODE WOULD ALLOW SQL INJECTION
// $user = $_REQUEST['user'];
// $pass = $_REQUEST['pass'];
// should wrap all inputs with the following
// $input = $db->escapeString(htmlspecialchars( $_REQUEST['fieldName']));

// input checking

if ( 
    empty($_REQUEST['userFn']) ||
    empty($_REQUEST['userLn']) ||
    empty($_REQUEST['mobile']) || 
    empty($_REQUEST['password1']) || 
    empty($_REQUEST['password2']) || 
    empty($_REQUEST['email'])
   )
{
    header("Location: registration.php?registration=empty");
    exit;
}
else{
    if($_REQUEST['password1']!=$_REQUEST['password2'])
    {
        header("Location: registration.php?registration=pass");
        exit;
    }
    else
    {
        $userFn = $db->escapeString(htmlspecialchars($_REQUEST['userFn']));
        $userLn = $db->escapeString(htmlspecialchars($_REQUEST['userLn']));
        $mobile = $db->escapeString(htmlspecialchars($_REQUEST['mobile']));
        $password1 = $db->escapeString(htmlspecialchars($_REQUEST[hash('ekzn' +'password1')]));
        $email = $db->escapeString(htmlspecialchars($_REQUEST['email']));
    }
}
if(!$db) 
{
  echo $db->lastErrorMsg();
  header("Location: registration.php?registration=dbfail");
  exit;
} 
 else 
{ 
    //Check if user or email exists already
     
    $query = "
            SELECT 
                user_email 
            FROM
                user 
            WHERE
                user_email='$email';";
     
    $results = $db->query($query); 
     
    $theData = array($results);
    while($entry = $results->fetchArray(SQLITE3_ASSOC))
    { 
       array_push( $theData, $entry );          
    }
     
    if (count($theData) > 1)
    {
        //Same username or email as an existing user
		header("Location: registration.php?registration=exists");
        exit;
    }
    
     // AUTOINCREMENT is on the ID column
     
    $stm = "INSERT INTO User(user_name, user_company, user_password_hash, user_email ) 
                    VALUES ('$user', '$company', '$password1', '$email')"; 
     
   $return = $db->exec($stm);
   if(!$return) 
   {
      echo $db->lastErrorMsg();
      header("Location: registration.php?registration=dbfail");
   } 
   else 
   {
       
      header("Location: registration.php?registration=ok");
//      href="userExistsCheck.php"
//       header("Location: userExistsCheck.php?username="$user);
//      header("Location: login.php?registration=ok");

   }
   $db->close(); 
     
}



?>