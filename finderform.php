<?php
session_start();
include 'header.php';
require 'db-conn.php';
$db = "";
$uploadOk = 0;
$image = "/assets/uploads/no-image.png";
$first_name = $last_name = $student_staff_id = $email = $phone_number = $location = $item_name = $item_type = $item_color = $item_description = $date_found = $image = $target_file = $imageFileType = "";

// if (isset($_POST["submit"])) {

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // picture upload start
    $target_dir = "assets/uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $uploadOk = 1;

    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
    ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
            echo "image uploaded sucessfully";
            $uploadOk = "";
        } else {
            echo "Sorry, there was an error uploading your file.";
            $uploadOk = "";
        }
    }
}
// end of image upload 
$image = $target_file;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Initialize an array to hold any errors
    $errors = [];

    // Check if any of the fields are empty
    if (empty($_POST["fname"]) || empty($_POST["lname"]) || empty($_POST["ID"]) || empty($_POST["email"]) || empty($_POST["phone"]) || empty($_POST["location"]) || empty($_POST["itemname"]) || empty($_POST["itemtype"]) || empty($_POST["itemcolour"]) || empty($_POST["itemdescription"]) || empty($_POST["date"])) {
        $errors[] = "All fields are required.";

        // Show pop-up message
        echo "<script>alert('Please fill in all fields.');</script>";
    }


    // Sanitize and validate input
    $first_name = filter_var($_POST["fname"], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST["lname"], FILTER_SANITIZE_STRING);
    $student_staff_id = filter_var($_POST["ID"], FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $phone_number = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_INT);
    $location = filter_var($_POST["location"], FILTER_SANITIZE_STRING);
    $item_name = filter_var($_POST["itemname"], FILTER_SANITIZE_STRING);
    $item_type = filter_var($_POST["itemtype"], FILTER_SANITIZE_STRING);
    $item_color = filter_var($_POST["itemcolour"], FILTER_SANITIZE_STRING);
    $item_description = filter_var($_POST["itemdescription"], FILTER_SANITIZE_STRING);
    $date_found = filter_var($_POST["date"], FILTER_SANITIZE_STRING);
    $markCollected = 0;

    // Validate student_staff_id
    if (!preg_match('/^\d{7}$/', $student_staff_id)) {
        $errors[] = '<p style="color:black" >Student/Staff ID must be a 7 digit number.';

        // Show pop-up message
        echo "<script>alert('Please enter a valid Student/Staff ID (7 digits).');</script>";
    }

    // Check for errors
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo '<p style="color:black" ><p>Error: $error</p>';
        }
    } else {
        // Set up database connection
        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // Prepare and bind SQL statement
        $stmt = $db->prepare("INSERT INTO found_table (first_name, last_name, student_staff_id, email, phone_number, location, item_name, item_type, item_color, item_description, date_found, image, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssisssssssssi", $first_name, $last_name, $student_staff_id, $email, $phone_number, $location, $item_name, $item_type, $item_color, $item_description, $date_found, $image, $markCollected);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            echo '<p style="color:black">Form submitted successfully';
        } else {
            echo "Error: " . $stmt->error;
        }
        // $conn->close();
        $stmt->close();
        // empty the values variables
        $first_name = $last_name = $student_staff_id = $email = $phone_number = $location = $item_name = $item_type = $item_color = $item_description = $date_found = $image = "";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Finder's Data</title>
    <link rel="stylesheet" href="finderstyle.css">
    <link rel="stylesheet" href="unsemantic-grid-responsive-tablet.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>
<style>
    .btn1 {
        font-size: 18px;
        font-weight: bold;
        margin: 20px 0;
        padding: 10px 15px;
        width: 50%;
        border-radius: 5px;
        border: 0;
        background-color: #8e44ad !important;
        font-style: white;
        color: white;
    }

    .btn2 {
        font-size: 18px;
        font-weight: bold;
        margin: 20px 0;
        padding: 10px 15px;
        width: auto;
        border-radius: 5px;
        border: 0;
        background-color: #d63031 !important;
        font-style: white;
        color: white;
    }

    label {
        color: #000;
    }

    .offset-5 {
        color: #000;
    }
</style>

<body>
    <main id="form">
        <div class="container">
            <div class="row row-cols-lg-auto g-3 align-items-center g-recaptcha" data-sitekey="6LfkRo0lAAAAAKGoiv3yC1pciIYQdWyB9Va3iXLP">

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data" autocomplete="on" method="POST">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" value="<?php echo htmlspecialchars($first_name, ENT_QUOTES); ?>" /><br><br>

                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" value="<?php echo htmlspecialchars($last_name, ENT_QUOTES); ?>" /><br><br>

                    <label for="ID">Student/Staff ID:</label>
                    <input type="text" id="ID" name="ID" value="<?php echo htmlspecialchars($student_staff_id, ENT_QUOTES); ?>" /><br><br>

                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES); ?>" /><br><br>

                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone_number, ENT_QUOTES); ?>" /><br><br>

                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" value="<?php echo htmlspecialchars($location, ENT_QUOTES); ?>" /><br><br>

                    <label for="itemname">Item Name:</label>
                    <input type="text" id="itemname" name="itemname" value="<?php echo htmlspecialchars($item_name, ENT_QUOTES); ?>" /><br><br>

                    <label for="itemtype">Item Type:</label>
                    <input type="text" id="itemtype" name="itemtype" value="<?php echo htmlspecialchars($item_type, ENT_QUOTES); ?>" /><br><br>

                    <label for="itemcolour">Item Colour:</label>
                    <input type="text" id="itemcolour" name="itemcolour" value="<?php echo htmlspecialchars($item_color, ENT_QUOTES); ?>" /><br><br>

                    <label for="itemdescription">Item Description:</label>
                    <textarea id="itemdescription" value="<?php echo htmlspecialchars($item_description, ENT_QUOTES); ?>" name="itemdescription"> <?php echo htmlspecialchars($item_description, ENT_QUOTES); ?> </textarea><br><br>

                    <label for="date">Date Found:</label>
                    <input type="date" id="date" name="date" value="<?php echo htmlspecialchars($date_found, ENT_QUOTES); ?>" min="<?php echo date('Y-m-d', strtotime('-1 month')); ?>" max="<?php echo date('Y-m-d'); ?>"> <br><br><br>

                    <div class="form-group   input-group">
                        <label for="image">Select image to upload:</label>
                        <input class="input--style-1" type="file" class="form-control" name="image" id="image">
                    </div>

                    <!-- <input class="offset-4 btn1 btn-warning" type="submit" value="Submit"> -->

                    <div class="p-t-20">
                        <button class="btn btn--radius btn--green offset-4 btn1 btn-warning" type="submit">Submit</button>

                        <input class="btn2 btn-dark" type="reset" value="Reset">
                    </div>


                </form>


            </div>
        </div>
    </main>

    <script type="text/javascript">
        var onloadCallback = function() {
            alert("Click OK to verify that you are human!");
        };
    </script>
    
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>


    <?php

    readfile('footer.php');
    ?>