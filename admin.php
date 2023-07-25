<?php
session_start();

require 'db-conn.php';
readfile('header.php');

//enable page security to use authentication
if (!isset($_SESSION["loggedin"]) || $_SESSION["is_Admin"] !== "1") {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Content Management Website</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- do not remove this script link below  -->
    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Admin Dashboard</title>
    <!-- Load the JavaScript which set up the event handler, etc. -->
    <script src="usingAjax.js"></script>
</head>
<br>
<body style="color:blue;" class="container">
    <div class="page-content container">
        <h1>Welcome to the Missing item App Admin Dashboard </h1>
        <p><a href="logout.php" class="btn btn-info btn-lg">
                <span class="glyphicon glyphicon-log-out"></span> Log out</a>
        </p>
        <h1>Missing items Found: </h1>
        <section>
            <!-- A simple input text field for entering a keyword for the search.
                Notice that the button is not a "submit" button, and there is NO form.
                The button is simply used to invoke the JavaScript function which refreshes the table.
            -->
            <input id="keyword" size="20" placeholder="Search for an item name here">
            <button id="searchButton">Search</button>
        </section>

        <table id="losttable" class="table container">
            <thead class="thead-light">
                <tr class="thead-light">
                    <th>ID</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>student_staff_id</th>
                    <th>email</th>
                    <th>location</th>
                    <th>Item Name</th>
                    <th>Item Type</th>
                    <th>Item Color</th>
                    <th>Description</th>
                    <th>Date Found</th>
                    <th>Image</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div><br><br>



    <div class="page-content container ">
        <h1>Missing items reported: </h1>
        <!-- PHP code to retrieve and display content from the database -->
        <?php
        $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
        // $sql = 'SELECT * FROM lost_tb ORDER BY UID DESC";';
        // $result =  mysqli_query($db, "SELECT * FROM lost_tb ORDER BY UID DESC");

        // implement search conditions
        if (isset($_POST['search_term'])) {
            $searchTerm =  $_POST['search_term'];
            $sql = "SELECT * FROM lost_tb WHERE item_name LIKE '%$searchTerm%' OR location LIKE '%$searchTerm%'  OR item_type LIKE '%$searchTerm%' OR date_lost LIKE '%$searchTerm%' OR item_color LIKE '%$searchTerm%' OR first_name LIKE '%$searchTerm%' OR last_name LIKE '%$searchTerm%'  ORDER BY UID DESC ";
        } else {
            $searchTerm =  "";
            $sql = "SELECT * FROM lost_tb ORDER BY UID DESC ";
        }
        // Output the content in grid style
        $result =  mysqli_query($db, $sql);
        $all_property = array();
        //declare an array for saving property
        ?>
        <form method="post" action="">
            <input type="text" name="search_term" placeholder="Search...">
            <button type="submit">Search</button>
        </form>

        <?php
        //showing property
        echo '<table  class="table container" border=20 >
        <tr class="data-heading" class="table">';  //initialize table tag
        while ($property = mysqli_fetch_field($result)) {
            echo '<td>' . " " .  $property->name . "  " . "  " . '</td>';  //get field name for header
            $all_property[] = $property->name;  //save those to array
        }
        echo '</tr>'; //end tr tag

        //showing all data
        while ($row = mysqli_fetch_array($result)) {
            echo '<tr class="table">';
            foreach ($all_property as $item) {
                echo '<td>' . $row[$item] . '</td>'; //get items using property value
            }
            echo '</tr>';
        }
        echo '</table>';
        ?><br>
    </div><br>
</body><br>


<?php
$db->close();
readfile('footer.php');
?>

</html>