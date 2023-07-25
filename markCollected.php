<?php
session_start();

//enable page security to use authentication
if (!isset($_SESSION["loggedin"]) || $_SESSION["is_Admin"] !== "1") {
    header("location: login.php");
}

// Check if the ID parameter exists in the POST request
if (!isset($_POST['id'])) {
    // If not, return an error response
    header('Content-Type: application/json');
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
    exit;
}

$id = $_POST['id'];
// $username = $_SESSION['username'];
$role = $_SESSION['is_Admin'];

include_once 'db-conn2.php';
include_once 'db_var.php';
include_once 'db-conn.php';
$msg;

$db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the connection was successful
if (!$db) {
    // If not, return an error response
    header('Content-Type: application/json');
    echo json_encode(array('success' => false, 'message' => 'Connection failed'));
    exit;
}

// Update the status of the found item with the given ID to 1
$sql = "UPDATE found_table SET status = 1 WHERE id = '$id'";

if (mysqli_query($db, $sql)) {
    // If the query was successful, return a success response
    header('Content-Type: application/json');
    echo json_encode(array('success' => true));
} else {
    // If the query failed, return an error response
    header('Content-Type: application/json');
    echo json_encode(array('success' => false, 'message' => 'Failed to update status'));
}

// Close the database connection
mysqli_close($db);

$db->close();
$_SESSION["collected"] = $msg;
if (isset($_SESSION['redirect_url'])) {
    $redirect_url = $_SESSION['redirect_url'];
} else {
    header('Location: admin.php');
}
