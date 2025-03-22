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
						<?php
						if(isset($_REQUEST['Delete']))
						{
							$sql="delete from batch_master where batch_id='".$_REQUEST['Delete']."'";
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
	$update="update batch_master set exam_name='".$_REQUEST['ename']."',batch_name='".$_REQUEST['bname']."',course_name='".$_REQUEST['cname']."',sem_no='".$_REQUEST['sem']."',lab_no='".$_REQUEST['lno']."',rno_from='".$_REQUEST['rnof']."',rno_to='".$_REQUEST['rnot']."',total_stud='".$_REQUEST['totstud']."' where batch_id='".$_REQUEST['eid']."'";
	$up=mysqli_query($con,$update);
	header("location:viewlabarr1.php");
}
?>
						
						
						</caption>
						<a href="viewlabarr1.php">View Lab Arrangement</a><br/>
						<a href="create_lab_arr1.php" >Create Lab Arrangement</a>
						
						
    
        
        <p>&nbsp;</p>
		
		 <table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
			
			<td align="center">Exam Name</td>
			<td align="center">Batch Name</td>
			<td align="center">Course Name</td>
			<td align="center">Sem No</td>
			<td align="center">Lab No</td>
			
			<td align="center">Start Roll No</td>
			<td align="center">End Roll No</td>
			<td align="center">Total Students</td>
			
			<td width="25%" align="center">Operations</td>
		  </tr>
		  <?php
		  		  $sel="select * from batch_master ORDER BY batch_id ASC";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
		  <tr>
		 
			
			<?php
				if(isset($_REQUEST['eid']))
				{
					if($_REQUEST['eid'] == $ans['batch_id'])
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

								</select></td>
					<td><input size="5"type="text" name="bname" value="<?PHP echo $ans['batch_name']; ?>" /></td>
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
								
								

								</select>
								
								</td>
					<td id='ajex'>
								
								
							
								
								
									
								</td>
					<td><select name='lno' id='lno'>

								<?php
								
								include("connect.php");
								$q1="select * from lab_master";
								$result=mysqli_query($con,$q1);
								
								
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[lab_no]'> $row[lab_no]</option>";
						
								}
								?>
								
								

								</select>
								</td>
					
					<td><input size="2" type="text" name="rnof" value="<?PHP echo $ans['rno_from']; ?>" /></td>
					<td><input size="2" type="text" name="rnot" value="<?PHP echo $ans['rno_to']; ?>" /></td>
					<td><input size="2" type="text" name="totstud" value="<?PHP echo $ans['total_stud']; ?>" /></td>
					<td><input type="submit" name="Update" value="Update" />
			<?php
			continue;
					}
				}
			 ?>
			 
			<td align="center"><?PHP echo $ans['exam_name']; ?></td>
			<td align="center"><?PHP echo $ans['batch_name']; ?></td>
			<td align="center"><?PHP echo $ans['course_name']; ?></td>
			<td align="center"><?PHP echo $ans['sem_no']; ?></td>
			<td align="center"><?PHP echo $ans['lab_no']; ?></td>
			
			<td align="center"><?PHP echo $ans['rno_from']; ?></td>
			<td align="center"><?PHP echo $ans['rno_to']; ?></td>
			<td align="center"><?PHP echo $ans['total_stud']; ?></td>
		
					
			<td align="center"><a href="viewlabarr1.php?eid=<?php echo $ans['batch_id']; ?>">Edit</a>/
			<a href="viewlabarr1.php?Delete=<?php echo $ans['batch_id']; ?>">Delete</a></td>
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
