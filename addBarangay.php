<?php
  include('db.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Barangay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="/TESDA/logo.jpg">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <form class="form-inline">
        <a class="navbar-brand">
          <img src="logo.jpg" style="width:90px;" class="rounded-circle">
        </a>
        <h1 class="text-white"> ADD BARANGAY </h1>
      </form>
    </nav>

    <div class="container">
    <form method="post" action="addBarangay.php">
        <br/>
        <label>Barangay Name:</label>
        <input type="text" class="form-control" name="bName"> <br/>

        <label>Chairman:</label>
        <input type="text" class="form-control" name="bChairman"> <br/>

        <label>Contact:</label>
        <input type="text" class="form-control" name="bContact"> <br/>

        <label>District</label>
          <div class="form-check">
            <input type="radio" name="bDistrict" value="1" class="form-check-input"> 1 <br/>
          </div>

          <div class="form-check">
            <input type="radio" name="bDistrict" value="2" class="form-check-input"> 2 <br/><br/>
          </div>

        <input type="submit" name="addBarangay" class="btn btn-primary" style="width: 200px">
    </form>
    </div>

    <?php
      if(isset($_POST['addBarangay'])){
        $bName = $_POST["bName"];
        $bChairman = $_POST["bChairman"];
        $bContact = $_POST["bContact"];
        $bDistrict = $_POST["bDistrict"];
        $sql = "INSERT INTO barangays( BarangayName, BarangayChairman, BarangayContact, BarangayDistrict)
                VALUES ('$bName','$bChairman','$bContact','$bDistrict')";
                $result = $conn->query($sql);
                if($result == TRUE){
                  header("Location:brgy.php");
                }
                else {
                  echo "error";
                }
      }
     ?>

  </body>
</html>
