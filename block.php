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
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					Block Details</center></font></h2>
					<form name="frm" id="frm" method="post" onSubmit="return validate_block();" action="blockdb.php">
						<img src='images/students-taking-an-exam-3.jpg' height='400' width='200' hspace="70">
						
						<table align='right' border='1' width=400px height=400px bgcolor='#EAEAFF' bordercolor='#0000CC'>
							
							<caption><?php
							
							include("connect.php");
									
									$bno="";
											$rno="";
											$bstr="";
											$id="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["bno1"])){	
							
										$bid=$_POST["bno1"];
										 $sql="SELECT * FROM block_master WHERE block_id =$bid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["block_id"];
										$bno=$row["block_no"];
										$rno=$row["room_no"];
										$bstr=$row["block_strength"];
									}		
							}
						?>
						</caption>
							
							<tr>
								<td align="center" colspan=2>For Save Data</td>
								
		
							</tr>
							
							<?php
							if(isset($_POST["bno1"])){
							?>
							<tr>
								<td>block id : </td>
								<td><input type='text' name='bid' size='20' value="<?php echo $id;?>"> </td>
		
							</tr>
							<?php
							}
							?>
							<tr>
								<td>Block No</td>
								<td><input type="text" name="blno" size="20" value="<?php echo $bno;?>"> </td>
		
							</tr>
							
							<tr>
								<td>Room No</td>
								<td><input type="text" name="rono" size="20" value="<?php echo $rno;?>"> </td>
		
							</tr>
							<tr>
								<td>Block Strength</td>
								<td><input type="text" name="bstrength" size="20" value="<?php echo $bstr;?>"> </td>
		
							</tr>
							
		
							<tr>
								<td align='center' colspan=2>
								
								<input type='submit' name='op' size='20' value='Save'>
								
										
							</tr>
					</form>
					<tr>
									
									<td colspan="2" align="center">
									<a href="viewblock.php">View</a>
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
