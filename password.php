<?php
// initialize a session or read a session
session_start();

//load the database connection string
require_once "db-conn2.php";

//set the variables as empty initially.
$email = "";
$emailerror = "";

//check if the method is post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate email input
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $email_error = "Please enter a valid email address.";
    }

    // Check if email exists in database
    $sql = "SELECT id FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email);
    $stmt->execute();
    $user_id = $stmt->fetchColumn();
    if (!$user_id) {
        $email_error = "No user found with that email address.";
    }

    if (!$email_error) {
        // Generate reset token
        $token = bin2hex(random_bytes(32));

        // Store token and expiry time in database
        $sql = "UPDATE users SET reset_token = :token, reset_token_expiry = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':token', password_hash($token, PASSWORD_DEFAULT));
        $stmt->bindValue(':user_id', $user_id);
        $stmt->execute();

        //send reset password email
        $to = $email;
        $subject = "Reset Your Password";
        $message = "Please click the following link to reset your password: http://groupg.cinemaxng.com/password.php?email=" . urlencode($email) . "&token=" . $token;
        $headers = "From: admin@groupg.cinemaxng.com/\r\n";
        $headers .= "Reply-To: admin@groupg.cinemaxng.com\r\n";
        $headers .= "Content-type: text/html\r\n";

        mail($to, $subject, $message, $headers);

        $emailsuccess = "Please check your email to reset your password.";
    } else {
        echo "Reset password failed. Contact Admin";
    }

    unset($stmt);
}


//close the connection
unset($pdo);

?>

<!--Bootstrap was used mostly to style this application-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/unsemantic-grid-responsive-tablet.">
</head>

<body>
    <?php
    include('header.php');
    ?>

    <main class="mt-5">
        <h1 class="text-center">Forgot Your Password?</h1>
        <div class="container cont mt-5">
            <?php if (!empty($emailsuccess)) {
                echo '<div class="alert alert-success">' . $emailsuccess . '</div>';
            } ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="m-4">
                <div class="mt-5">
                    <input type="email" name="email" class="form-control <?php echo (!empty($emailerror)) ? 'is-invalid' : ''; ?>" placeholder="Enter your email" value="<?php echo $email; ?>">
                    <span class="invalid-feedback"><?php echo $emailerror; ?></span>
                </div>
                <div class="mt-5">
                    <button type="submit" class="btn btn-primary">Reset Password</button>
                </div>
            </form>
        </div>
    </main>

    <?php
    include('footer.php');
    ?>

    <!-- jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-rhGkJnY0ab2QZCX0zvJfVHzxgTwJwA2W1AbotfUGquUivhqGS9T1hJXnX8jC7vnD" crossorigin="anonymous"></script>

</body>

</html>