
    <?php
    session_start();
    
    if(!$_SESSION['user']){
        header('location:login.php');
    }
    require 'connection.php';

    try {
      //prepare
      $sql = "DELETE FROM vegetable_table WHERE key_id=?";
      $stmt = $conn->prepare($sql);
      //Bind
      $stmt->bindParam(1, $_GET["id"]); //กำหนดค่าให้กับตำแหน่ง ?

      if ($stmt->execute())    //เริ่มลบข้อมูล
        header("location: editVegetable.php"); //กลับไปแสดงผลข้อมูล

    } catch (PDOException $e) {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    ?>
