<?php 
    session_start();
    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");
    include (APPLICATION_PATH . "/inc/config.inc.php");
    include (APPLICATION_PATH . "/inc/db.inc.php");

// input checking

//    if($_REQUEST['password1']!=$_REQUEST['password2'])
//    {
////        header("Location: registration.php?registration=pass");
//        exit;
//    }
//    else //declare variables
//    {
        $vhc_Register = $db->escapeString(htmlspecialchars($_REQUEST['vhc_register']));
//    }
//    check user logged in
    ?><?php
        $make = explode(" - ", $_POST['vhc_make']);
        echo 'vhc_owner '.$_SESSION["id"].'<br>';
        echo 'vhc_type '.$_REQUEST['vhc_type'].'<br>';
        echo 'vhc_make '.$_REQUEST['vhc_make'].'<br>';
           echo 'vhc_brand '.$make[0].'<br>'; // brand
           echo 'vhc_make '.$make[1].'<br>'; // model
        echo 'vhc_engine '.$_REQUEST['vhc_engine'].'<br>';
        echo 'vhc_register '.$_REQUEST['vhc_register'].'<br>';
        echo 'chk_register '.$vhc_Register .'<br>';
    ?><?php
    //Check if Register exists already
    $query = "
            SELECT 
                id_vhc,
                type_vhc,
                make_vhc,
                engine_vhc,
                register_vhc,
                owner_vhc
            FROM
                vehicle 
            WHERE
                register_vhc='$vhc_Register';";
     
    $results = $db->query($query);
    $theData = array($results);
    while($entry = $results->fetchArray(SQLITE3_ASSOC))
    { 
       array_push($theData, $entry );          
    }
     
    if (count($theData) > 1)
    {
        //Same username or email as an existing user
        header("Location: vehicleAdd.php?vehicleAdd=exists");
        echo "<br>vehicle register already registered";
        exit;
    }
    else
        {
        echo "<br>good: vehicle register not registered";
        }
//    
//     // AUTOINCREMENT is on the ID column
//     
    $stm = "INSERT INTO 
                vehicle
            (
                id_vhc,
                type_vhc,
                make_vhc,
                engine_vhc,
                register_vhc,
                owner_vhc
            )
            VALUES (
                null
                ,'".$_REQUEST['vhc_type']."' 
                ,'".$make[1]."' 
                ,'".$_REQUEST['vhc_engine']."'
                ,'".$vhc_Register."'
                ,'".$_SESSION["id"]."'"
                .");";
     echo "<br>".$stm;
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
        echo "<br>BAD: DB connection failed";
      header("Location: vehicleAdd.php?vehicleAdd=dbfail");
   } 
   else 
   {
        header("Location: vehicleAdd.php?vehicleAdd=ok");
        echo "<br>good: vehicle sucessful registered";
   }

   $db->close(); 


?>