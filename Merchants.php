<?php include("header.php")?>
<?php
function displayEmployeeData() {
  include("inc/config.php");

  $sql = "SELECT * FROM employees";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      $count = 1;
      while ($row = $result->fetch_assoc()) {
          echo "<tr data-id='" . $row['employee_id'] . "'>";
          echo "<td><center><input type='checkbox' class='schedule-checkbox' value='" . $row['employee_id'] . "'></center></td>";
          echo "<td>" . $row['employee_id'] . "</td>";
          echo "<td>" . $row['emp_firstname'] . "</td>";
          echo "<td>" . $row['emp_lastname'] . "</td>";
          echo "<td>" . $row['emp_email'] . "</td>";
         
          // Add other columns as needed
          echo "<td><img src='images/" . $row['profile_picture'] . "' alt='Employee Image' style='width:50px;height:50px;'></td>"; // Example for image column
          echo "<td>" . $row['role'] . "</td>";
          echo "<td>";
          echo "<button class='btn btn-success btn-sm' onclick='editEmployee(" . $row['employee_id'] . ")'><i class='fa-solid fa-pen-to-square'></i></button> ";
          echo "<button class='btn btn-danger btn-sm' onclick='deleteEmployee(" . $row['employee_id'] . ")'><i class='fa-solid fa-trash'></i></button> ";
          echo "<button class='btn btn-primary btn-sm' style='background-color:borde; onclick='editEmployee(" . $row['employee_id'] . ")'><i class='fa-solid fa-eye'></i></button>";
          echo "</td>";
          echo "</tr>";
          $count++;
      }
  }

  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href='https://fonts.googleapis.com/css?family=Open Sans' rel='stylesheet'>
  <script src="https://kit.fontawesome.com/d36de8f7e2.js" crossorigin="anonymous"></script>
  <link rel='stylesheet' href='https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css'>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 

  <style>
    body {
      background-image: url("images/bg.png");
      background-size: cover;
      background-repeat: no-repeat;
    }

.form-control-sm {
    margin-top:10px;
}
.active>.page-link, .page-link.active {
    z-index: 3;
    color: #fff;
    background-color: #174793;
    border-color: #174793;
}

.paginate_button{
    color: #174793;
}

.page-link {
    color: #174793;
}

th{
    background-color:red;
}

#example th{
    background-color:#E96529;
    text-align:center;
    color:#fff;
}
  </style>
</head>
<body>
<div class="cont-box">
  <div class="custom-box pt-5">
  <div class="sub" style="text-align:left;">
  
  <div class="reset" style="padding-bottom: 0px; padding-right: 30px; display: flex; align-items: center;">
    <p style="font-size: 30px; font-weight: bold; margin-right: auto; padding-left:30px;color:#E96529;">Merchants</p>
    <button type="button" class="btn btn-danger" id="resetStatusButton" style="border: none; border-radius: 20px; background-color: #E96529; width: 150px;"><i class="fa-solid fa-upload"></i> Upload Merchant</button>
</div>

    <div class="content" style="width:95%;margin-left:auto;margin-right:auto;">
        <table id="example" class="table bord">
        <thead>
            <tr>
                <th>Select</th>
                <th>No.</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Image</th>
                <th>Role </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="dynamicTableBody">
        <?php displayEmployeeData(); ?>
        </tbody>
    </table>
  </div>
</div>
</div>
<script src='https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.min.js'></script>
<script src='https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js'></script>
<script src="./js/script.js"></script>
</body>
</html>