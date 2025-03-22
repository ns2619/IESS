<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="form_validation.js"></script>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Internal Exam Scheduling System</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
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
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					Lab Details</center></font></h2>
					<form name="frm" id="frm" method="post" onSubmit="return validate_lab();" action="labdb.php">
						<img src='images/image6.gif' height='400' width='200' hspace="70">
						
						<table align='right' border='1' width=400px height=400px bgcolor='#EAEAFF' bordercolor='#0000CC'>
							
							<caption><?php
							
							include("connect.php");
									
									$lno="";
											$labstr="";
											$labspl="";
											$id="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["lno1"])){	
							
										$lid=$_POST["lno1"];
										 $sql="SELECT * FROM lab_master WHERE lab_id =$lid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["lab_id"];
										$lno=$row["lab_no"];
										$labstr=$row["lab_strength"];
										$labspl=$row["lab_specialization"];
									}		
							}
						?>
						</caption>
							
							<tr>
								<td align="center" colspan=2>For Save Data</td>
								
		
							</tr>
							
							<?php
							if(isset($_POST["lno1"])){
							?>
							<tr>
								<td>lab id : </td>
								<td><input type='text' name='lid' size='20' value="<?php echo $id;?>"> </td>
		
							</tr>
							<?php
							}
							?>
							<tr>
								<td>Lab No</td>
								<td><input type="text" name="lno" size="20" value="<?php echo $lno;?>"> </td>
		
							</tr>
							<tr>
								<td>Lab Strength</td>
								<td><input type="text" name="lstrength" size="20" value="<?php echo $labstr;?>"> </td>
		
							</tr>
							<tr>
								<td>Lab Specialization</td>
								<td><input type="text" name="lspecial" size="20" value="<?php echo $labspl;?>"> </td>
		
							</tr>

		
							<tr>
								<td align='center' colspan=2>
								
								<input type='submit' name='op' size='20' value='Save'>
								
								
							</tr>
					</form>
					<tr>
									
									<td colspan="2" align="center">
									<a href="viewlab.php">View</a>
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
