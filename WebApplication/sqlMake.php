<?php
//define("MY_INC_CODE", 888);
//define("APPLICATION_PATH", "app");
//define("VIEW_PATH", APPLICATION_PATH . "/view");
//define("MODEL_PATH", APPLICATION_PATH . "/model");
//include (APPLICATION_PATH . "/inc/config.inc.php");
//include (APPLICATION_PATH . "/inc/db.inc.php");
session_start();
if(!$db) 
{
  echo $db->lastErrorMsg();
  exit;
} 
else 
{ 
    $stm = "    SELECT 
                    brand_br||' - '||model_mk mk,
                    brand_br,
                    model_mk 
                FROM
                    make m
                LEFT JOIN
                    brand b
                WHERE
                    m.brand_mk = b.id_br
                ORDER BY
                    brand_br
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
       echo ' <option> ';
       echo $row["mk"];
       echo ' </option> ';
      //$user_id=$row["id_usr"];
    }
}
    $db->close();
?>