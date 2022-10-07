<?php
  include('db.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Add Cases</title>
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
        <h1 class="text-white"> ADD CASES </h1>
      </form>
    </nav>

    <div class="container">
    <form method="post" action="addCases.php">
        <br/>
        <label>Barangay Name:</label>
        <select name="bID" class="form-control" >
          <?php
            include('db.php');
            $sql = "SELECT * FROM barangays";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()){
              echo "<option value='".$row['BarangayID']."'>";
              echo $row['BarangayName'];
              echo "</option>";
            }
          ?>
        </select><br/>

        <label>Confirmed:</label>
        <input type="text" class="form-control" name="cConfirmed"> <br/>

        <label>Recovered:</label>
        <input type="text" class="form-control" name="cRecovered"> <br/>

        <label>Deaths:</label>
        <input type="text" class="form-control" name="cDeath"> <br/>

        <label>Date:</label>
        <input type="date" value="" class="form-control" name="cDateOfCases"> <br/>

        <input type="submit" name="addCases" class="btn btn-primary" style="width: 200px">
    </form>
    </div>

    <?php
      if(isset($_POST['addCases'])){

        $bID = $_POST['bID'];
        $cConfirmed = $_POST['cConfirmed'];
        $cRecovered = $_POST['cRecovered'];
        $cDeath = $_POST['cDeath'];
        $cDateOfCases = $_POST['cDateOfCases'];
        $sql = "INSERT INTO cases (Confirmed, Recovered, Death, BarangayID, DateofCases)
                VALUES ('$cConfirmed','$cRecovered','$cDeath','$bID','$cDateOfCases')";
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
