<?php
session_start();
?>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<script type="text/javascript" src="form_validation.js"></script>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
<title>Internal Exam Scheduling System</title>
<meta name='keywords' content='' />
<meta name='description' content='' />
<link href='style.css' rel='stylesheet' type='text/css' media='screen' />
</head>
<body>
<div id='wrapper'>
	<?php
	
		include('hedder2.php');
	?>
	<!-- end #logo -->
	<div id='page'>
		<div id='page-bgtop'>
			<div id='content'>
				<div class='post'>

					
					<h2 class='title'> <font color="#0099FF"><center>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Course Details</center></font></h2>
					<form name='frm' id='frm' method='post' onSubmit="return validate_course();" action='coursedb.php'>
					<img src='images/IN11_HIGH_SCHOOL_EXAM_7543e.jpg' height='400' width='200' hspace="70">
						
						<table align='right' border='1' width=400px height=400px bgcolor='#EAEAFF' bordercolor='#0000CC'>
						<caption><?php
							
							include("connect.php");
									
									$cname="";
											$sem="";
											$id="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["cname1"])){	
							
										$cid=$_POST["cname1"];
										 $sql="SELECT * FROM course_master WHERE course_id =$cid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["course_id"];
										$cname=$row["course_name"];
										$sem=$row["total_sem"];
									}		
							}
						?>
						</caption>
							<tr>
								<td align='center' colspan=2>For Save Data</td>
								
		
							</tr>
							<?php
							if(isset($_POST["cname1"])){
							?>
							<tr>
								<td>Course id : </td>
								<td><input type='text'  name='cid' size='20' value="<?php echo $id;?>"> </td>
		
							</tr>
							<?php
							}
							?>
							
							<tr>
								<td>Course Name </td>
								<td><input type='text' name='cname' size='20' value="<?php echo $cname;?>"> </td>
		
							</tr>
							<tr>
								<td>Total Sem.</td>
								<td><input type='text' name='tsem' size='20' value="<?php echo $sem;?>"> </td>
								
		
							</tr>
							
							<tr>
								<td align='center' colspan=2>
								
								<input type='submit' name='op' size='20' value='Save'>
								
											
							</tr>
					</form>
							</tr>
							<tr>
									
									<td colspan="2" align="center">
									<a href="viewcourse.php">View</a>
									</td>
									</tr>

							

							
	
							
							
							
							</table>
		
					<div class='entry'>
					</div>
				</div>
			</div>
			<!-- end #content -->
				<?php
					include('exam_sub_co_ordinator_sidebar3.php');
				?>
			<!-- end #sidebar -->
			
			<div style='clear: both;'>&nbsp;</div>
		</div>
	</div>
	<!-- end #page -->
	<?php
	
		include('footer.php');
		?>
	<!-- end #footer -->
</div>
</body>
</html>
