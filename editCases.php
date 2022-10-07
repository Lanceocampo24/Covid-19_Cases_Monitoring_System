<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Edit Cases</title>
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
      $cID = $_GET['cID'];
      if($cID == null)
        {
        header("Location:cases.php");
        }

        include('db.php');
        $sqlCases = "SELECT cases.*, barangays.BarangayName FROM cases LEFT JOIN barangays ON cases.BarangayID = barangays.BarangayID WHERE CasesID = '$cID'";
        $resultCases = $conn->query($sqlCases);
        $data = mysqli_fetch_assoc($resultCases);
       ?>


    <div class="container">
    <form method="post" action="editCases.php?cID=<?php echo $cID ?>">
        <br/>
        <label>Barangay Name:</label>
        <select name="bID" class="form-control" >
          <?php
            echo "<option value=".$data['BarangayID'].">";
            echo $data['BarangayName'];
            echo "</option>";

              $sql = "SELECT * FROM barangays";
              $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value=".$row['BarangayID'].">";
                    echo $row['BarangayName'];
                    echo "</option>";
                }
            ?>
          </select><br/>

        <label>Confirmed:</label>
        <input type="text" value="<?php echo $data['Confirmed']; ?>" class="form-control" name="cConfirmed"> <br/>

        <label>Recovered:</label>
        <input type="text" value="<?php echo $data['Recovered']; ?>" class="form-control" name="cRecovered"> <br/>

        <label>Deaths:</label>
        <input type="text" value="<?php echo $data['Death']; ?>" class="form-control" name="cDeath"> <br/>

        <label>Date:</label>
        <input type="date" value="<?php echo $data['DateofCases']; ?>" class="form-control" name="cDateOfCases"> <br/>

        <input type="submit" name="editCases" class="btn btn-primary" style="width: 200px">
    </form>
    </div>

    <?php
      if(isset($_POST['editCases'])){

        $bID = $_POST['bID'];
        $cConfirmed = $_POST['cConfirmed'];
        $cRecovered = $_POST['cRecovered'];
        $cDeath = $_POST['cDeath'];
        $cDateOfCases = $_POST['cDateOfCases'];

        $sql = "UPDATE cases SET Confirmed='$cConfirmed', Recovered='$cRecovered', Death='$cDeath',
        DateofCases='$cDateOfCases', BarangayID='$bID' WHERE CasesID='$cID'";
                $result = $conn->query($sql);
                if($result == TRUE){
                  header("Location:cases.php");
                }else {
                  echo $conn->error;
                }
      }
     ?>
  </body>
</html>
