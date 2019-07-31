<?php
    session_start();
    define("MY_INC_CODE", 888);
    define("APPLICATION_PATH", "app");
    define("VIEW_PATH", APPLICATION_PATH . "/view");
    define("MODEL_PATH", APPLICATION_PATH . "/model");
    include (APPLICATION_PATH . "/inc/config.inc.php");
    include (APPLICATION_PATH . "/inc/db.inc.php");

//declare variables
//    if(empty($_SESSION["id"])){$user =16;}else
    {$user =$_SESSION["id"];}
    $bkT=$db->escapeString(htmlspecialchars($_REQUEST['bk_type']));
    $vhc=$db->escapeString(htmlspecialchars($_REQUEST['bk_vhc']));
    $bkD=$db->escapeString(htmlspecialchars($_REQUEST['bk_date']));
    $bkN=$db->escapeString(htmlspecialchars($_REQUEST['bk_note']));
    if(empty($bkN))
        {$bkN='null';}        
    else
        {$bkN='"'.$bkN.'"';}
//    echo $user;
//    echo 'date: '.$bkD.'<br>';

    $query = "
            SELECT
                *
            FROM bookings B
            LEFT JOIN bookingType t 
            LEFT JOIN vehicle v 
            LEFT JOIN status st 
            LEFT JOIN user u 
            WHERE 
                type_bk=id_bt 
            AND vehicle_bk=id_vhc 
            AND owner_vhc = ".$user."
            AND owner_vhc=id_usr
            AND id_vhc = ".$vhc."
            AND day_bk='".$bkD."'
            ;";
//    $query = "SELECT * FROM user;";

//    echo $query.'<br>';
    if(!$db)  { echo $db->lastErrorMsg(); }
    else
       {
        try{
            $results = $db->query($query);
            if(!$results) 
            {
               echo $db->lastErrorMsg();
                 echo "<br>BAD: DB connection failed";
               header("Location: bookingAdd.php?bookingAdd=dbfail");
               exit;
            } 
            else 
            {
                 echo "<br>good: Booking select sucessful ";
            }
            $theData = array($results);
            while($entry = $results->fetchArray(SQLITE3_ASSOC))
            { array_push($theData, $entry );}
//        echo 'no error to run the SQL<br>';

//        if (version_compare(PHP_VERSION, '5.3.0') >= 0) {echo 'I am at least PHP version 5.3.0, my version: ' . PHP_VERSION . "\n";}
            $nrows = 0;
            while ($results->fetchArray())
            {$nrows++;}
//            echo 'rows: '.$nrows.'<br>';
//            echo 'count rows: '.$nrows.'<br>';
//            if(count($theData) > 1)
//                {echo 'has rows<br>';}
//            else {echo 'has no rows<br>';}
            
        }catch (PDOException $e ){ die($e->getMessage()); } 
//       if ($results->numColumns() <1)
//       if ($results=null)
//       if (empty($results))
        if(count($theData) > 1)
        {
             echo "Double booking to same date is not allowed.<br>";
             header("Location: bookingAdd.php?bookingAdd=exists");
            echo "<br>Booking already registered for that date";
            exit;

        }
        else
        {
//          echo "There is no bookings.<br>";
            $query = "
                    INSERT INTO
                        bookings
                        (
                            id_bk,
                            type_bk,
                            vehicle_bk,
                            day_bk,
                            status_bk,
                            note_bk
                        )
                        VALUES
                        (
                            null,
                            ".$bkT.",
                            ".$vhc.",
                            '".$bkD."',
                            1,
                            ".$bkN."
                        );";
    echo $query.'<br>';

    if(!$db)  
    { echo $db->lastErrorMsg(); }
    else
       {
        try{
            $results = $db->query($query);
            header("Location: bookingAdd.php?bookingAdd=ok");
            exit;
        }catch (PDOException $e ){ die($e->getMessage()); }
//        echo 'no error to run the SQL<br>';
       }
         
       // to debug     
//        echo json_encode($theData);
             
       }
       
    }
$db->close();
   