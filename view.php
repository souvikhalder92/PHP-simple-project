<?php 

include 'config1.php';
error_reporting(0);


$eventname = $_POST['eventname'];
$eventdate = $_POST['eventdate'];
$number = $_POST['number'];
$status = $_POST['status'];
if (!empty($eventname) || !empty($eventdate) || !empty($number) || !empty($status)) {
$sql = "INSERT INTO new (eventname,eventdate,botid,status)
               VALUES ('$eventname','$eventdate','$number','$status')";
$result = mysqli_query($conn,$sql);
echo "<script>alert('Thank you for creating for event')</script>";
if($result)
{
  header("Location:http://localhost/sign_up/view.php");
}



}



$query="SELECT * FROM new";
$connect=mysqli_query($conn,$query);
$num=mysqli_num_rows($connect);
  
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Event</title>
      <link rel="stylesheet" href="style1.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body>
      <div class="center">
         <input type="checkbox" id="show">
         <label for="show" class="show-btn" style="margin-top: -100px;margin-left: -110px;">Create New Event !</label>
         <a href="logout.php" class="show-btn" style="margin-left: 68px; margin-top: -100px;" >Logout</a>
         <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"></label>
            <div class="text">
               New Event
            </div>
            <form action="" method="POST" class="login-email">
               <div class="data">
                  <label>Event Name</label>
                  <input type="text"  placeholder="Event Name" name="eventname" required>
               </div>
               <div class="data">
                  <label>Event Date</label>
                  <input type="date"  placeholder="Eventdate" name="eventdate" required>
               </div>
               <div class="data">
                  <label>Bot ID</label>
                  <input type="number"  placeholder="Number" name="number"  required>
               </div>
               <div class="data">
                  <label>Status</label>
                  <input type="text"  placeholder="Status" name="status" required>
               </div>
               <div class="btn">
                  <div class="inner"></div>
                  <button type="submit">Submit</button>
               </div>  
            </form>
         </div>
      </div>

   <div>
       <div style="position: absolute;top: 28%;left: 40%;transform: translate(-50%,-50%);color: #6c5ce7;">
                  <label>Event Details</label>
               </div>

      <table border="1" style="width: 55%;position: absolute;top: 45%;left: 42%;transform: translate(-50%,-50%);">
         <tr style="background-color:#BDB76B;color:#ffffff;">
            <th>Event Name</th>
            <th>Event Date</th>
             <th>Bot Id</th>
            <th>Status</th>
         </tr>
       <?php
          if($num>0)
          {
            while($data=mysqli_fetch_assoc($connect))
            {
               echo "
             <tr>
               <td>".$data['eventname']."</th>
               <td>".$data['eventdate']."</th>
               <td>".$data['botid']."</th>
               <td>".$data['status']."</th>
              </tr>
          ";
          }
          }

       ?>

      </table>
   </div>

   </body>
</html>