<?php
// initialize a session or read a session
session_start();

//check session data if user is logged on

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: logout.php");
    exit;
}

//load the database connection string
require_once "db-conn2.php";

//set the variables as empty initially.
$email = $password = $is_Admin =  "";
$emailerror = $passworderror = $loginerror = $is_Adminerror = "";
//check if the method is post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //sanitize email 
    if (empty(trim($_POST["email"]))) {
        $emailerror = "Please enter an email as a username.";
    } else {
        $email = trim($_POST["email"]);
    }
    //verify password field
    if (empty(trim($_POST["password"]))) {
        $passworderror = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }
    // if(empty(trim($_POST["role"]))){
    //     $is_Adminerror = "Please select a role buddy";
    // }

    if (empty($emailerror) && empty($passworderror)) {
        //check the database for the user credentials 
        $sql = "SELECT *  FROM users WHERE email = :email";
        if ($stmt = $pdo->prepare($sql)) {
            //I will attach the value :email to a parameter
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);

            //I will set the parameter below
            $param_email = trim($_POST["email"]);

            //since i have all the parameters, i'll execute the statement.
            if ($stmt->execute()) {
                //used the two echos below for debugging.
                //echo "prepare sql";
                if ($stmt->rowCount() == 1) {
                    //if a user exists retrieve the details and verify them.
                    //s  echo "found user";
                    if ($row = $stmt->fetch()) {
                        //retrieve the details from the row in the DB
                        $id = $row["id"];
                        $email = $row["email"];
                        $is_Admin = $row["is_Admin"];
                        $hashed_password = $row["hashed_password"];

                        if (password_verify($password, $hashed_password)) {
                            //the above code compares the password entered with the hashed one in DB
                            //if it's the same, store the following in a session.

                            // session_start(); session already started

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                            $_SESSION["is_Admin"] = $is_Admin;
                            //redirect the user to the homepage based on their roles. Knowledge of this gotten from w3schools.com
                            switch ($is_Admin) {
                                case "1":
                                    header("location: admin.php");
                                    break;

                                case "0":
                                    header("location: lostItem.php");
                            }
                        }
                        //if the credentials are wrong display an error
                        else {
                            $loginerror = "Invalid email or password.";
                        }
                    }
                }
                //if you cant find a user, echo the error below.
                else {
                    $loginerror = "this username does not exist.";
                }
            } else {
                echo "Login Failed. Contact Admin";
            }
            //now i'll close the statament
            unset($stmt);
        }
    }
    //close the connection. Phew!
    unset($pdo);
}

?>

<!--Bootstrap was used mostly to style this application-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    
    
    
    
</head>

<body class="login-body">
   <style>
    .login-body{
    background: url(Images/questions\ resized.jpg);
    background-repeat: no-repeat;
    background-size: cover ;
}

.login-form{
    width: 350px;
    top: 50%;
    left: 50%;
    transform: translate(-50% ,-50%);
    position: absolute;
    color:#fff;
}


*{
    padding:0;
    margin: 0;
    font-family: sans-serif;
}

.login-form h1{
    font-size: 40px;
    color: purple;
    text-align: center;
    text-transform: uppercase;
    margin: 40px 0;
}

.login-form  p{
 font-size: 20px;
 margin: 15px;
}
.login-form input{
    font-size: 16px;
    width:100%;
    padding:15px 10px;
    border:0;
    outline: none;
    border-radius: 5px;
}

     


.btn{
    font-size:18px;
    font-weight: bold;
    margin:20px 0;
    padding:10px 15px;
    width:50%;
    border-radius: 5px;
     border: 0;
     background-color: #8e44ad !important;
}
    

    





</style>
    

    <main class=" form-control-sm form-group row">
        
        <div class= "login-form">
            <h1> login page</h1>
            
            <?php if (!empty($loginerror)) {
                echo '<div class="alert alert-danger">' . $loginerror . '</div>';
            } ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="m-4">
                <div class="mt-5">
                    <input type="email" name="email" placeholder="Enter your email" class="form-control <?php echo (!empty($emailerror)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $emailerror; ?> </span>
                </div>
                <div class="mt-5">
                    <input type="password" name="password" placeholder="Enter your Password" class="form-control <?php echo (!empty($passworderror)) ? 'is-invalid' : ''; ?>">
                    <span class="invalid-feedback"><?php echo $passworderror; ?> </span>
                </div>
                <div class="mt-5">
                    <input type="submit" class="btn btn-lg bg-warning" value="Login">
                </div>
                <p class="text-right"><a href="password.php" class="password" style="color:purple">Forgot Password?</a></p><br>
                <P class="text-center mt-5" style="color:light">New User? <a href="signup.php" class="text-center mt-5 bw" style="color:purple">Register Now</a></P>
            </form>

        </div>

        </div>
    </main>



    <!--I will like to clearly state that the links below are javascript codes from bootstrap official site and are included as advised on getbootstrap.com. I claim no ownership-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</body>

<?php

?>

</html>