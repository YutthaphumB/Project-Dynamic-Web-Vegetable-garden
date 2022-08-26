<?php
session_start();

if(!$_SESSION['user']){
    header('location:login.php');
}

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
        div {
            font-family: "Kanit", sans-serif;
        }

        footer {
            background-color: #e7e7e7;
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
                            <a class="nav-link " aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="editVegetable.php">Edit Vegetable</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editCreator.php">Edit Creator</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="editInfo.php">Edit info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Log Out</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <h2 align="center">เพิ่มข้อมูลผัก</h2>
        <br>
        <div class="container">
            <div class="row">
                <div class="col">

                </div>
                <div class="col-9">
                    <form method="POST" enctype="multipart/form-data" style="background-color: #F8F8FF;">
                        <div class="form-group">
                            <label for="formGroupExampleInput">id</label>
                            <input type="text" class="form-control" placeholder="กรอก id" name="key_id">
                        </div><br>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">ชื่อ</label>
                            <input type="text" class="form-control" placeholder="กรอก ชื่อ" name="name">
                        </div><br>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">ชื่อพฤกษศาสตร์</label>
                            <input type="text" class="form-control" placeholder="กรอก ชื่อพฤกษศาสตร์" name="bota_name">
                        </div><br>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">วงศ์</label>
                            <input type="text" class="form-control" placeholder="กรอก วงศ์" name="family">
                        </div><br>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">ประวัติ</label>
                            <input type="text" class="form-control" placeholder="กรอก ประวัติ" name="history">
                        </div><br>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">ลักษณะโดยทั่วไป</label>
                            <input type="text" class="form-control" placeholder="กรอก ลักษณะโดยทั่วไป" name="nature">
                        </div><br>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">การปลูก</label>
                            <input type="text" class="form-control" placeholder="กรอก การปลูก" name="plan">
                        </div><br>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">ประโยชน์</label>
                            <input type="text" class="form-control" placeholder="กรอก ประโยชน์" name="benefit">
                        </div><br>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">รหัสการ์ด</label>
                            <input type="text" class="form-control" placeholder="กรอก รหัสการ์ด" name="id_card">
                        </div><br>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">รูปภาพ1</label><br>
                            <input type="file" class="form-control-file" name='img1'>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">รูปภาพ2</label><br>
                            <input type="file" class="form-control-file" name='img2'>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlFile1">รูปภาพ การ์ด</label><br>
                            <input type="file" class="form-control-file" name='img'>
                        </div>
                        <br>
                        <button type="submit" name='submit' class="btn btn-success">บันทึก</button>
                    </form>
                </div>
                <div class="col">

                </div>
            </div>
            <br>
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <a href="editVegetable.php"><button type="button" class="btn btn-primary">กลับสู่หน้าหลัก</button> </a>
                </div>
            </div>
        </div>



        <br>
        <!-- ส่วนท้าย -->
        <footer class="text p-5">
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

    </div>
</body>

</html>
<?php if (isset($_POST['submit'])) { 
    
    $dir1 = "images/ผัก/";
    $fileImg1 = $dir1 . basename($_FILES["img1"]["name"]);
    move_uploaded_file($_FILES["img1"]["tmp_name"], $fileImg1);
    
   
    $dir2 = "images/ผัก/";
    $fileImg2 = $dir2 . basename($_FILES["img2"]["name"]);
    move_uploaded_file($_FILES["img2"]["tmp_name"], $fileImg2);
    
    
    $dirc = "images/ตัดรูปผัก/";
    $fileImgc = $dirc . basename($_FILES["img"]["name"]);
    move_uploaded_file($_FILES["img"]["tmp_name"], $fileImgc);
}
?>



<?php

if (isset($_POST['submit'])) {
    $key_id =  $_POST['key_id'];
    $name = $_POST['name'];
    $bota_name = $_POST['bota_name'];
    $family = $_POST['family'];
    $history = $_POST['history'];
    $nature = $_POST['nature'];
    $plan = $_POST['plan'];
    $benefit = $_POST['benefit'];
    $id_card = $_POST['id_card'];
    function phpAlert($msg)
    {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
    if (empty($key_id) or empty($name) or empty($bota_name) or empty($family) or empty($history) or empty($id_card) or empty($nature) or empty($plan) or empty($benefit)) {
        phpAlert("กรอกข้อมูลไม่ครบ");
        exit();
    } else {
        //ไฟล์เชื่อมต่อฐานข้อมูล
        require 'connection.php';

        try {
            $stmt = $conn->prepare("INSERT INTO vegetable_table(key_id ,name,bota_name,family,history,nature,plan,benefit,id_card,img1,img2) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1, $key_id);
            $stmt->bindParam(2, $name);
            $stmt->bindParam(3, $bota_name);
            $stmt->bindParam(4, $family);
            $stmt->bindParam(5, $history);
            $stmt->bindParam(6, $nature);
            $stmt->bindParam(7, $plan);
            $stmt->bindParam(8, $benefit);
            $stmt->bindParam(9, $id_card);
            $stmt->bindParam(10, $fileImg1);
            $stmt->bindParam(11, $fileImg2);


            $stmt2 = $conn->prepare("INSERT INTO card_table(id_card,bota_name,family,img) VALUES(?,?,?,?)");
            $stmt2->bindParam(1, $id_card);
            $stmt2->bindParam(2, $bota_name);
            $stmt2->bindParam(3, $family);
            $stmt2->bindParam(4, $fileImgc);



            $stmt->execute();
            $stmt2->execute();
            phpAlert("บันทึกเรียบร้อย");
        } catch (PDOException $e) {
            phpAlert("Error: " . $e->getMessage());
        }
    }
}  //end if
$conn = null;
exit;
?>