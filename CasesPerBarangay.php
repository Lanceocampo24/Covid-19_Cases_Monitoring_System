<?php
  include('db.php');
 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Pasig Covid-19 Cases by Barangay</title>
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
      if($bID == null){
        header("Location:brgy.php");
      }
     ?>

     <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
       <form class="form-inline">
         <a class="navbar-brand">
           <img src="logo.jpg" style="width:90px;" class="rounded-circle">
         </a>
         <h1 class="text-white"> PASIG COVID-19 CASES</h1>
       </form>
     </nav>

     <div class="table table-dark">
         <ul class="nav nav-tabs">
           <li class="nav-item">
             <a class="nav-link" href="brgy.php">Back</a>
           </li>
         </ul>
      <table class="table table-dark table-hover">
          <th>Barangay Name</th>
          <th>Confirmed Cases</th>
          <th>Recovered Cases</th>
          <th>Death Cases</th>
          <th>Active Cases</th>
          <th>Date of Cases</th>
          <?php
            $sql = "SELECT cases.*, barangays.BarangayName, cases.Confirmed - (cases.Death + cases.Recovered) AS 'Active'
                    FROM cases LEFT JOIN barangays ON cases.BarangayID = barangays.BarangayID
                    WHERE barangays.BarangayID = '$bID'";
            $result = $conn->query($sql);

              while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['BarangayName']."</td>";
                echo "<td>".$row['Confirmed']."</td>";
                echo "<td>".$row['Recovered']."</td>";
                echo "<td>".$row['Death']."</td>";
                echo "<td>".$row['Active']."</td>";
                echo "<td>".$row['DateofCases']."</td>";
                echo "</tr>";
              }
          ?>
      </table>
    </div>
  </body>
</html>
