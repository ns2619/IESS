<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Internal Exam Scheduling System</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />

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
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					Student Strength Details</center></font></h2>
					<form name="frm" id="frm" method="post" action="studentdb.php">
						<img src='images/image5.gif' height='400' width='200' hspace="70">
						
						
						<table align='right' border='1' width=400px height=400px bgcolor='#EAEAFF' bordercolor='#0000CC'>
							
								
								<caption><?php
							
							include("connect.php");
									
									$cname="";
									$sem="";
									$year="";
									$rno_from="";
									$rno_to="";
									$tot_stud="";
									$tot_can_stud="";
									$id="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["stud_id1"])){	
							
										$sid=$_POST["stud_id1"];
										 $sql="SELECT * FROM stud_strength_master WHERE stud_id =$sid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["stud_id"];
										$cname=$row["course_name"];
										$sem=$row["sem_no"];
										$year=$row["year"];
										$rno_from=$row["roll_no_from"];;
										$rno_to=$row["roll_no_to"];;
										$tot_stud=$row["total_stud"];;
										$tot_can_stud=$row["total_cancel_stud"];;
										
									}		
							}
						?>
						</caption>
						<tr>
								<td align="center" colspan=2>For Save Data</td>
								
		
							</tr>
							
			
							<?php
							if(isset($_POST["stud_id1"])){
							?>
							
							<tr>
								<td>Student id : </td>
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
								
								echo "<option value='select'> Select Course";
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
								<td>Year </td>
								<td><input type="text" name="year" size="20" value="<?php echo $year;?>"> </td>
		
							</tr>
		
							<tr>
								<td>Roll No From</td>
								<td><input type="text" name="stroll" size="20" value="<?php echo $rno_from;?>"> </td>
		
							</tr>
							<tr>
								<td>Roll No To</td>
								<td><input type="text" name="enroll" size="20" value="<?php echo $rno_to;?>"> </td>
		
							</tr>
							
			
		
							
							<tr>
								<td align='center' colspan=2>
								
								<input type='submit' name='op' size='20' value='Save'>
								
												
							</tr>
					</form>
	
							
								<tr>
									
									<td colspan="2" align="center">
									<a href="viewstudstrength.php">View</a>
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
