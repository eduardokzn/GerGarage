<?php

/*****************************************
 * Author: Conor O'Reilly
 ***************************************** */

/*
 * Checks that the constant is defined this include
 * will only run if it recieves the defined constent
 */

defined('MY_INC_CODE') or die('Access to this file is restricted');

/* ****************************************
 *	CONFIGURATION
 * **************************************** */

/*
 * SQLite3 database
 */

define("DB_DATABASE", "./db/webdevdb");

/*
 * Application specific variables
 * Note: in pathnames forward slashes e.g. / , should be used
 */

define("VERSION_NUMBER", "1.0");
define("COMPANY_NAME", "WEBDEV");
define("APPLICATION_NAME", "WEBTECH EXAMPLES");
define("UPLOAD_PATH",  realpath(dirname(__FILE__)) . "/uploads/");

/* delibertly no closing php tag */