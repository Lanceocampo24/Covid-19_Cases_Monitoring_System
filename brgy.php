<?php
  include('db.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pasig City Barangays</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="/TESDA/logo.jpg">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
          <div>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
                <a class="navbar-brand">
                  <img src="logo.jpg" style="width:90px;" class="rounded-circle">
                </a>
                <h1 class="text-white"> PASIG CITY BARANGAYS </h1>
            </nav>

            <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
              <form class="form-inline" action="brgy.php" method="post">
                <input class="form-control mr-sm-2" type="text" name="BarangayName" placeholder="Search">
                <button class="btn btn-success" name="searchBarangay" type="submit">Search</button>
              </form>
            </nav>

        <div class="col-sm bg-dark text-light">
          <a href="http://localhost/TESDA/addBarangay.php"><button class="btn btn-warning">Add Barangay</button></a>
          <div class="bg-dark text-light">
            <br>
          </div>
        <div class="table table-dark">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link active" href="brgy.php">Barangay</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cases.php">Cases</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="listOfDates.php">List of Dates</a>
              </li>
            </ul>

          <table class="table table-dark table-bordered table-hover">
              <th>Barangay Name</th>
              <th>Chairman</th>
              <th>Contact</th>
              <th>District</th>
              <th>Actions</th>

              <?php
                if(isset($_POST['searchBarangay'])){
                  $BarangayName = $_POST['BarangayName'];
                  $sql = "SELECT * FROM barangays WHERE BarangayName LIKE '%$BarangayName%'";
                }
                else{
                  $sql = "SELECT * FROM barangays";
                }
                $result = $conn->query($sql);
                  while($row = $result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td> <a href='CasesPerBarangay.php?bID=".$row['BarangayID']."'>".$row['BarangayName']."</a></td>";
                    echo "<td>".$row['BarangayChairman']."</td>";
                    echo "<td>".$row['BarangayContact']."</td>";
                    echo "<td>".$row['BarangayDistrict']."</td>";
                    echo "<td> <a href='editBarangay.php?bID=".$row['BarangayID']."'class='btn btn-warning'> EDIT </a>
                  <a href='deleteBarangay.php?bID=".$row['BarangayID']."'class='btn btn-danger'> DELETE </a></td>";
                    echo "</tr>";
               }
             ?>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
