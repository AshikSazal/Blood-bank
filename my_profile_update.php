<?php
session_start();
require_once 'index_upper_footer.php';
 ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel='stylesheet' href='style\bootstrap.min.css'>
  <script src='js\bootstrap.min.js' charset='utf-8'></script>
  <link rel='stylesheet' href='fontawesome\css\all.min.css'>
  <link rel='stylesheet' href='style\registration.css'>
  <link rel="stylesheet" type="text/css" href="style/index_upper_footer.css">
  <script src='js/jquery.js'></script>
</head>
<body>

  <?php

   error_reporting(0);

    $nameErr=$dobErr=$blood_groupErr=$emailErr=$phoneErr=$postcodeErr="";
    $villageErr=$districtErr=$divisionErr=$passwordErr=$cpasswordErr="";

    $fname= $lname =$age=$blood_group=$phone=$postcode= $village = "";
    $district = $division=$email = $password = $cpassword =  "";

    $id = trim($_GET['id']);
    $fname = trim($_GET['fname']);
    $lname = trim($_GET['lname']);
    $blood_group = trim($_GET['blood_group']);
    $email = trim($_GET["email"]);
    $phone = trim($_GET['phone']);
    $postcode = trim($_GET['postcode']);
    $village = trim($_GET['village']);
    $district = trim($_GET['district']);
    $division = trim($_GET['division']);
    $password2 = trim($_GET['password']);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if(!empty($_POST['id'])){
        $id = trim($_POST['id']);
      }

      if(!empty($_POST['fname']) && !empty($_POST['lname'])){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
      }else{
        $nameErr = 'Name is required';
      }
      

      if(empty($_POST['year']) && empty($_POST['month']) && empty($_POST['day'])){
        $dobErr = "Date of birth is required";
      }else{
        $year = trim($_POST['year']);
        $month = trim($_POST['month']);
        $day = trim($_POST['day']);
        $dob = $year."-".$month."-".$day;
      }

      if(empty($_POST['blood_group'])){
        $blood_groupErr = 'Blood group required';
      }else{
        $blood_group = trim($_POST['blood_group']);
      }

      if (empty($_POST["email"])) {
        $emailErr = "Email is required";
      } elseif (!preg_match("/@gmail.com/", $_POST["email"])) {
        $emailErr = "Email is not correct";
      } else {
        $email = trim($_POST["email"]);
      }

      if(empty($_POST['phone'])){
        $phoneErr = "Phone is required";
      }elseif (!is_numeric($_POST['phone'])) {
        $phoneErr = "Invalid number";
      }else{
        $phone = trim($_POST['phone']);
      }

      if(empty($_POST['postcode'])){
        $postcodeErr = "postcode is required";
      }elseif (!is_numeric($_POST['postcode'])) {
        $postcodeErr = "Invalid number";
      }else{
        $postcode = trim($_POST['postcode']);
      }

      if(empty($_POST['village'])){
        $villageErr = "Village is required";
      }else{
        $village = trim($_POST['village']);
      }

      if(empty($_POST['district'])){
        $districtErr = "District is required";
      }else{
        $district = trim($_POST['district']);
      }

      if(empty($_POST['division'])){
        $divisionErr = "division is required";
      }else{
        $division = trim($_POST['division']);
      }

      if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
      }else {
        $password2 = trim($_POST["password"]);
      }

      if (empty($_POST["cpassword"])) {
        $cpasswordErr = "Password is required";
      } elseif ($_POST["password"]!=$_POST["cpassword"]) {
        $cpasswordErr = "Password is not correct";
      } else {
        $password = trim($_POST["password"]);
      }


      $conn = new mysqli('localhost','root','','blood_donation');

      $dup = mysqli_query($conn,"select * from user_biodata where email = '$email' and id != '$id'");
      if(mysqli_num_rows($dup)==1){
        $emailErr = "Email is already use";
      }

      if(mysqli_num_rows($dup)==0 && !empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST['year']) && !empty($_POST['month']) && !empty($_POST['day']) && !empty($_POST["blood_group"]) && !empty($_POST["email"]) && !empty($_POST['phone']) && !empty($_POST["postcode"]) && !empty($_POST["village"]) && !empty($_POST["district"]) && !empty($_POST["division"]) && !empty($_POST["cpassword"]) && !empty($_POST["password"]) && ($_POST['password']==$_POST['cpassword'])){
        $sql = "update user_biodata set fname='$fname',lname='$lname',dob='$dob',blood_group='$blood_group',phone='$phone',postcode='$postcode',village='$village',district='$district',division='$division',email='$email',password='$password' where id='$id'";
        $fname= $lname =$dob=$blood_group=$phone=$postcode= $village = $district = $division=$email = $password = $cpassword =  "";
        mysqli_query($conn,$sql);
        echo("<script>location.href = 'index.php';</script>");
      }
      $conn->close();

    }

    

   ?>

  <div>
    <?php upper($_SESSION['user_email'],$_SESSION['user_password']); ?>
  </div>

  <div class="container registration">
    <div class="row">
      <div class="col-lg-3"></div>
      <div class="col-lg-6 input-form">
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input class="flabpvd" type="text" name="fname" value="<?php echo $fname;?>" placeholder="First name">
          <input class="flabpvd" type="text" name="lname" value="<?php echo $lname;?>" placeholder="Last name"><br>
          <span> <?php echo $nameErr;?></span><br>

          <label class="dob" type="text">Date of birth:</label>
          <select class="dob" name="year">
            <option value="">Select year</option>
            <?php for ($i = 1970; $i <= date('Y'); $i++) : ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
          </select>
          <select class="dob" name="month">
            <option value="">Select month</option>
            <?php for ($i = 1; $i <= 12; $i++) : ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
          </select>
          <select class="dob" name="day">
            <option value="">Select day</option>
            <?php for ($i = 1; $i <= 31; $i++) : ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php endfor; ?>
          </select><br>
          <span style="float: left; margin-left: 200px;"> <?php echo $dobErr;?></span><br>

          <label class="blood_group" style="padding-left: 10px;">Choose a group:</label>
          <select class="blood_group" style="padding-left: 30px;" name="blood_group">
            <option value="">Select blood group</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
          </select><br>
          <span style="float: left; margin-left: 80px;"> <?php echo $blood_groupErr;?></span><br>
          

          <input class="edpc" type="text" name="email" value="<?php echo $email;?>" placeholder="E-Mail"><br>
          <span> <?php echo $emailErr;?></span><br>

          <input class="flabpvd" type="text" name="phone" value="<?php echo $phone;?>" placeholder="Phone number">
          <input class="flabpvd" type="text" name="postcode" value="<?php echo $postcode;?>" placeholder="Post code"><br>
          <span style="padding-right: 50px;"> <?php echo $phoneErr;?></span><span> <?php echo $postcodeErr;?></span><br>

          <input class="flabpvd" type="text" name="village" value="<?php echo $village;?>" placeholder="Village">
          <input class="flabpvd" type="text" name="district" value="<?php echo $district;?>" placeholder="District"><br>
          <span style="padding-right: 50px;"> <?php echo $villageErr;?></span><span> <?php echo $districtErr;?></span><br>

          <input class="edpc" type="text" name="division" value="<?php echo $division;?>" placeholder="division"><br>
          <span> <?php echo $divisionErr;?></span><br>

          <input class="edpc" type="text" name="password" value="<?php echo $password2;?>" placeholder="Password"><br>
          <span> <?php echo $passwordErr;?></span><br>

          <input class="edpc" type="text" name="cpassword" placeholder="Confirm password"><br>
          <span> <?php echo $cpasswordErr;?></span><br>
          <button class="btn btn-dark" name='submit' value='submit' style="border-radius: 80px;">Update</button>
        </form>
      </div>
      <div class="col-lg-3"></div>
    </div>
  </div>

  <div>
    <?php footer(); ?>
  </div>



  <div>
    <?php sign_in(); ?>
  </div>

<script type='text/javascript'>

    document.getElementById('button').addEventListener('click', function() {
      document.querySelector('.sign-in').style.display = 'flex';  // show the pop up window
      $('body').css('overflow', 'hidden');  // stop scrolling backgroud

  });

    document.querySelector('.close').addEventListener('click', function() {
      document.querySelector('.sign-in').style.display = 'none';  // for remove pop up window
      $('body').css('overflow', ''); // start scrolling after remove the pop up window
  });

</script>

</body>
</html>
