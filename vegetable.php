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
    li {
      font-family: "Kanit", sans-serif;
    }

    a {
      font-family: "Kanit", sans-serif;
    }

    div {
      font-family: "Kanit", sans-serif;
    }

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

<body style="background-color: #f6fff9">
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
              <a class="nav-link" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="vegetable.php">Vegetable</a>
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
        <form class="form-inline" method="POST" action="search.php">
          <div class="row">
            <div class="col align-self-end">
              <input class="form-control mr-sm-2" type="text" placeholder="ค้นหาจากชื่อผัก" name="search">
            </div>
            <div class="col align-self-end">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit">ค้นหา</button>
            </div>
          </div>
        </form>
      </div>
    </nav>


    <br />
    <!-- เลือกผัก-->
    <!-- แถวบน -->
    <h2 align="center">ผักสวนครัว</h2>
    <br />
    <div class="container">
      <div class="row justify-content-md-center">
        <?php
        $sql = $conn->prepare("SELECT * FROM card_table");
        $sql->execute();
        $publisher = $sql->fetchAll(PDO::FETCH_ASSOC);
        foreach ($publisher as $sql) {
        ?>

          <div class="col-3">
            <div class="card">
              <img class="card-img-top" src="<?php echo $sql["img"] ?>" alt="Card image cap" />
              <div class="card-body">
                <p class="card-text">
                  <strong>ชื่อพฤกษศาสตร์ : </strong> <?php echo $sql["bota_name"] ?> <br />
                  <strong>วงศ์ : </strong> <?php echo $sql["family"] ?>
                </p>
              </div>
              <div class="card-footer text-muted text-center">
                <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#v<?php echo $sql["id_card"] ?>">รายละเอียดเพิ่มเติม</button>
              </div>
            </div>
          </div>

          &nbsp;&nbsp;&nbsp;

        <?php } ?>
      </div>
    </div>

    <br />

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


<?php
$sql = $conn->prepare("SELECT * FROM vegetable_table");
$sql->execute();
$publisher = $sql->fetchAll(PDO::FETCH_ASSOC);
foreach ($publisher as $sql) {
?>

  <div class="modal fade" id="v<?php echo $sql["id_card"] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?php echo $sql["name"] ?></h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <!-- รูปสไลด์ -->
          <div class="container">
            <div class="row">
              <div class="col-auto">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img src="<?php echo $sql["img1"] ?>" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                      <img src="<?php echo $sql["img2"] ?>" class="d-block w-100" alt="...">
                    </div>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <br>

          <strong>ชื่อพฤกษศาสตร์ : </strong><?php echo $sql["bota_name"] ?><br>
          <strong>วงศ์ : </strong> Malvaceae<br>
          <p>
            &nbsp;&nbsp;&nbsp;&nbsp;ประวัติ <?php echo $sql["family"] ?>
          </p>
          <p>
            &nbsp;&nbsp;&nbsp;&nbsp;ลักษณะโดยทั่วไป <?php echo $sql["history"] ?>
          </p>
          <p>
            &nbsp;&nbsp;&nbsp;&nbsp;การปลูก <?php echo $sql["plan"] ?>
          </p>
          &nbsp;&nbsp;&nbsp;&nbsp;ประโยชน์ <?php echo $sql["benefit"] ?>
        </div>
        <div class="modal-footer">
          <button class="btn btn-outline-success" data-bs-dismiss="modal">
            OK
          </button>
        </div>
      </div>
    </div>
  </div>
<?php } ?>