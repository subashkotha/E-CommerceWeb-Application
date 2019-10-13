<?php

 
 error_reporting( ~E_DEPRECATED & ~E_NOTICE );
 
 
 define('DBHOST', 'localhost');
 define('DBUSER', 'subash');
 define('DBPASS', 'Subash@11');
 define('DBNAME', 'friends');
 
 $conn = mysql_connect(DBHOST,DBUSER,DBPASS);
 $dbcon = mysql_select_db(DBNAME);
 
 if ( !$conn ) {
  die("Connection failed : " . mysql_error());
 }
 
 if ( !$dbcon ) {
  die("Database Connection failed : " . mysql_error());
 }