<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					Create Exam</center></font></h2>
					<form name="frm" id="frm" method="post" action="create_examdb.php">
						<img src='images/prepiar_for_bank_exam.jpg' height='400' width='200' hspace="70">

						<table align='right' border='1' width=400px height=400px bgcolor='#EAEAFF' bordercolor='#0000CC'>
							
							<caption><?php
							
							include("connect.php");
									
									$ename="";
											$eyear="";
											$etype="";
											$id="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["ename1"])){	
							
										$eid=$_POST["ename1"];
										 $sql="SELECT * FROM exam_info_master WHERE exam_id =$eid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["exam_id"];
										$ename=$row["exam_name"];
										$eyear=$row["exam_year"];
										$etype=$row["exam_type"];
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
								<td>Exam id : </td>
								<td><input type='text' name='eid' size='20' value="<?php echo $id;?>"> </td>
		
							</tr>
							<?php
							}
							?>
			
							<tr>
								<td>Exam Name</td>
								<td><input type="text" name="name" size="20" value="<?php echo $ename;?>"> </td>
		
							</tr>

							<tr>
								<td>Year</td>
								<td><input type="text" name="year" size="20" value="<?php echo $eyear;?>"> </td>
		
							</tr>
		
							
							
							<tr>
								<td align='center' colspan=2>
								
								<input type='submit' name='op' size='20' value='Save'>
								
											
							</tr>
					</form>

							
							
		
							
	
											
							
								
							<tr>
									
									<td colspan="2" align="center">
									<a href="viewcreateex.php">View</a>
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
