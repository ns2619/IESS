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
					
		
						<?php
						if(isset($_REQUEST['Delete']))
						{
							$sql="delete from stud_strength_master where stud_id='".$_REQUEST['Delete']."'";
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
	$update="update stud_strength_master set course_name='".$_REQUEST['cname']."',sem_no='".$_REQUEST['sem']."',year='".$_REQUEST['year']."',roll_no_from='".$_REQUEST['rno_from']."',roll_no_to='".$_REQUEST['rno_to']."',total_stud='".$_REQUEST['tot_stud']."',total_cancel_stud='".$_REQUEST['tot_can_stud']."' where stud_id='".$_REQUEST['eid']."'";
	$up=mysqli_query($con,$update);
	header("location:viewstudstrength.php");
}
?>
						
						
						</caption>
						<a href="viewstudstrength.php">View Student Strength Detail</a><br/>
						<a href="student.php" >Add Student Strength Detail</a>
						
						
    
        
        <p>&nbsp;</p>
		
		 <table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
			
			<td align="center">Course Name</td>
			<td align="center">Sem No</td>
			<td align="center">Year</td>
			<td align="center">Start Roll No</td>
			<td align="center">End Roll No</td>
			
			<td width="25%" align="center">Operations</td>
		  </tr>
		  <?php
		  		  $sel="select * from stud_strength_master ORDER BY stud_id ASC";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
		  <tr>
		  
			
			<?php
				if(isset($_REQUEST['eid']))
				{
					if($_REQUEST['eid'] == $ans['stud_id'])
					{
					?>
					
					<td><select width="5" name='cname' id='course' onChange='javascript:GetXMLHttpRequest();updaterec();'>

								<?php
								
								include("connect.php");
								$q1="select * from course_master";
								$result=mysqli_query($con,$q1);
								
							
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[course_name]'> $row[course_name]</option>";
						
								}
								?>
								
								

								</select>
								</td>
					<td id='ajex'>
								
								
							
								
								
									
								</td>
					<td><input type="text" name="year" value="<?PHP echo $ans['year']; ?>" /></td>
					<td><input size="2" type="text" name="rno_from" value="<?PHP echo $ans['roll_no_from']; ?>" /></td>
					<td><input size="2" type="text" name="rno_to" value="<?PHP echo $ans['roll_no_to']; ?>" /></td>
					
					<td><input size="2" type="submit" name="Update" value="Update" />
			<?php
			continue;
					}
				}
			 ?>
			
			
			<td align="center"><?PHP echo $ans['course_name']; ?></td>
			<td align="center"><?PHP echo $ans['sem_no']; ?></td>
			<td align="center"><?PHP echo $ans['year']; ?></td>
			<td align="center"><?PHP echo $ans['roll_no_from']; ?></td>
			<td align="center"><?PHP echo $ans['roll_no_to']; ?></td>
			
		
					
			<td align="center"><a href="viewstudstrength.php?eid=<?php echo $ans['stud_id']; ?>">Edit</a>/
			<a href="viewstudstrength.php?Delete=<?php echo $ans['stud_id']; ?>">Delete</a></td>
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
