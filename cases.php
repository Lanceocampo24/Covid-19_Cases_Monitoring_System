<?php
  include('db.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pasig Covid-19 Cases</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="/TESDA/logo.jpg">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 bg-dark text-light">
            <h2>TOTAL CASES</h2>
            <?php
              $sqlSUM = "SELECT sum(confirmed) AS 'TotalConfirmed', sum(recovered) AS 'TotalRecovered', sum(death) AS 'TotalDeath' FROM cases";
              $resultSUM = $conn->query($sqlSUM);
              $data = mysqli_fetch_assoc($resultSUM);
              echo "<h5> Total Confirmed: " . $data['TotalConfirmed'] . "</h5>";
              echo "<h5> Total Recovered: " . $data['TotalRecovered'] . "</h5>";
              echo "<h5> Total Death: " . $data['TotalDeath'] . "</h5>";
             ?>
          </div>

        <div class="col-sm-9 bg-secondary text-light">
          <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <form class="form-inline" Action="cases.php">
              <a class="navbar-brand">
                <img src="logo.jpg" style="width:90px;" class="rounded-circle">
              </a>
              <h1 class="text-white"> PASIG COVID-19 CASES </h1>
            </form>
          </nav>
          <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <form class="form-inline" Action="cases.php" method="post">
              <div class="form-group">
                <input class="form-control mr-sm-2" type="text" name="BarangayName" placeholder="Search">
                <button class="btn btn-success" name="searchBarangay" type="submit">Search</button>
              </div>
            </form>
          </nav>
          <div class="col-sm bg-dark text-light">
            <a href="http://localhost/TESDA/addCases.php"><button class="btn btn-warning">Add Cases </button></a>
          </div>
          <div class="col-sm bg-dark text-light">
            <br>
          </div>

          <div class="table bg-dark table-dark">
              <ul class="nav nav-tabs">
                <li class="nav-item">
                  <a class="nav-link" href="brgy.php">Barangay</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="Cases.php">Cases</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="listOfDates.php">List of Dates</a>
                </li>
              </ul>
            </div>
          <h1 class="bg-dark text-center">CASES</h1>

          <table class="table table-dark table-bordered table-hover">
              <th>Barangay Name</th>
              <th>Confirmed Cases</th>
              <th>Recovered Cases</th>
              <th>Death Cases</th>
              <th>Active Cases</th>
              <th>Date of Cases</th>
              <th>Actions</th>

              <?php
              if (isset($_POST['searchBarangay'])){
                $BarangayName = $_POST['BarangayName'];
                $sql = "SELECT cases.*,barangays.BarangayName, cases.Confirmed - (cases.Death + cases.Recovered) AS 'Active'
                        FROM cases LEFT JOIN barangays ON cases.BarangayID = barangays.BarangayID
                        WHERE BarangayName LIKE '%$BarangayName%'";
              }
              else {
                $sql = "SELECT cases.*,barangays.BarangayName, cases.Confirmed - (cases.Death + cases.Recovered) AS 'Active'
                        FROM cases LEFT JOIN barangays ON cases.BarangayID = barangays.BarangayID";
              }

              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['BarangayName']."</td>";
                echo "<td>".$row['Confirmed']."</td>";
                echo "<td>".$row['Recovered']."</td>";
                echo "<td>".$row['Death']."</td>";
                echo "<td>".$row['Active']."</td>";
                echo "<td>".$row['DateofCases']."</td>";
                echo "<td> <a href='editCases.php?cID=".$row['CasesID']."'class='btn btn-warning'> EDIT </a>
                <a href='deleteCases.php?cID=".$row['CasesID']."'class='btn btn-danger'> DELETE </a></td>";
                echo "</tr>";
              }
              ?>
            </table>
          </div>
        </div>
      </div>
  </body>
</html>
