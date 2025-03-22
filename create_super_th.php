<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="form_validation.js"></script>
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
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					
					
					Supervision Schedule For Theory Exam</center></font></h2>
					<form name="frm" id="frm" method="post" action="create_super_thdb.php" onSubmit="return validate_create_texam_super_schedule();">
					<img src='images/images.jpg' height='400' width='200' hspace="70">
						
						<table align='right' border='1' width=400px height=400px bgcolor='#EAEAFF' bordercolor='#0000CC'>

							<caption><?php
							
							include("connect.php");
									
									$ename="";
									$edate="";
											$fname="";
											
										$bno="";
										$rno="";
											$timet="";
											$timef="";
											$rfname="";
											$id="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["ename1"])){	
							
										$lid=$_POST["ename1"];
										 $sql="SELECT * FROM supervision_schedule WHERE sup_id =$sid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["sup_id"];
										$ename=$row["exam_name"];
										$edate=$row["exam_date"];
										
										$fname=$row["fac_name"];
										$bno=$row["block_no"];
										$rno=$row["room_no"];
									
										$timef=$row["time_from"];
										$timet=$row["time_to"];
										$rfname=$row["reliever_fac_name"];
										
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
								<td>Exam Date </td>
								<td>
								<select name='edate' id='edate'>

								<?php
								
								include("connect.php");
								$q1="select * from exam_schedule";
								$result=mysqli_query($con,$q1);
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[exam_date]'> $row[exam_date]</option>";
						
								}
								?>

								</select>
								
													
							
								</td>
		
							</tr>
							
							
							<tr>
								<td>Faculty Name </td>
								<td>
								<select name='fname' id='fname'>

								<?php
								
								include("connect.php");
								$q1="select * from faculty_master";
								$result=mysqli_query($con,$q1);
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[fac_name]'> $row[fac_name]</option>";
						
								}
								?>

								</select>
								
													
							
								</td>
		
							</tr>
							
							<tr>
								<td> Block No </td>
								<td>
								<select name='bno' id='bno' >

								<?php
								
								include("connect.php");
								$q1="select * from block_master";
								$result=mysqli_query($con,$q1);
								
								echo "<option value='select'> Select Block No";
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[block_no]'> $row[block_no]</option>";
						
								}
								?>
								
								

								</select>
								
								
								
										 
		

								
													
							
								</td>
					
							</tr>
		
							<tr>
								<td> Room No </td>
								<td>
								<select name='rno' id='rno' >

								<?php
								
								include("connect.php");
								$q1="select * from block_master";
								$result=mysqli_query($con,$q1);
								
								echo "<option value='select'> Select Room No";
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[room_no]'> $row[room_no]</option>";
						
								}
								?>
								
								

								</select>
								
								
								
										 
		

								
													
							
								</td>
					
							</tr>
							
							<tr>
								<td>Time From </td>
								<td>
								
								<select name='timef' id='timef' >

								 <option value='1:00 PM'>1:00 PM</option>
								<option value='1:30 PM'>1:30 PM</option>
								<option value='2:00 PM'>2:00 PM</option>
								<option value='2:30 PM'>2:30 PM</option>
								<option value='3:00 PM'>3:00 PM</option>
								<option value='3:30 PM'>3:30 PM</option>
								<option value='4:00 PM'>4:00 PM</option>
								<option value='4:30 PM'>4:30 PM</option>
								<option value='5:00 PM'>5:00 PM</option>
								<option value='5:30 PM'>5:30 PM</option>
								<option value='6:00 PM'>6:00 PM</option>
								<option value='6:30 PM'>6:30 PM</option>
								<option value='7:00 AM'>7:00 AM</option>
								<option value='7:30 AM'>7:30 AM</option>
								<option value='8:00 AM'>8:00 AM</option>
								<option value='8:30 AM'>8:30 AM</option>
								<option value='9:00 AM'>9:00 AM</option>
								<option value='9:30 AM'>9:30 AM</option>
								<option value='10:00 AM'>10:00 AM</option>
								<option value='10:30 AM'>10:30 AM</option>
								<option value='11:00 AM'>11:00 AM</option>
								<option value='11:30 AM'>11:30 AM</option>
								<option value='12:00 AM'>12:00 AM</option>
								<option value='12:30 pM'>12:30 PM</option>
								
								
								 </td>
		
							</tr>
							
							<tr>
								<td>Time To </td>
								<td><select name='timet' id='timet' >

								 <option value='1:00 PM'>1:00 PM</option>
								<option value='1:30 PM'>1:30 PM</option>
								<option value='2:00 PM'>2:00 PM</option>
								<option value='2:30 PM'>2:30 PM</option>
								<option value='3:00 PM'>3:00 PM</option>
								<option value='3:30 PM'>3:30 PM</option>
								<option value='4:00 PM'>4:00 PM</option>
								<option value='4:30 PM'>4:30 PM</option>
								<option value='5:00 PM'>5:00 PM</option>
								<option value='5:30 PM'>5:30 PM</option>
								<option value='6:00 PM'>6:00 PM</option>
								<option value='6:30 PM'>6:30 PM</option>
								<option value='7:00 AM'>7:00 AM</option>
								<option value='7:30 AM'>7:30 AM</option>
								<option value='8:00 AM'>8:00 AM</option>
								<option value='8:30 AM'>8:30 AM</option>
								<option value='9:00 AM'>9:00 AM</option>
								<option value='9:30 AM'>9:30 AM</option>
								<option value='10:00 AM'>10:00 AM</option>
								<option value='10:30 AM'>10:30 AM</option>
								<option value='11:00 AM'>11:00 AM</option>
								<option value='11:30 AM'>11:30 AM</option>
								<option value='12:00 AM'>12:00 AM</option>
								<option value='12:30 pM'>12:30 PM</option>
								

								</select>
								 </td>
		
							</tr>
							
							<tr>
								<td>Reliever Faculty Name </td>
								<td>
								<select name='rfname' id='rfname'>

								<?php
								
								include("connect.php");
								$q1="select * from faculty_master";
								$result=mysqli_query($con,$q1);
								echo "<option value='select'>Faculty";
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[fac_name]'> $row[fac_name]</option>";
						
								}
								?>

								</select>
								
													
							
								</td>
		
							</tr>
							
							<tr>
								<td align='center' colspan=2>
								
								<input type='submit' name='op' size='20' value='Save'>
								
											
							</tr>
					</form>

		
							

							
								
								
									<tr>
									
									<td colspan="2" align="center">
									<a href="viewsupertschedule.php">View</a>
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
