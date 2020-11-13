<?php 
	
	function upper($username,$user_password){

		$conn = new mysqli('localhost','root','','blood_donation');
		$sql = "select * from admin_biodata where name='$username' and password='$user_password'";
		$result = mysqli_query($conn,$sql);

		if($result->num_rows>0){
			$value = "
			<div id='main'>
			    <nav>
			      <ul class='home'>
			        <li><a href='index.php'>Home</a></li>
			      </ul>
			      <ul>
			        <li>
			          <div class='menu-bar'>
			            <div class='dropdown'>
			              <button class='dropbtn'>Donor list</button>
			              <div class='dropdown-content'>
			                <a href='donor_list.php?blood_group=a+'>A+</a>
			                <a href='donor_list.php?blood_group=a-'>A-</a>
			                <a href='donor_list.php?blood_group=b+'>B+</a>
			                <a href='donor_list.php?blood_group=b-'>B-</a>
			                <a href='donor_list.php?blood_group=o+'>O+</a>
			                <a href='donor_list.php?blood_group=o-'>O-</a>
			                <a href='donor_list.php?blood_group=ab+'>AB+</a>
			                <a href='donor_list.php?blood_group=ab-'>AB-</a>
			              </div>
			            </div>
			          </div>
			        </li>
			        <li>
			          <a href='search.php' class='search'>Search</a>
			        </li>
			        <li><a href='#' class='about-contact-sign'>About us</a></li>
			        <li><a href='#' class='about-contact-sign'>Contact us</a></li>
			        <li>
			          <div class='menu-bar'>
			            <div class='dropdown'>
			              <img src='image/profile.jpg'>
			              <div class='dropdown-content my-profile'>
			                <a href='admin.php'>Admin panel</a>
			                <a href='logout.php'>Logout</a>
			              </div>
			            </div>
			          </div>
			        </li>
			      </ul>
			    </nav>
			 </div>";
		}elseif ($username=='') {
			$value = "
			<div id='main'>
			    <nav>
			      <ul class='home'>
			        <li><a href='index.php'>Home</a></li>
			      </ul>
			      <ul>
			        <li>
			          <div class='menu-bar'>
			            <div class='dropdown'>
			              <button class='dropbtn'>Donor list</button>
			              <div class='dropdown-content'>
			                <a href='donor_list.php?blood_group=a+'>A+</a>
			                <a href='donor_list.php?blood_group=a-'>A-</a>
			                <a href='donor_list.php?blood_group=b+'>B+</a>
			                <a href='donor_list.php?blood_group=b-'>B-</a>
			                <a href='donor_list.php?blood_group=o+'>O+</a>
			                <a href='donor_list.php?blood_group=o-'>O-</a>
			                <a href='donor_list.php?blood_group=ab+'>AB+</a>
			                <a href='donor_list.php?blood_group=ab-'>AB-</a>
			              </div>
			            </div>
			          </div>
			        </li>
			        <li>
			          <a href='search.php' class='search'>Search</a>
			        </li>
			        <li><a href='#' class='about-contact-sign'>About us</a></li>
			        <li><a href='#' class='about-contact-sign'>Contact us</a></li>
			        <li><a href='#' id='button' class='about-contact-sign'>Sign in</a></li>
			      </ul>
			    </nav>
			 </div>";
		}else{
			$value = "
			<div id='main'>
			    <nav>
			      <ul class='home'>
			        <li><a href='index.php'>Home</a></li>
			      </ul>
			      <ul>
			        <li>
			          <div class='menu-bar'>
			            <div class='dropdown'>
			              <button class='dropbtn'>Donor list</button>
			              <div class='dropdown-content'>
			                <a href='donor_list.php?blood_group=a+'>A+</a>
			                <a href='donor_list.php?blood_group=a-'>A-</a>
			                <a href='donor_list.php?blood_group=b+'>B+</a>
			                <a href='donor_list.php?blood_group=b-'>B-</a>
			                <a href='donor_list.php?blood_group=o+'>O+</a>
			                <a href='donor_list.php?blood_group=o-'>O-</a>
			                <a href='donor_list.php?blood_group=ab+'>AB+</a>
			                <a href='donor_list.php?blood_group=ab-'>AB-</a>
			              </div>
			            </div>
			          </div>
			        </li>
			        <li>
			          <a href='search.php' class='search'>Search</a>
			        </li>
			        <li><a href='#' class='about-contact-sign'>About us</a></li>
			        <li><a href='#' class='about-contact-sign'>Contact us</a></li>
			        <li>
			          <div class='menu-bar'>
			            <div class='dropdown'>
			              <img src='image/profile.jpg'>
			              <div class='dropdown-content my-profile'>
			                <a href='my_profile.php'>My profile</a>
			                <a href='logout.php'>Logout</a>
			              </div>
			            </div>
			          </div>
			        </li>
			      </ul>
			    </nav>
			 </div>";
		}
		echo $value;
		$conn->close();
	}



	function footer(){
		$value2 = "
			<div class='container-fluid footer'>
			    <div class='row'>
			      <div class='col-lg-4'></div>
			      <div class='col-lg-4'>
			        <div class='social-media'>
			          <ul>
			            <li><a href='#'><i class='fab fa-twitter'></i></a></li>
			            <li><a href='#'><i class='fab fa-facebook'></i></a></li>
			            <li><a href='#'><i class='fab fa-pinterest'></i></a></li>
			            <li><a href='#'><i class='fab fa-youtube'></i></a></li>
			          <br>
			            <li><a href='#' class='foot'>Condition</a></li>
			            <li><a href='#' class='foot'>Story</a></li>
			            <li><a href='#' class='foot'>Location</a></li>
			            <li><a href='#' class='foot'>Help & Info</a></li>
			          <br>
			            <li><a href='#' class='foot'>Contact</a></li><li class='foot'>|</li>
			            <li><a href='#' class='foot'>Blog</a></li><li class='foot'>|</li>
			            <li><a href='#' class='foot'>About</a></li>
			          </ul>
			        </div>
			      </div>
			      <div class='col-lg-4'></div>
			    </div>
			    <div class='row tips'>
			      <div class='col-lg-3'></div>
			      <div class='col-lg-6'>
			        Donate blood regularly, keep yourself happy and keep others happy<br>
			        Blood Technologies ©2020. All rights reserved.
			      </div>
			      <div class='col-lg-3'></div>
			    </div>
  			</div>";

  			echo $value2;
	}

	function sign_in(){
		$value3 = "
			<div class='sign-in' id='sign'>
			    <div class='sign-in2'>
			      <div class='close'>+</div>
			      <img src='image/signin_logo.png' alt=''>
			      <form method='post' action='action/sign_in.php'>
			        <input class='email' type='text' name='email' placeholder='E-Mail'>
			        <input class='password' type='password' name='password' placeholder='Password'>
			        <button class='btn btn-info' name='submit' value='sub' style='border-radius: 80px;'>Sign in</button><br><br>
			        <a href='registration.php' class='registration'>Create an account</a>
			      </form>
			    </div>
		  	</div>";

		echo $value3;
	}

 ?>