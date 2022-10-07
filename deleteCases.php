<?php
  include('db.php');
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Delete Cases</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
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
       ?>
    <div class="container">
      <form method="post" action="deleteCases.php?cID=<?php echo $cID ?>">
          <h1> Are you sure? </h1>
          <input type="submit" name="deleteCases" class="btn btn-primary" style="width: 200px">
          <a href="cases.php"> <button type="button" class="btn btn-primary"> Cancel </button></a>
      </form>
    </div>

    <?php
      if(isset($_POST['deleteCases'])){

        $sql = "DELETE from cases WHERE CasesID = '$cID'";
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
