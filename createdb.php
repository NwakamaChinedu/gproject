<?php
require 'db-conn.php';

$createdb = ("CREATE TABLE Persons (
    Personid int NOT NULL AUTO_INCREMENT,
    LastName varchar(255) NOT NULL,
    FirstName varchar(255),
    City varchar(255),
    Age int,
    PRIMARY KEY (Personid) )"
);

$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

// This creates a table named "People" in stagegb database which is part of the connection string 'db-conn.php'
// add ID, firstname, lastname, add, and city to the table

$db->query($createdb);

$db->close();

echo 'Database Table created succescfully \n <br/>';



?>
