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
				
				
				
					
					<form name="frm" id="frm" method="post" action="" onsubmit="return validate();">
					
						
						
						
						
						<caption><?php
							
							include("connect.php");
									
									$ename="";
											$cname="";
											$sem="";
											$scode="";
											$edate="";
											$tfrom="";
											$tto="";
											$id="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["ename1"])){	
							
										$lid=$_POST["ename1"];
										 $sql="SELECT exam_name,course_name,sem_no,sub_code,exam_date,time_from,time_to FROM exam_schedule WHERE exam_schedule_id =$eid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["exam_schedule_id"];
										$ename=$row["exam_name"];
										$cname=$row["course_name"];
										$sem=$row["sem_no"];
										$scode=$row["sub_code"];
										$edate=$row["exam_date"];
										$tfrom=$row["time_from"];
										$tto=$row["time_to"];
									}		
							}
						?>
						
						<?php
						if(isset($_REQUEST['Delete']))
						{
							$sql="delete from exam_schedule where exam_schedule_id='".$_REQUEST['Delete']."'";
							$i=mysqli_query($con,$sql);
							$msg="";
							if($i>0){
									$msg="Delete SuccessFully";
									}
							else
							{
									$msg="Delete Not SuccessFully";
							}		
										
						}
						
						
						?>
						
						<?php
						
						if(isset($_REQUEST['Update']))
{
	$update="update exam_schedule set exam_name='".$_REQUEST['ename']."',course_name='".$_REQUEST['cname']."',sem_no='".$_REQUEST['sem']."',sub_code='".$_REQUEST['scode']."',exam_date='".$_REQUEST['edate']."',time_from='".$_REQUEST['tfrom']."',time_to='".$_REQUEST['tto']."' where exam_schedule_id='".$_REQUEST['eid']."'";
	$up=mysqli_query($con,$update);
	header("location:viewextschedule.php");
}
?>
						
						
						</caption>
						<a href="viewextschedule.php">View Exam Schedule</a><br/>
						<a href="create_theory_ex_schedule.php" >Add Exam Schedule</a>
						
						
    
        
        <p>&nbsp;</p>
		
		 <table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
			
			<td align="center">Exam Name</td>
			<td align="center">Course Name</td>
			<td align="center">Sem No</td>
			<td align="center">Subject Code</td>
			<td align="center">Exam Date</td>
			<td align="center">Time From</td>
			<td align="center">Time To</td>
			
			<td width="25%" align="center">Operations</td>
		  </tr>
		  <?php
		  		  $sel="select * from exam_schedule ORDER BY exam_schedule_id ASC";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
		  <tr>
		  	
			
			<?php
				if(isset($_REQUEST['eid']))
				{
					if($_REQUEST['eid'] == $ans['exam_schedule_id'])
					{
					?>
					<td><select name='ename' id='ename'>

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
					<td><select name='cname' id='course' onChange='javascript:GetXMLHttpRequest();updaterec();'>

								<?php
								
								include("connect.php");
								$q1="select * from course_master";
								$result=mysqli_query($con,$q1);
								
							
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[course_name]'> $row[course_name]</option>";
						
								}
								?>
								
								

								</select></td>
					<td id='ajex'></td>
					<td><select name='scode' id='subcode' >
					

								<?php
								
								include("connect.php");
								$q1="select * from sub_master where sub_type='theory' or sub_type='both'";
								$result=mysqli_query($con,$q1);
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[sub_code]'> $row[sub_code]</option>";
						
								}
								?>

								</select>
								
													
							</td>
					<td><input size="15" id="cdt" name="edate" SIZE=25 value="<?PHP echo $ans['exam_date']; ?>" /></td>
					<td><select name='tfrom' id='timef' >

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
						
								

								</select></td>
					<td><select name='tto' id='timet' >

							
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

								</select></td>
					<td><input type="submit" name="Update" value="Update" />
			<?php
			continue;
					}
				}
			 ?>
			 
			<td align="center"><?PHP echo $ans['exam_name']; ?></td>
			<td align="center"><?PHP echo $ans['course_name']; ?></td>
			<td align="center"><?PHP echo $ans['sem_no']; ?></td>
			<td align="center"><?PHP echo $ans['sub_code']; ?></td>
			<td align="center"><?PHP echo $ans['exam_date']; ?></td>
			<td align="center"><?PHP echo $ans['time_from']; ?></td>
			<td align="center"><?PHP echo $ans['time_to']; ?></td>
		
					
			<td align="center"><a href="viewextschedule.php?eid=<?php echo $ans['exam_schedule_id']; ?>">Edit</a>/
			<a href="viewextschedule.php?Delete=<?php echo $ans['exam_schedule_id']; ?>">Delete</a></td>
		  </tr>
		  <?PHP
				  }
				  ?>
		</table>
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
