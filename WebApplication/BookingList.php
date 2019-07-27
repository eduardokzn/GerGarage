<?php

// PRIVATE PAGE

//Ref: https://www.tutorialspoint.com/sqlite/sqlite_php.htm
//Ref: http://php.net/manual/en/sqlite3stmt.execute.php
//Ref: http://www.sqlitetutorial.net/sqlite-php/

$db = new DBConnection();

//echo $_SESSION["id"];

    $query = "
            SELECT
                *
            FROM
                bookings bk
            LEFT JOIN
                bookingType t
            LEFT JOIN
                vehicle v
            LEFT JOIN
                status st
            LEFT JOIN
                user u
            WHERE
                owner_vhc = ".$_SESSION["id"]."
            AND
                type_bk=id_bt
            AND
                vehicle_bk=id_vhc
            AND
                staff_bk=id_usr
            ;";
echo $query;
if(!$db) 
   {
      echo $db->lastErrorMsg();
   }
else
   {
        try
        {
            $results = $db->exec($query);
        }
        catch (PDOException $e)
        {
            die($e->getMessage());
        }
        
       if ( count($results) < 1 )
       {
            echo "There is no bookings.<br>";
       }
       else
       {
           $theData = array();
         
           while($entry = $results->fetchArray(SQLITE3_ASSOC))
           { 
               array_push( $theData, $entry );          
           }
           
           //Ref: https://getbootstrap.com/docs/4.0/content/tables/
           
           echo '<div class="card card-container-fluid py-2 px-2">';
           
           echo '<table class="table table-bordered table-striped table-hover table-sm table-responsive" id="dbtable">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Model</th>
                    <th scope="col">Register</th>
                    <th scope="col"> actions </th>
                </tr>
                </thead>
                <tbody>';
           
           foreach($theData as $row)
           {
                echo "<tr><td>"
                  .$row["description_vht"]
                  ."</td><td>"
                  .$row["brand_br"]
                  ."</td><td>"
                  .$row["model_mk"]
                  ."</td><td>"
                  .$row["register_vhc"]
                  .'</td><td class="crud">'
                  .'<a href="'
                  .'deleteVehicle.php?iid='
                  .$row["id_vhc"]
                  .'"><i class="fa fa-trash-o ml-2"></i></a>&nbsp;&nbsp;&nbsp;'
//                  .'<a href="'
//                  .'updateItem.php?iid='
//                  .$row["id_vhc"]
//                  .'">Update<i class="fa ml-2"></i></a>&nbsp;&nbsp;&nbsp;'
                  .'<a class="review" href=#'
                  .$row["id_vhc"]
                  .'>Bookings<i class="fa fa-arrow-circle-right ml-2"></i></a>&nbsp;&nbsp;'
                  //.'<p> href="'
                  //.'reviewItem.php?iid='
                  //.$row["id_vhc"]
                  //.'">check</p>'
                  ."</td></tr>";
           }
           
           echo "</tbody></table>";
           echo'<small> <i class="fa fa-trash-o"></i> = delete record </small>';
           echo "</div>";

       }
         
       // to debug     
       // echo json_encode($theData);
             
   }
$db->close();
   