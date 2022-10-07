<?php
  include('db.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pasig Covid-19 Cases by Date</title>
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
      $date= $_GET['date'];
      if($date == null){
        header("Location:listOfDates.php");
      }
     ?>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <form class="form-inline">
        <a class="navbar-brand">
          <img src="logo.jpg" style="width:90px;" class="rounded-circle">
        </a>
        <h2 class="text-white"> PASIG COVID-19 CASES By DATE </h2>
      </form>
    </nav>

    <div class="table table-dark">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="listOfDates.php">Back</a>
          </li>
        </ul>

      <table class="table table-dark table-bordered table-hover">
          <th>Date</th>
          <th>Barangay</th>
          <th>Confirmed</th>
          <th>Recovered</th>
          <th>Death</th>
          <th>Active</th>
          <?php
            $sql = "SELECT cases.*, barangays.BarangayName , cases.Confirmed - (cases.Death + cases.Recovered) AS 'Active'
                    FROM cases LEFT JOIN barangays ON cases.BarangayID = barangays.BarangayID
                    WHERE DateofCases = '$date'";

            $result = $conn->query($sql);

              while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['DateofCases']."</td>";
                echo "<td>".$row['BarangayName']."</td>";
                echo "<td>".$row['Confirmed']."</td>";
                echo "<td>".$row['Recovered']."</td>";
                echo "<td>".$row['Death']."</td>";
                echo "<td>".$row['Active']."</td>";
                echo "</tr>";
              }
          ?>
      </table>
    </div>
  </body>
</html>
