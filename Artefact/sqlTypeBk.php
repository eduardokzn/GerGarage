<?php
//start of debug session
//    define("MY_INC_CODE", 888);
//    define("APPLICATION_PATH", "app");
//    define("VIEW_PATH", APPLICATION_PATH . "/view");
//    define("MODEL_PATH", APPLICATION_PATH . "/model");
//    include (APPLICATION_PATH . "/inc/config.inc.php");
//    include (APPLICATION_PATH . "/inc/db.inc.php");
//end of debug session
session_start();
if(!$db) 
{
  echo $db->lastErrorMsg();
  exit;
} 
else 
{ 
    $stm = "    SELECT
                    id_bt id
                    ,description_bt desc
                    ,budget_bt budget
                FROM
                    bookingType
                WHERE
                    budget_bt >=1
                ORDER BY
                    description_bt
                ;";
//    echo $stm ;
//    echo '<br>.';
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
       echo ' <option value="';
       echo $row["id"];
       echo '" > ';
       echo $row["desc"]." - EUR ".$row["budget"].".00";
       echo ' </option> ';
      //$user_id=$row["id_usr"];
    }
}
//    $db->close();
?>