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
											$bno="";
											$rno="";
											$rnot="";
											$rnof="";
											$totstud="";
											$id="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["ename1"])){	
							
										$lid=$_POST["ename1"];
										 $sql="SELECT * FROM block_arrange WHERE b_id =$bid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["b_id"];
										$ename=$row["exam_name"];
										$cname=$row["course_name"];
										$sem=$row["sem_no"];
										$bno=$row["block_no"];
										$rno=$row["room_no"];
										$rnof=$row["roll_no_from"];
										$rnot=$row["roll_no_to"];
										$totstud=$row["total_stud"];
										
									}		
							}
						?>
						
							

							
						<?php
						if(isset($_REQUEST['Delete']))
						{
							$sql="delete from block_arrange where b_id='".$_REQUEST['Delete']."'";
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
	$update="update block_arrange set exam_name='".$_REQUEST['ename']."',course_name='".$_REQUEST['cname']."',sem_no='".$_REQUEST['sem']."',block_no='".$_REQUEST['bno']."',room_no='".$_REQUEST['rno']."',roll_no_from='".$_REQUEST['rnof']."',roll_no_to='".$_REQUEST['rnot']."',total_stud='".$_REQUEST['totstud']."' where b_id='".$_REQUEST['eid']."'";
	$up=mysqli_query($con,$update);
	header("location:viewblockarrange.php");
}
?>
						
						
			</caption>
						<a href="viewblockarrange.php">View Block Arrangement</a><br/>
						<a href="create_block_arr.php" >Create Block Arrangement</a>
						
						
    
        
        <p>&nbsp;</p>
		
		 <table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
			
			<td align="center">Exam Name</td>
			<td align="center">Course Name</td>
			<td align="center">Sem No</td>
			<td align="center">Block No</td>
			<td align="center">Room No</td>
			<td align="center">Start Roll No</td>
			<td align="center">End Roll No</td>
			<td align="center">Total Students</td>
			
			<td width="25%" align="center">Operations</td>
		  </tr>
		  <?php
		  		  $sel="select * from block_arrange ORDER BY b_id ASC";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
		  <tr>
		  	
			
			<?php
				if(isset($_REQUEST['eid']))
				{
					if($_REQUEST['eid'] == $ans['b_id'])
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
					<td id='ajex'</td>
					<td>
					<select name='bno' id='bno' onChange='javascript:GetXMLHttpRequest();updaterec();'>

								<?php
								
								include("connect.php");
								$q1="select * from block_master";
								$result=mysqli_query($con,$q1);
								
							
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[block_no]'> $row[block_no]</option>";
						
								}
								?>
								
								

								</select>
								</td>
					<td><select name='rno' id='rno' >

								<?php
								
								include("connect.php");
								$q1="select * from block_master";
								$result=mysqli_query($con,$q1);
								
								
								while($row=mysqli_fetch_array($result))
								{
								echo "<option value='$row[room_no]'> $row[room_no]</option>";
						
								}
								?>
								
								

								</select>
								</td>
					<td><input size="2" type="text" name="rnof" value="<?PHP echo $ans['roll_no_from']; ?>" /></td>
					<td><input size="2" type="text" name="rnot" value="<?PHP echo $ans['roll_no_to']; ?>" /></td>
					<td><input size="2" type="text" name="totstud" value="<?PHP echo $ans['total_stud']; ?>" /></td>
					<td><input type="submit" name="Update" value="Update" />
			<?php
			continue;
					}
				}
			 ?>
			 
			<td align="center"><?PHP echo $ans['exam_name']; ?></td>
			<td align="center"><?PHP echo $ans['course_name']; ?></td>
			<td align="center"><?PHP echo $ans['sem_no']; ?></td>
			<td align="center"><?PHP echo $ans['block_no']; ?></td>
			<td align="center"><?PHP echo $ans['room_no']; ?></td>
			<td align="center"><?PHP echo $ans['roll_no_from']; ?></td>
			<td align="center"><?PHP echo $ans['roll_no_to']; ?></td>
			<td align="center"><?PHP echo $ans['total_stud']; ?></td>
		
					
			<td align="center"><a href="viewblockarrange.php?eid=<?php echo $ans['b_id']; ?>">Edit</a>/
			<a href="viewblockarrange.php?Delete=<?php echo $ans['b_id']; ?>">Delete</a></td>
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
