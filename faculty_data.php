<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="form_validation.js"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Internal Exam Scheduling System</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

<link rel="stylesheet" type="text/css" media="all" href="jsdatepick-calendar/jsDatePick_ltr.min.css" />
    <script type="text/javascript" src="jsdatepick-calendar/jsDatePick.min.1.3.js"></script>
	</head>
		<script type="text/javascript" language="javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"cdt",
			dateFormat:"%d-%M-%Y"
		});
	};
</script>   


<body>




<div id="wrapper">
	<?php
	
		include("hedder2.php");
	?>
	<!-- end #logo -->
	<div id="page">
		<div id="page-bgtop">
			<div id="content">
				<div class="post">
				
				
				
					<h2 class='title'><font color="#0099FF"><center>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					
					Faculty Details</center></font></h2>
					<form name="frm" id="frm" method="post" onSubmit="return validate_fac(this.form);" action="facultydb.php">
					<img src='images/user-group-icon.png' height='400' width='200' hspace="70">
						
						<table align='right' border='1' width=400px height=400px bgcolor='#EAEAFF' bordercolor='#0000CC'>
						
						<caption><?php
							
							include("connect.php");
									
									$fname="";
									$id="";
									$gen="";
									$mno="";
									$doj="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["fname1"])){	
							
										$fid=$_POST["fname1"];
										 $sql="SELECT * FROM faculty_master WHERE fac_id =$fid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["fac_id"];
										$fname=$row["fac_name"];
										$gen=$row["gender"];
										$mno=$row["mobile_no"];
										$doj=$row["date_of_join"];
										
										
									}		
							}
						?>
						</caption>

							<tr>
								<td align="center" colspan=2>For Save Data</td>
								
		
							</tr>
							
							</tr>
							<?php
							if(isset($_POST["fname1"])){
							?>
							
							<tr>
								<td>Faculty Id</td>
								<td><input type="text" name="fid" size="20" value="<?php echo $id;?>"> </td>
		
							</tr>
							
							<?php
							}
							?>
							
							
					
							
							
							
							
		
							<tr>
								<td>Faculty Name</td>
								<td><input type="text" name="fname" size="20" value="<?php echo $fname;?>"> </td>
		
							</tr>
							
							
							<tr>
								<td>Gender</td>
								<td><input type="radio" name="ge" value="Male" value="<?php echo $gen;?>"> Male
								     <input type="radio" name="ge" value="female" value="<?php echo $gen;?>"> Female
							</tr>
		
							<tr>
								<td>Mobile No </td>
								<td><input type="text" name="no" size="20" value="<?php echo $mno;?>"> </td>
		
							</tr>
							


		
							<tr>
								<td align='center' colspan=2>
								
								<input type='submit' name='op' size='20' value='Save'>
								
											
							</tr>
		
		
							</form>
								
							<tr>
									
									<td colspan="2" align="center">
									<a href="viewfac.php">View</a>
									</td>
									</tr>

								

						</table>
					
					<div class="entry">
					</div>
				</div>
			</div>
			<!-- end #content -->
				<?php
					include("exam_sub_co_ordinator_sidebar3.php");
				?>
			<!-- end #sidebar -->
			<div style="clear: both;">&nbsp;</div>
		</div>
	</div>
	<!-- end #page -->
	<?php
	
		include("footer.php");
		?>
	<!-- end #footer -->
</div>
</body>
</html>
