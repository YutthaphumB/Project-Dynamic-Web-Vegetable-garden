    <?php
    session_start();
    
    if(!$_SESSION['user']){
        header('location:login.php');
    }
    require 'connection.php';
    try {
      //prepare
      $sql = "DELETE FROM creator_table WHERE id=?";
      $stmt = $conn->prepare($sql);
      //Bind
      $stmt->bindParam(1, $_GET["id"]); //กำหนดค่าให้กับตำแหน่ง ?

      if ($stmt->execute())    //เริ่มลบข้อมูล
        header("location: editCreator.php"); //กลับไปแสดงผลข้อมูล

    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    ?>
