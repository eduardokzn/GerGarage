<?php

// PRIVATE PAGE

//Ref: https://www.tutorialspoint.com/sqlite/sqlite_php.htm
//Ref: http://php.net/manual/en/sqlite3stmt.execute.php
//Ref: http://www.sqlitetutorial.net/sqlite-php/


defined('MY_INC_CODE') or die('Access to this file is restricted');

$query = "select Robot_ID, RobotName from Robots";
    
if(!$db) 
   {
      echo $db->lastErrorMsg();
   } 
     else 
   { 
       $results = $db->query($query);
        
       if ( $results->numColumns() < 1 )
       {
           echo "The query has returned no data";
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
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col"> actions </th>
                </tr>
                </thead>
                <tbody>';
           
           foreach($theData as $row)
           {
                echo "<tr><td>" 
                  .$row["Robot_ID"]
                  ."</td><td>"
                  .$row["RobotName"]
                  .'</td><td class="crud">'
                  .'<a href="'
                  .'deleteItem.php?iid='
                  .$row["Robot_ID"]
                  .'"><i class="fa fa-trash-o ml-2"></i></a>&nbsp;&nbsp;&nbsp;'
                  //.'<a href="'
                  //.'updateItem.php?iid='
                  //.$row["Robot_ID"]
                  //.'">update<i class="fa fa-arrow-circle-right ml-2"></i></a>&nbsp;'
                  .'<a class="review" href=#'
                  .$row["Robot_ID"]
                  .'>more<i class="fa fa-arrow-circle-right ml-2"></i></a>&nbsp;'
                  //.'<p> href="'
                  //.'reviewItem.php?iid='
                  //.$row["Robot_ID"]
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
   