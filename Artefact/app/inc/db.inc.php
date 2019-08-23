<?php

/* ****************************************
 * Author: Conor O'Reilly
 * *************************************** */

/*
 * Checks that the constant is defined this include
 * will only run if it recieves the defined constent
 */

defined('MY_INC_CODE') or die('Access to this file is restricted');

/* ****************************************
 *	Connect to database
 * **************************************** */

class DBConnection extends SQLite3 {
  function __construct() {
     $this->open(DB_DATABASE);
  }
}

$db = new DBConnection();

if(!$db) 
{
  echo $db->lastErrorMsg();
  header("Location: dbupdate.php?registration=dbfail");
  exit;
} 
