<?php
session_start();
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

        div {
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
                        <a class="nav-link " href="creator.php">Creator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Edit</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <br>
        <h2 align="center">เข้าสู่ระบบจัดการข้อมูล</h2>
        <br>
    <!-- login -->
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col-9">
                <form method="POST">
                    <div class="form-group">
                        <label for="formGroupExampleInput">Username</label>
                        <input type="text" class="form-control" id="addInput1" placeholder="กรอก Username" name="user">
                    </div><br>
                    <div class="form-group">
                        <label for="formGroupExampleInput2">Password</label>
                        <input type="password" class="form-control" id="addInput2" placeholder="กรอก password" name="pass">
                    </div>
                    <br>
                    <button type="submit" name='submit' class="btn btn-primary">เข้าสู่ระบบ</button>
                </form>
            </div>
            <div class="col">

            </div>
        </div>
    </div>

    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
<?php

include 'connection.php';
function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

if (isset($_POST['submit'])) {
    $username = trim($_POST['user']);
    $password = trim($_POST['pass']);
    if ($username != "" && $password != "") {
        try {
            $query = "select * from admin_table where user=:username and pass=:password";
            $stmt = $conn->prepare($query);
            $stmt->bindParam('username', $username, PDO::PARAM_STR);
            $stmt->bindValue('password', $password, PDO::PARAM_STR);
            $stmt->execute();
            $count = $stmt->rowCount();
            $row   = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($count == 1 && !empty($row)) {
                /******************** Your code ***********************/
                phpAlert("login สำเร็จ");
                $_SESSION = $row;
                echo '<script type="text/javascript" language="JavaScript">window.location.href="editVegetable.php"; </script>';
            } else {
                phpAlert("user หรือ password ไม่ถูกต้อง");
            }
        } catch (PDOException $e) {
            echo "Error : " . $e->getMessage();
        }
    } else {
        phpAlert("กรอก user และ รหัสผ่าน");
    }
}
?>