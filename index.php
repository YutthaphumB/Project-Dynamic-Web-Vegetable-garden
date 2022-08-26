<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bansuan Vegetable</title>
  <link rel="icon" href="images/logo3.png" type="image/x-icon" />
  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@100;300&display=swap" rel="stylesheet" />
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    p {
      font-family: "Kanit", sans-serif;
    }

    h4 {
      font-family: "Kanit", sans-serif;
    }
  </style>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>

<body>
  <div class="view" style="
        background-image: url('images/environment-green-watercolor-background-with-leaf-border-illustration.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center center;
      ">
    <!-- Navigation-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.html">
          <img src="images/logo2.png" height="50" alt="logo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav m-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="vegetable.php">Vegetable</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="objective.php">Objective</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="taget_audience.php">Target Audience</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="creator.php">Creator</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="login.php">Edit</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- ภาพเลื่อน -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="images/sl3.png" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="images/sl2.png" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="images/sl4.png" class="d-block w-100" alt="..." />
        </div>
        <div class="carousel-item">
          <img src="images/sl1.png" class="d-block w-100" alt="..." />
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- ข้อมูลส่วนหัวผัก -->
    <?php
    include "connection.php";
    try {
      $id = 'home';
      $sql = "SELECT * FROM info_table  WHERE title=?";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(1, $id);
      $stmt->execute();
      $data = $stmt->fetch();
    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    ?>
    <br />
    <div class="container">
      <div class="row">
        <div class="col"></div>
        <div class="col-9" style="background-color: #f6fff9">
          <h4 align="center"><?php echo $data['head'] ?></h4>
          <p>
          <?php echo $data['info'] ?>
          </p>
        </div>
        <div class="col"></div>
      </div>
    </div>
  </div>
  <!-- ส่วนท้าย -->
  <footer class="text p-5" style="background-color: #e7e7e7">
    <div class="container">
      <div class="row">
        <div class="col">
          <img src="images/logo2.png" height="80" alt="" />
          Copyright &copy; Bansuan Vegetable
        </div>
        <div class="col"></div>
        <div class="col">
          <p>
            <strong>เกี่ยวกับเรา</strong> <br />
            มหาวิทยาลัยราชภัฏสวนสุนันทา สาขาวิทยาการคอมพิวเตอร์ <br />
            ให้ความรู้เกี่ยวกับผักสวนครัวที่เรามี ชื่อทางพฤกษศาสตร์
            ประวัติความเป็นมา วิธีปลูกและรักษา รวมทั้งประโชยน์
          </p>
        </div>
      </div>
    </div>
  </footer>
</body>

</html>