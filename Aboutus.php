<!DOCTYPE html>
<html lang="en">
<?php
session_start();

readfile('header.php');
?>

<head>
  <meta charset="UTF-8">
  <title>About Us</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: center;  
      margin: 0px 0;  
    }

    .title {
      font-size: 1rem;
      background-image: url("path/to/your/image.jpg");
      background-size: cover;
      color: white;
    }

    .card {
      width: 200px;
      height: 300px;
      margin: 10px;
      perspective: 1000px;
    }

    .card:hover .card-inner {
      transform: rotateY(180deg);
    }

    .card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      transition: transform 0.6s;
      transform-style: preserve-3d;
    }

    .card-front,
    .card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
    }

    .card-front {
      background-color: #f2f2f2;
      color: #333;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 10px;
      font: size 0.5rem;
      ;
      font-weight: bold;
      text-align: center;
      margin-bottom: 0.5rem;
      border-radius: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .card-back {
      background-color: purple;
      color: purple;
      transform: rotateY(180deg);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 1px;
      border-radius: 10px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .card-image {
      width: 100px;
      height: 400px;
      border-radius: 50%;
      overflow: hidden;
      margin-bottom: 20px;
    }

    .card-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    h1 {
      font-size: 28px;
      text-align: center;
    }

    .card .card-inner .card-back p {
      position: absolute;
      bottom: 10px;
      left: 0;
      right: 0;
      font-size: 0.5rem;
      text-align: center;
    }

    .card .card-inner .card-front h2,
    .card .card-inner .card-back h2 {
      font-size: 1rem;
      margin-top: 5px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Meet the Team</h1>
    <div class="card-container">
      <div class="card">
        <div class="card-inner">
          <div class="card-front">
            <div class="card-image">
              <img src=".\Images\unnamed (4).jpg" alt="Chief">
            </div>
            <h2>Unwana Essien</h2>
            <p>Back-End Solutions Engineer</p>
          </div>
          <div class="card-back">
            <div class="card-inner">
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-inner">
          <div class="card-front">
            <div class="card-image">
              <img src=".\Images\unnamed.jpg" alt="Bestbess">
            </div>
            <h2>Uzamere Bessie O.</h2>
            <p>Front-End Design Specialist</p>
          </div>
          <div class="card-back">
            <div class="card-inner">
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-inner">
          <div class="card-front">
            <div class="card-image">
              <img src=".\Images\PHOTO-2023-03-01-18-50-38.jpg" alt="Kikelomobalo">
            </div>
            <h2>Balogun Olajumoke O.</h2>
            <p>Presentation and Demo Specialist</p>
          </div>
          <div class="card-back">
            <div class="card-inner">
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-inner">
          <div class="card-front">
            <div class="card-image">
              <img src=".\Images\unnamed (1).jpg" alt="Chinedu">
            </div>
            <h2>Nwakama Ephraim C.</h2>
            <p>Database Security Administrator</p>
          </div>
          <div class="card-back">
            <div class="card-inner">
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-inner">
          <div class="card-front">
            <div class="card-image">
              <img src=".\Images\unnamed (2).jpg" alt="Cyberlante">
            </div>
            <h2>Eluwah Daniel</h2>
            <p>Documentation and Compliance Specialist</p>
          </div>
          <div class="card-back">
            <div class="card-inner">
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-inner">
          <div class="card-front">
            <div class="card-image">
              <img src=".\Images\unnamed (3).jpg" alt="Person 6">
            </div>
            <h2>Adejimi Blessing T.</h2>
            <p>User Acceptance Testing Coordinator</p>
          </div>
          <div class="card-back">
            <div class="card-inner">
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-inner">
          <div class="card-front">
            <div class="card-image">
              <img src=".\Images\unnamed (5).jpg" alt="Tee">
            </div>
            <h2>Ojumu Taiwo</h2>
            <p>Documentation Process Manager</p>
          </div>
          <div class="card-back">
            <div class="card-inner">
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-inner">
          <div class="card-front">
            <div class="card-image">
              <img src=".\Images\unnamed (6).jpg" alt="Solid">
            </div>
            <h2>Akinola Solomon</h2>
            <p>Database Security Administrator</p>
          </div>
          <div class="card-back">
            <div class="card-inner">
            </div>
          </div>
        </div>
      </div>

      <!-- jQuery -->
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <!-- Bootstrap 5 JS -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>