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
<script>
	
	
// handling ajax response
function handleHttpResponse()
{
	if(httpxx.readyState == 4)
	{
		if(httpxx.status == 200)
		{
			var result=httpxx.responseText;
			
			document.getElementById("ajex").innerHTML=result;
		}
	}
}
//var url="showrec.phpinm=";
function updaterec()
{
	var inm=document.getElementById("course").value
	
	httpxx.open("POST" ,"showsem.php?course="+inm,true);
	httpxx.onreadystatechange =handleHttpResponse;
	httpxx.send(null);

}

// make ajax request
function GetXMLHttpRequest()
{
	var object=null;
	if(window.XMLHttpRequest)
	{
		object=new XMLHttpRequest();
	}
	else if(window.ActiveXObject)
	{
		try
		{
			object=new ActiveXObject("MSXML2.XMLHTTP");
		}
		catch(e)
		{
		}
		if(object==null)
		{
			try
			{
				object=new ActiveXobject("Microsoft.XMLHTTP");
			}
			catch(e)
			{
			}
}
	}
	if(object==null)
	{
		alert("your Window Not Support Ajax")
	}
	return(object)

}
var httpxx = GetXMLHttpRequest();
</script>
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
					
					<h2 class='title'><font color="#0099FF"><center>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					Subject Details
					
					</center></font></h2>
					<form name='frmsub' id='frmsub' method='post' onSubmit="return validate_subject();" action='subdb.php'>
					<img src='images/web_coding_collage.jpg' height='400' width='200' hspace="70">
						
						<table align='right' border='1' width=400px height=400px bgcolor='#EAEAFF' bordercolor='#0000CC'>
							
							<caption><?php
							
							include("connect.php");
									
									$id="";
									$cname="";
											$sem="";
											
											
											$scode="";
											$sname="";
											$stype="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["sub_code1"])){	
							
										$sid=$_POST["sub_code1"];
										 $sql="SELECT * FROM sub_master WHERE sub_id =$sid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["sub_id"];
										$cname=$row["course_name"];
										$sem=$row["sem_no"];
										$scode=$row["sub_code"];
										$sname=$row["sub_name"];
										$sype=$row["sub_type"];
									}		
							}
						?>
						</caption>

							
							
							
							
							
							
							<tr>
								<td align='center' colspan=2>For Save Data</td>
								
		
							</tr>
							
							<?php
							if(isset($_POST["sub_code1"])){
							?>
							<tr>
								<td>Subject id : </td>
								<td><input type='text' name='sid' size='20' value="<?php echo $id;?>"> </td>
		
							</tr>
							<?php
							}
							?>
							<tr>
								<td> Select Course Name </td>
								<td>
								<select name='course' id='course' onChange='javascript:GetXMLHttpRequest();updaterec();'>

								<?php
								
								include("connect.php");
								$q1="select * from course_master";
								$result=mysqli_query($con,$q1);
								
								echo "<option value='select course'> Select Course";
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[course_name]'> $row[course_name]</option>";
						
								}
								?>
								
								

								</select>
								
								
								
										 
		

								
													
							
								</td>
					
							</tr>

							<tr>
								<td> Sem No </td>
								<td id='ajex'>
								
								
							
								
								
									
								</td>

							</tr>
							
							
							
							<tr>
								<td>Subject Code </td>
								<td><input type='text' id="subcode" name='subcode' size='20' value="<?php echo $scode;?>"> </td>
								
									
							</tr>
							
							
		
							<tr>
								<td>Subject Name </td>
								<td><input type='text' id="subname" name='subname' size='20' value="<?php echo $sname;?>"> </td>
		
							</tr>
							<tr>
								<td>Subject Type </td>
								<td>
								

								<input type='radio' name='subtype' value='Theory' value="<?php echo $stype;?>" > Theory 
							    <input type='radio' name='subtype' value='Practical' value="<?php echo $stype;?>"> Practical<br>
								<input type='radio' name='subtype' value='Both' value="<?php echo $stype;?>"> Both
							</td>
							</tr>
							
							<tr>
								<td align='center' colspan=2>
								
								<input type='submit' name='op' size='20' value='Save'>
								
									
								
								
							</tr>
					</form>
							<tr>
									
									<td colspan="2" align="center">
									<a href="viewsub.php">View</a>
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