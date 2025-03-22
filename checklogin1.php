<?php
session_start();  
//error_reporting(0); 
//include("connect.php");
$con = mysqli_connect("localhost","root","","iexamdb");
$myusername=$_POST['username'];
$mypassword=$_POST['pwd'];




// To protect mysqli injection (more detail about mysqli injection)
$sql="SELECT * FROM login_master WHERE user_name='$myusername' and password='$mypassword'" ;
$result=mysqli_query($con,$sql);

// mysqli_num_row is counting table row
$count=mysqli_num_rows($result);
// If result matched $myusername and $mypassword, table row must be 1 row

if($count==1){
// Register $myusername, $mypassword and redirect to file "admin.php"
	$sql1="select user_type from login_master where user_name='$myusername'";
	$result1=mysqli_query($con,$sql1);
	
	$row = mysqli_fetch_array($result1);
	$utyp=$row[0];
	echo $utyp;
	//$user_typ=row;
	
	if($utyp== "faculty")
	{
		$_SESSION['faculty']=$myusername;
		header("Location: faculty.php");
	}
	else if($utyp == "exam_co_ordinator")
	{
		$_SESSION['exam_co_ordinator']=$myusername;

		header("Location: exam_co_ordinator.php");
	}
	else if($utyp == "exam_sub_co_ordinator")
	{
		
		$_SESSION['exam_sub_co_ordinator']=$myusername;

		header("Location:sub_co_ordinator.php");
	}
	
}

else
{
	

	header("location:login.php");
	echo "Wrong Username or Password";

}


ob_end_flush();
?>