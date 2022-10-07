<?php
    include('db.php');
 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Edit Barangay</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="/TESDA/logo.jpg">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <?php
     $bID = $_GET['bID'];
     if($bID == null)
     {
       header('Location: brgy.php');
     }
       $sqlBarangay = "SELECT * FROM barangays WHERE BarangayID = '$bID'";
       $resultBarangay = $conn->query($sqlBarangay);
       $data = mysqli_fetch_assoc($resultBarangay);

     ?>
    <div class="container">
    <form method="post" action="editBarangay.php?bID=<?php echo $bID ?>">
        <br/>
        <label>Barangay Name:</label>
        <input type="text" value="<?php echo $data['BarangayName']; ?>" class="form-control" name="bName"> <br/>

        <label>Chairman:</label>
        <input type="text" value="<?php echo $data['BarangayChairman']; ?>" class="form-control" name="bChairman"> <br/>


        <label>Contact:</label>
        <input type="text" value="<?php echo $data['BarangayContact']; ?>" class="form-control" name="bContact"> <br/>

        <label>District</label>
          <div class="form-check">
            <input type="radio" name="bDistrict" value="1" class="form-check-input" checked = "true"> 1 <br/>
          </div>

          <div class="form-check">
            <input type="radio" name="bDistrict" value="2" class="form-check-input"> 2 <br/><br/>
          </div>

        <input type="submit" name="editBarangay" class="btn btn-primary" style="width: 200px">
    </form>
    </div>

    <?php
      if(isset($_POST['editBarangay'])){
        $bName = $_POST['bName'];
        $bChairman = $_POST['bChairman'];
        $bContact = $_POST['bContact'];
        $bDistrict = $_POST['bDistrict'];
        $sql = "UPDATE barangays SET BarangayName = '$bName', BarangayChairman = '$bChairman',
         BarangayContact = '$bContact', BarangayDistrict = '$bDistrict'
         WHERE BarangayID = '$bID'";
                $result = $conn->query($sql);
                if($result == TRUE){
                  header("Location:brgy.php");
                }
                else {
                  echo $conn->error;
                }
      }
     ?>

  </body>
</html>
