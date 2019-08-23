<?php

// PRIVATE PAGE

//Ref: https://www.tutorialspoint.com/sqlite/sqlite_php.htm
//Ref: http://php.net/manual/en/sqlite3stmt.execute.php
//Ref: http://www.sqlitetutorial.net/sqlite-php/

//            define("MY_INC_CODE", 888);
//            define("APPLICATION_PATH", "app");
//            define("VIEW_PATH", APPLICATION_PATH . "/view");
//            define("MODEL_PATH", APPLICATION_PATH . "/model");
//            include (APPLICATION_PATH . "/inc/config.inc.php");
//            include (APPLICATION_PATH . "/inc/db.inc.php");

//            if(empty($_SESSION["id"])) {$user =16;} else
            {$user =$_SESSION["id"];}
//            $dt=$_REQUEST["bk_date"];
            

//echo $user;
//echo 'date: '.$_REQUEST["bk_date"].'<br>';
//
//    $query = "
//            SELECT    *
//            FROM      bookings b
//            LEFT JOIN vehicle v
//            LEFT JOIN bookingType bt
//            LEFT JOIN status s
//            WHERE     vehicle_bk=id_vhc
//            AND       type_bk=id_bt
//            AND       status_bk=id_sts
//            AND       vehicle_bk='".$vhc."'
//            AND       owner_vhc = ".$user."
//            ;";//    $query="
////        SELECT datetime('now') as now;
////            ";
//echo $query."<br>";
//if(!$db) { echo $db->lastErrorMsg(); }
//else
//   {
        try{
//                $results = $db->query($query);
//            echo "BookingList: There is no errors running the query.<br>";
//                if ($results->numColumns() <1)
//                 {echo '<br>dbconnection failure<br>';}
//                $theData = array($results);
//                while($entry = $results->fetchArray(SQLITE3_ASSOC))
//                { array_push($theData, $entry );}
//                    $nrows = 0;
//                    while ($results->fetchArray())
//                    {$nrows++;}
//                echo 'BookingList - rows: '.$nrows.'<br>';
    //            echo 'count rows: '.count($theData).'<br>';
//                if(count($theData) > 1){echo 'has rows<br>';}else {echo 'has no rows<br>';}
//           if ($results->numColumns() <1)
           if ($nrows == 0)
           {
                echo "There is no bookings.<br>";
           }
           else
           {
//                echo "There is bookings.<br>";
            echo '<div class="card card-container-fluid py-2 px-2">';
            echo '<table class="table table-bordered table-striped table-hover table-sm table-responsive" id="dbtable">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">Type</th>
                        <th scope="col">Budget</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Model</th>
                        <th scope="col">Engine</th>
                        <th scope="col">Register</th>
                        <th scope="col"> actions </th>
                    </tr>
                    </thead>
                    <tbody>';
               foreach($theData as $row)
               {
                    echo '<tr>'
                            . '<td>'.$row['description_bt'].'</td>'
                            . '<td>'.$row['budget_bt'].'</td>'
                            . '<td>'.$row['day_bk'].'</td>'
                            . '<td>'.$row['ref_sts'].'</td>'
                            . '<td>'.$row['brand_br'].'</td>'
                            . '<td>'.$row['model_mk'].'</td>'
                            . '<td>'.$row['description_eng'].'</td>'
                            . '<td>'.$row['register_vhc'].'</td>'
                        
                            . '<td class="crud">'
        //                      .'<a href="cancelBooking.php?iid='.$row['id_vhc'].'">work<i class="fa ml-2"></i></a>&nbsp;&nbsp;&nbsp;'
        //                      .'<a href="'.'updateItem.php?iid='.$row["id_vhc"].'">Update<i class="fa ml-2"></i></a>&nbsp;&nbsp;&nbsp;'
                              .'<a class="staffReview" href=#'.$row["id_vhc"].'>Bookings<i class="fa fa-arrow-circle-right ml-2"></i></a>&nbsp;&nbsp;'
                          //.'<p> href="'.'reviewItem.php?iid='.$row["id_vhc"].'">check</p>'
                            ."</td>"
                        . "</tr>";
               }
            echo '</div></div><!-- /card-container -->';
           }
        } catch (PDOException $e) { die($e->getMessage()); }
         
       // to debug     
       // echo json_encode($theData);
             
//   }
//$db->close();
   