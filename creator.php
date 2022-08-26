<?php
include 'connection.php';
?>
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

    h5 {
      font-family: "Kanit", sans-serif;
    }
  </style>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
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
                        <a class="nav-link " aria-current="page" href="index.php">Home</a>
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
                        <a class="nav-link active" href="creator.php">Creator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="login.php">Edit</a>
                    </li>
        </ul>
      </div>
    </div>
  </nav>
  <br>
  <!-- ภาพ -->
  <div class="container">
    <div class="row justify-content-md-center">

      <?php
      $sql = $conn->prepare("SELECT * FROM creator_table");
      $sql->execute();
      $publisher = $sql->fetchAll(PDO::FETCH_ASSOC);
      foreach ($publisher as $sql) {
      ?>

        <div class="col-4">

          <div class="card">
            <img src="<?php echo $sql["img"] ?>" class="card-img-top" alt="..." />
            <div class="card-body">
              <h5 class="card-title"><strong><?php echo $sql["pre"] ?> <?php echo $sql["name"] ?> <?php echo $sql["lastname"] ?></strong></h5>
              <p class="card-text">
              <p>รหัสนักศึกษา : <?php echo $sql["id"] ?></p>
              <p><?php echo $sql["university"] ?></p>
              <p>คณะ : <?php echo $sql["group"] ?></p>
              <p>สาขา : <?php echo $sql["branch"] ?></p>
              </p>
            </div>
          </div>
        </div>


        &nbsp;&nbsp;&nbsp;

      <?php } ?>


    </div>
  </div>
  <br>
  <!-- ส่วนท้าย -->
  <footer class="text p-5" style="background-color: #e7e7e7">
    <div class="container">
      <div class="row">
        <div class="col">

          <img src="images/logo2.png" height="80" alt="">
          Copyright &copy; Bansuan Vegetable
        </div>
        <div class="col">

        </div>
        <div class="col">
          <p><strong>เกี่ยวกับเรา</strong> <br>
            มหาวิทยาลัยราชภัฏสวนสุนันทา สาขาวิทยาการคอมพิวเตอร์ <br>
            ให้ความรู้เกี่ยวกับผักสวนครัวที่เรามี ชื่อทางพฤกษศาสตร์ ประวัติความเป็นมา
            วิธีปลูกและรักษา รวมทั้งประโชยน์</p>
        </div>
      </div>
    </div>
  </footer>
  </body>

</html>