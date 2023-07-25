<!DOCTYPE html>
<html>

<?php

require_once "db-conn.php";
error_reporting(E_ALL);
?>


<head>
    <title>Content Management Website</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Register New User</title>

</head>

<body class="signin-body">



    <?php

    $firstname = $lastName = $email = $id = $password = $hashed_password = $phone = "";


    if (isset($_POST['submit'])) {
        $ok = true;

        if (!isset($_POST['lastName']) || $_POST['lastName'] === '') {
            $ok = false;
            echo '<p style="color:black" >Please enter your Lastname"</p>';
        } else {
            $lastName = $_POST['lastName'];
        };

        if (!isset($_POST['firstname']) || $_POST['firstname'] === '') {
            $ok = false;
            echo '<p style="color:black"> please enter your Firstname"</p>';
        } else {
            $firstName = $_POST['firstname'];
        };

        if (!isset($_POST['email']) || $_POST['email'] === '') {
            $ok = false;
            echo '<p style="color:black"> please enter email address"</p>';
        } else {
            $email = $_POST['email'];
        };

        if (!isset($_POST['password']) || $_POST['password'] === '') {
            $ok = false;
            echo '<p style="color:black"> please enter your prefered password "</p>';
        } else {
            $password = $_POST['password'];
        };
        $id = $_POST["id"];
        $phone = $_POST["phone"];
        $is_Admin = 0;

        if ($ok) {
            // make sure to store password in hashes
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $db = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DATABASE);
            $sql = sprintf(
                "INSERT INTO users (firstName, lastName, email, id, hashed_password, is_Admin, phone) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",
                $db->real_escape_string($firstName),
                $db->real_escape_string($lastName),
                $db->real_escape_string($email),
                $db->real_escape_string($id),
                $db->real_escape_string($hashed_password),
                $db->real_escape_string($is_Admin),
                $db->real_escape_string($phone)
            );
            $db->query($sql);
            // This is in the PHP file and sends a Javascript alert to the client
            echo "<p>User registration succesful.👍</p>";
            header("location: login.php");
            $db->close();
            $firstname = $lastName = $email = $id = $password = $hashed_password =  $is_Admin = $phone = "";
        } else {
            echo "There is an error somewhere ";
        };
    }

    ?>
    <style>
        .btn2 {
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
            padding: 10px 15px;
            width: 50%;
            border-radius: 5px;
            border: 0;
            background-color: #8e44ad !important;
        }

        .signin-body {
            background: url(Images/questions\ resized.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .signin-form {
            width: 350px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            position: absolute;
            color: #fff;

        }

        * {
            padding: 0;
            margin: 0;
            font-family: sans-serif;
        }

        .signin-form h1 {
            font-size: 40px;
            color: purple;
            text-align: center;
            text-transform: uppercase;
            margin: 40px 0;
        }

        .signin-form label {
            font-size: 20px;
            margin: 15px;
        }

        .signin-form input {
            font-size: 16px;
            width: 100%;
            padding: 15px 10px;
            border: 0;
            outline: none;
            border-radius: 5px;
        }

        .signin-form button {
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
            padding: 10px 15px;
            width: 50%;
            border-radius: 5px;
            border: 0;

        }

        .form-group {}
    </style>
    <div class="signin-form">
        <h1>sign in</h1>



        <main class="form-control-sm form-group row">
            <form class="form-body" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                <div class="form-group">
                    <label for="firstname">FirstName: </label>
                    <input type="text" class="form-control" name="firstname" placeholder="Enter your first name" id="firstname" value="<?php echo htmlspecialchars($firstname, ENT_QUOTES); ?>">
                </div><br>

                <div class="form-group">
                    <label for="lastName">Last Name</label>
                    <input type="text" class="form-control" name="lastName" placeholder="Surname" id="Enter your last name" value="<?php echo htmlspecialchars($lastName, ENT_QUOTES); ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email: </label>
                    <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required class="form-control" name="email" id="email" placeholder="Enter your email" value="<?php echo htmlspecialchars($email, ENT_QUOTES); ?>">
                </div><br>

                <div class="form-group">
                    <label for="phone ">Phone no: </label>
                    <input type="phone" class="form-control" placeholder="Enter your mobile no." name="phone" id="phone" value="<?php echo htmlspecialchars($phone, ENT_QUOTES); ?>">
                </div><br>


                <div class="form-group">
                    <label for="id">Student/Staff ID: </label>
                    <input type="text" placeholder="Enter your ID no." class="form-control" name="id" id="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES); ?>">
                </div><br>

                <div class="form-group">
                    <label for="password">password: </label>
                    <input type="password" class="form-control" placeholder="Enter your password" name="password" id="password" value="<?php echo htmlspecialchars($password, ENT_QUOTES); ?>">
                </div><br>

                <input type="submit" name="submit" class="btn2 btn-warning form-group">
            </form>
    </div>
    </main><br>



</body><br>

</html>