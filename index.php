<?php
//used to track logged in users
session_start();
readfile('header.php');
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
  <!--please do not connect any style sheet again change only inline -->

  <meta http-equiv="X-UA-Compatible" content="width=device;charset=UTF-8">
  <title>Home page</title>

</head>

<style>
  .card-body {
    background-color: #7A1B83;
  }

  .card-text {
    color: white;
    font-family: "Courier New", Courier, monospace;
    font-size: 14px;
  }

  .cb1 {
    color: white;
  }

  .cb2 {
    color: white;
  }

  .cb3 {
    color: white;
  }
</style>


<body>
  <div class="container text-center"><img src="Images/Home1.jpeg" class="backgroundimg img-fluid" alt="Responsive image"></div>

  <div class="container text-center ">
    <h1 class="title text-center py-4"></h1>
    <div class="row row-cols-1 row-cols-sm-2  row-cols-md-3">

      <div class="col-xs-12- sm-4-d-flex justify-content-center">
        <div class="card m-3 cb1 text-center">
          <div class="card-body">
            <span class="card-number "></span>

            <h2 class="card-title mb-4 fw-bold">Lost Item</h2>

            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="login.php" class="btn btn-light">Login</a>
          </div>
        </div>
      </div>


      <div class="col-xs-12-sm-4-d-flex justify-content-center">
        <div class="card m-3 cb2 text-center">

          <div class="card-body">
            <span class="card-number fw-bold"></span>

            <h2 class="card-title mb-4 fw-bold">Found Item</h2>

            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="finderform.php" class="btn btn-light">Report</a>
          </div>
        </div>
      </div>



      <div class="col- sm-4-d-flex justify-content-center">
        <div class="card m-3 cb3 text-center">

          <div class="card-body">
            <span class="card-number fw-bold"></span>

            <h2 class="card-title mb-4 fw-bold">Admin</h2>

            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="admin.php" class="btn btn-light">Login</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="./bootstrap/js/js.min.js"></script>
  <script src="./bootstrap/js/popper.min.js"></script>
  <script src="./bootstrap/js/bootstrap.js"></script>

</body>

</html>

<?php
readfile('footer.php');
?>