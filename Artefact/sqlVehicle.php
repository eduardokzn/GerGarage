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
    if(empty($_SESSION["id"])){$user =16;}else
    {$user =$_SESSION["id"];}
    $stm = "    SELECT
                    id_vhc id
                    ,brand_br br
                    ,register_vhc register
                FROM
                    vehicle
                LEFT JOIN
                    make
                LEFT JOIN
                    brand
                WHERE
                    make_vhc=id_mk
                AND
                    brand_mk=id_br
                AND
                    owner_vhc =".$user."
                ORDER BY
                    register_vhc
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
//       echo $row["br"]." - ".$row["model"].": ".$row["register"];
       echo $row["br"]." - ".$row["register"];
       echo ' </option> ';
      //$user_id=$row["id_usr"];
    }
}
//    $db->close();
?>