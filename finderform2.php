<?php
require 'db-conn.php';
include 'header.php';

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
  
    // Validate student_staff_id
    if (!preg_match('/^\d{7}$/', $student_staff_id)) {
        $errors[] = "Student/Staff ID must be a 7 digit number.";

        // Show pop-up message
        //echo "<script>alert('Please enter a valid Student/Staff ID (7 digits).');</script>";
    }

    // Check for errors
    if (count($errors) > 0) {
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    } else {
        // Set up database connection
        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);

        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }

        // Prepare and bind SQL statement
        $stmt = $db->prepare("INSERT INTO found_table (first_name, last_name, student_staff_id, email, phone_number, location, item_name, item_type, item_color, item_description, date_found) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssissssssss", $first_name, $last_name, $student_staff_id, $email, $phone_number, $location, $item_name, $item_type, $item_color, $item_description, $date_found);

        // Execute SQL statement
        if ($stmt->execute() === TRUE) {
            echo "<p>New record created successfully</p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
        $db->close();
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
</head>

<body>
    <main id="form">
        <section>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="on" method="post">
                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" /><br><br>

                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" /><br><br>

                <label for="ID">Student/Staff ID:</label>
                <input type="text" id="ID" name="ID" /><br><br>

                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" /><br>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" /><br><br>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location" /><br><br>

                <label for="itemname">Item Name:</label>
                <input type="text" id="itemname" name="itemname" /><br><br>

                <label for="itemtype">Item Type:</label>
                <input type="text" id="itemtype" name="itemtype" /><br><br>

                <label for="itemcolour">Item Colour:</label>
                <input type="text" id="itemcolour" name="itemcolour" /><br><br>

                <label for="itemdescription">Item Description:</label>
                <textarea id="itemdescription" name="itemdescription"></textarea><br><br>

                <label for="date">Date Found:</label>
                <input type="date" id="date" name="date" min="<?php echo date('Y-m-d', strtotime('-1 month')); ?>" max="<?php echo date('Y-m-d'); ?>"> /><br><br>

                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </form>

            <?php
            // Execute SQL statement
            if ($stmt->execute() === TRUE) {
                echo "New record created successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
            $conn->close();
            ?>
        </section>
    </main>



    <footer>
        <?php
        $db->close();
        readfile('footer.php');
        ?>
    </footer>