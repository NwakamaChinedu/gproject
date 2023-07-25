<?php
/* This page will help create a connection to the database using PDO */
/*Database Credentials go below here*/
define('DB_SERVER', 'group-g-database.cccdhar8ekox.eu-north-1.rds.amazonaws.com');
define('DB_USERNAME', 'grpGstage');
define('DB_PASSWORD', 'XZ4C7zebQi_TZjC');
define('DB_NAME', 'stagedb');
/*Connect to Database*/
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    //Set the PDO error mode to exception
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){
    die("ERROR:Could not connect. " . $e->getMessage());
}
?>



<?php
  define('MYSQL_HOST', 'group-g-database.cccdhar8ekox.eu-north-1.rds.amazonaws.com');
  define('MYSQL_USER', 'grpGstage');
  define('MYSQL_PASSWORD', 'XZ4C7zebQi_TZjC');
  define('MYSQL_DATABASE', 'stagedb');
?>