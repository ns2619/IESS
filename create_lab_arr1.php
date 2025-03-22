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






<script type="text/javascript" src="images/jsdatepick-calendar/jsDatePick.min.1.3.js"> </script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"> </script>
        <script type="text/javascript" src="images/FancySlidingForm/sliding.form.js"> </script>
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
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Lab Arrangement</center></font></h2>
					<form name="frm" id="frm" method="post" action="create_lab_arrdb1.php">
					<img src='images/orange-man-cartoon-on-computer_medium.jpeg' height='400' width='200' hspace="70">
						
						<table align='right' border='1' width=400px height=400px bgcolor='#EAEAFF' bordercolor='#0000CC'>
						
						<caption><?php
							
							include("connect.php");
									
									$ename="";
									$bname="";
											$cname="";
											$sem="";
										$lno="";
										
											$rnot="";
											$rnof="";
											$totstud="";
											$id="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["ename1"])){	
							
										$lid=$_POST["ename1"];
										 $sql="SELECT * FROM batch_master WHERE batch_id =$bid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["batch_id"];
										$ename=$row["exam_name"];
										$bname=$row["batch_name"];
										
										$cname=$row["course_name"];
										$sem=$row["sem_no"];
										$lno=$row["lab_no"];
									
										$rnof=$row["rno_from"];
										$rnot=$row["rno_to"];
										$totstud=$row["total_stud"];
										
									}		
							}
						?>
						</caption>
							

							
							
							
						
						

							<tr>
								<td align="center" colspan=2>For Save Data</td>
								
		
							</tr>
							
							
							<tr>
								<td>Exam Name </td>
								<td>
								<select name='ename' id='ename'>

								<?php
								
								include("connect.php");
								$q1="select * from exam_info_master";
								$result=mysqli_query($con,$q1);
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[exam_name]'> $row[exam_name]</option>";
						
								}
								?>

								</select>
								
													
							
								</td>
		
							</tr>
							
			
							<tr>
								<td>Batch Name</td>
								<td><input type='text'  name='bname' size='20' value="<?php echo $bname;?>"> </td> </td>
								
							</td>
							 
		
							</tr>
							
							
							
							<tr>
								<td> Select Course Name </td>
								<td>
								<select name='cname' id='course' onChange='javascript:GetXMLHttpRequest();updaterec();'>

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
								<td> Lab No </td>
								<td>
								<select name='lno' id='lno'>

								<?php
								
								include("connect.php");
								$q1="select * from lab_master";
								$result=mysqli_query($con,$q1);
								
								echo "<option value='select'> Select lab No";
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[lab_no]'> $row[lab_no]</option>";
						
								}
								?>
								
								

								</select>
								
								
								
										 
		

								
													
							
								</td>
					
							</tr>
							
					
		
							
							
							
							
							<tr>
								<td>Roll No From</td>
								<td><input type='text'  name='rnof' size='20' value="<?php echo $rnof;?>"> </td>
								
							
		
							</tr>

							<tr>
								<td>Roll No To </td>
								<td> <input type='text'  name='rnot' size='20' value="<?php echo $rnot;?>"> </td>
								
							
		
							</tr>
							
							<tr>
								<td>Total Students </td>
								<td><input type="text" name="totstud" size="20" value="<?php echo $totstud;?>"> </td>
		
							</tr>
							
							
							
							
							
							
		
							<tr>
								
								<td align="center" colspan=2><input type="submit" name="op" size="20" value="Save"> </td>
								</tr>

							<tr>
									
									<td colspan="2" align="center">
									<a href="viewlabarr1.php">View</a>
									</td>
									</tr>

	

						</table>
					</form>
					<div class="entry">
					</div>
				</div>
			</div>
			<!-- end #content -->
				<?php
					include("exam_co_ordinator_sidebar2.php");
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
