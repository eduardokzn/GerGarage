<?php

// PRIVATE PAGE

//Ref: https://www.tutorialspoint.com/sqlite/sqlite_php.htm
//Ref: http://php.net/manual/en/sqlite3stmt.execute.php
//Ref: http://www.sqlitetutorial.net/sqlite-php/

//echo $_SESSION["id"];

    $query = "
            SELECT
                *
            FROM
                vehicle v 
            LEFT JOIN
                make m
            LEFT JOIN
                brand b
            LEFT JOIN
                vehicleType t
            LEFT JOIN
                engine e
            WHERE 
                owner_vhc = ".$_SESSION["id"]."
            AND
                type_vhc=id_vht
            AND
                make_vhc=id_mk
            AND
                brand_mk=id_br
            AND
                engine_vhc=id_eng
            ;";
//echo $query;
if(!$db) 
   {
      echo $db->lastErrorMsg();
   }
     else 
   {
       $results = $db->query($query);
        
       if ( $results->numColumns() < 1 )
       {
            echo "There is no vehicle registered.<br>"
               . "Please, click on New Vehicle on the top.";
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
   