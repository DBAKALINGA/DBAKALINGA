<?php
session_start();
include_once'sessioncheck.php';
?>

<!doctype html>
<html lang="en">
  <head>
  	<title>Counseling Management System</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css2/style.css">
  </head>
  <body>
		
		<div class="container d-flex align-items-stretch">
	   <nav id="sidebar" class="img" style="background-image: url(images/bg_1.jpg);">
        <div class="p-4">
          <h1><a href="index.html" class="logo">Welcome to cmg <span><?php 
               echo "Hi, &nbsp;" .$_SESSION['uname'];
               ?></span></a></h1>
          <ul class="list-unstyled components mb-5">
            <li class="active">
              <a href="councellor_dash.php"><span class="fa fa-home mr-3"></span> Home</a>
            </li>

             <li>
              <a href="accepted_request.php"><span class="fa fa-book mr-3"></span>Issued Request</a>
            </li>
             <li>
              <a href="view_chat_counselor.php"><span class="fa fa-book mr-3"></span>View Chat</a>
            </li>
             
            <li>
              <a href="logout.php"><span class="fa fa-power-off mr-3"></span>Logout</a>
            </li>
            <div class="w3-bar-item w3-hover-gray"><a href="user_profile.php" target="content"></a></div>
            <li>
          </ul>

        </div>
      </nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <h2 class="mb-4">Counseling Management System</h2><input type="submit" name="print" value="Print" class="btn-sm btn-info" onclick="window.print();">
       
        <?php 
include_once("conn.php"); 
if(isset($_POST['submit'])){

	
  $fname = $_POST['fname'];

}
?>

  
                <div class="table-responsive">
   <table class="table table-bordered" cellpadding="12" cellspacing="5">
  
   <button type="button" class="form-control btn btn-primary submit px-3"><b><strong>ACCEPTED CLIENT REQUESTS HERE</b></strong></button>
   <?php
include_once("conn.php");


$query = "SELECT * FROM appointment AS a JOIN base as b ON b.uid=a.client_id WHERE a.appointment_status='accepted' AND a.professional='$_SESSION[proffesional]' ORDER BY a.apointment_id ASC";
$Record = mysqli_query($conn, $query);

?>
<thead>
<th style="color:#0d243d;">UseR_ID</th>
    <th style="color:#0d243d;">Username</th> 
    <th style="color:#0d243d;">dob</th>
    <th style="color:#0d243d;">p_number</th>
    <th style="color:#0d243d;">proffesional</th>
    <th style="color:#0d243d;">description</th>
    <th style="color:#0d243d;">Status</th>
    <th style="color:#0d243d;">action</th>
</thead>
<?php

while($row = mysqli_fetch_array($Record)){

  
?>
<tbody>
<td><?php echo $row['apointment_id'];?></td>
    <td><?php echo $row['fname'];?></td> 
    <td><?php echo $row['dob'];?></td>
    <td><?php echo $row['p_number'];?></td>
    <td><?php echo $row['professional'];?></td>
    <td><?php echo $row['description'];?></td>
    <td><?php echo $row['appointment_status'];?></td>
    <td>
    <a href="councellor_view.php?id=<?php echo $row['apointment_id']; ?>">VIEW<span class="fa fa-edit mr-3" style="color:green;"></span></a>
      </td>
</tbody>
<?php

}

?>
						</table>
         
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>