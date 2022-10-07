<?php
  include('db.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Delete Barangay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <?php
      $bID = $_GET['bID'];
      if($bID == null)
        {
        header("Location:brgy.php");
        }
       ?>
    <div class="container">
      <form method="post" action="deleteBarangay.php?bID=<?php echo $bID ?>">
          <h1> Are you sure? </h1>
          <input type="submit" name="deleteBarangay" class="btn btn-primary" style="width: 200px">
          <a href="brgy.php"> <button type="button" class="btn btn-primary"> Cancel </button></a>
      </form>
    </div>

    <?php
      if(isset($_POST['deleteBarangay'])){

        $sql2 = "DELETE FROM cases WHERE BarangayID = '$bID'";
        $result2 = $conn->query($sql2);

        $sql = "DELETE from barangays WHERE BarangayID = '$bID'";
          $result = $conn->query($sql);
          if($result == TRUE){
            header("Location:brgy.php");
          }else {
            echo $conn->error;
          }
      }
     ?>
  </body>
</html>
