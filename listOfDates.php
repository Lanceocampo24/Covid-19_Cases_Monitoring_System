<?php
  include('db.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pasig Covid-19 Cases List of Dates</title>
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
        <h1 class="text-white"> PASIG COVID-19 LIST OF DATES </h1>
      </form>
    </nav>

    <div class="table table-dark">
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link" href="brgy.php">Barangay</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Cases.php">Cases</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="listOfDates.php">List of Dates</a>
          </li>
        </ul>
    <table class="table table-dark table-hover">
        <th>Date of Cases</th>

        <?php
          $sql = "SELECT DISTINCT(DateofCases) FROM cases";
          $result = $conn->query($sql);
          while($row = $result->fetch_assoc()){
            echo "<tr>";
            echo "<td> <a href='casesPerDate.php?date=".$row['DateofCases']."'>".$row['DateofCases']."</a></td>";
            echo "</tr>";
          }
        ?>
    </table>
  </body>
</html>
