<!DOCTYPE html>
<html>

<?php
include('header.php');
require_once "db-conn.php";
error_reporting(E_ALL);
?>


<head>
    <title>Content Management Website</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Trainings</title>
</head>

<?php

$firstname = $lastName = $email = $id = $password = $hashed_password =  $is_Admin = $phone = "";

if (isset($_POST['submit'])) {
    $ok = true;

    if (!isset($_POST['lastName']) || $_POST['lastName'] === '') {
        $ok = false;
        echo "Please enter your Lastname";
    } else {
        $lastName = $_POST['lastName'];
    };

    if (!isset($_POST['firstname']) || $_POST['firstname'] === '') {
        $ok = false;
        echo "please enter your Firstname";
    } else {
        $firstName = $_POST['firstname'];
    };

    if (!isset($_POST['email']) || $_POST['email'] === '') {
        $ok = false;
        echo "please enter email address";
    } else {
        $email = $_POST['email'];
    };

    if (!isset($_POST['password']) || $_POST['password'] === '') {
        $ok = false;
        echo "please enter the data here";
    } else {
        $password = $_POST['password'];
    };

    if (!isset($_POST['is_Admin']) || $_POST['is_Admin'] === '') {
        $ok = false;
        echo "please enter is Admin";
    } else {
        $is_Admin = $_POST['is_Admin'];
    };

    if ($ok) {
        // secure way to sanitise database code here
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
        $sql = sprintf("INSERT INTO users (firstName, lastName, email, id, hashed_password, is_Admin, phone) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
            $db->real_escape_string($firstName),
            $db->real_escape_string($lastName),
            $db->real_escape_string($email),
            $db->real_escape_string($id),
            $db->real_escape_string($hashed_password),            
            $db->real_escape_string($is_Admin),
            $db->real_escape_string($phone)
        );
        $db->query($sql);
        echo '<p >User added.</p>';
        $db->close();
        $firstname = $lastName = $email = $id = $password = $hashed_password =  $is_Admin = $phone = "";
    } else {
        echo "There is an error somewhere";
    };
}

?>

<body style="color:blue;">
    <!-- test database access with the code below -->

    <div class="page-content">
        <h1>Welcome to our Items Missing App Pace holder </h1>
        <h3>This is not part of the project's page</h3><br><br>
        <!-- PHP code to retrieve and display content from the database -->
        <?php
        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
        $sql = 'SELECT firstName, lastName, email, is_Admin FROM users';
        $result =  mysqli_query($db, "SELECT firstName, lastName, email, is_Admin FROM users");

        $all_property = array();
        //declare an array for saving property

        //showing property
        echo '<table class="data-table"   border="20" >
        <tr class="data-heading">';  //initialize table tag
        while ($property = mysqli_fetch_field($result)) {
            echo '<td>' . " " .  $property->name . "  " . "  " . '</td>';  //get field name for header
            $all_property[] = $property->name;  //save those to array
        }
        echo '</tr>'; //end tr tag

        //showing all data
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            foreach ($all_property as $item) {
                echo '<td>' . $row[$item] . '</td>'; //get items using property value
            }
            echo '</tr>';
        }
        echo "</table>";
        ?><br>
    </div><br>



    <div class="page-content">
        <h1>Welcome to our Items Missing App Pace holder </h1>
        <h3>This is not part of the project's page... we only add admin on this page</h3><br><br>
        <!-- PHP code to retrieve and display content from the database -->
    </div><br>

    <main>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

            <div class="form-group">
                <label for="firstname">FirstName: </label>
                <input type="text" class="form-control" name="firstname" placeholder="First Name" id="firstname" value="<?php echo htmlspecialchars($firstname, ENT_QUOTES); ?>" >
            </div><br>

            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" name="lastName" placeholder="Surname" id="lastName" value="<?php echo htmlspecialchars($lastName, ENT_QUOTES); ?>" >
            </div>

            <div class="form-group">
                <label for="email">email: </label>
                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required class="form-control" name="email" id="email" placeholder="somebody@example.co" value="<?php echo htmlspecialchars($email, ENT_QUOTES); ?>" >
            </div><br>

            <div class="form-group">
                <label for="phone">Phone no: </label>
                <input type="phone" class="form-control" name="phone" id="phone" value="<?php echo htmlspecialchars($phone, ENT_QUOTES); ?>" >
            </div><br>

            </div>
            <div class="form-group">
                <label for="id">Student/Staff ID: </label>
                <input type="text" class="form-control" name="id" id="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES); ?>"  >
            </div><br>

            <div class="form-group">
                <label for="password">password: </label>
                <input type="password" class="form-control" name="password" id="password" value="<?php echo htmlspecialchars($password, ENT_QUOTES); ?>" >
            </div><br>


            <!--Dont use this field for normal user signup because of Admin. users can't signup as admin -->
            <div class="form-group">
                <label for="is_Admin">Is_Admin: </label>
                <input type="text" class="form-control" name="is_Admin" id="is_Admin" value="<?php echo htmlspecialchars($is_Admin, ENT_QUOTES); ?>" >
            </div><br>

            <input type="submit" name="submit" class="btn btn-primary" >
        </form>
    </main><br>


    <?php
    readfile('footer.php');
    ?>
</body><br>

</html>