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
				
				
				
					
					<form name="frm" id="frm" method="post" action="" onSubmit="return validate_subject();">
					
						
						
						
						
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
						
						<?php
						if(isset($_REQUEST['Delete']))
						{
							$sql="delete from sub_master where sub_id='".$_REQUEST['Delete']."'";
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
	$update="update sub_master set course_name='".$_REQUEST['cname']."',sem_no='".$_REQUEST['sem']."',sub_code='".$_REQUEST['scode']."',sub_name='".$_REQUEST['sname']."',sub_type='".$_REQUEST['sype']."' where sub_id='".$_REQUEST['eid']."'";
	$up=mysqli_query($con,$update);
	header("location:viewsub.php");
}
?>
						
						
						</caption>
						<a href="viewsub.php">View Subject Detail</a><br/>
						<a href="subject.php" >Add Subject Detail</a>
						
						
    
        
        <p>&nbsp;</p>
		
		 <table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
			
			
			<td align="center">Course Name</td>
			<td align="center">Sem No</td>
			<td align="center">Subject Code</td>
			<td align="center">Subject Name</td>
			<td align="center">Subject Type</td>
		
			
			<td width="25%" align="center">Operations</td>
		  </tr>
		  <?php
		  		  $sel="select * from sub_master ORDER BY sub_id ASC";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
		  <tr>
		  
			<?php
				if(isset($_REQUEST['eid']))
				{
					if($_REQUEST['eid'] == $ans['sub_id'])
					{
					?>
					
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
					<td><input type="text" name="scode" value="<?PHP echo $ans['sub_code']; ?>" />
								
													
							</td>
							<td><input type="text" name="sname" value="<?PHP echo $ans['sub_name']; ?>" />
								
													
							</td>
					
					<td>
								

								<input type='radio' name='sype' value='Theory' value="<?PHP echo $ans['sub_type']; ?>" > Theory 
							
							    <input type='radio' name='sype' value='Practical' value="<?PHP echo $ans['sub_type']; ?>"> Practical <br/>
								<input type='radio' name='sype' value='Both' value="<?PHP echo $ans['sub_type']; ?>"> Both
							</td>
					
					<td><input type="submit" name="Update" value="Update" />
			<?php
			continue;
					}
				}
			 ?>
			 
			
			<td align="center"><?PHP echo $ans['course_name']; ?></td>
			<td align="center"><?PHP echo $ans['sem_no']; ?></td>
			<td align="center"><?PHP echo $ans['sub_code']; ?></td>
			<td align="center"><?PHP echo $ans['sub_name']; ?></td>
			<td align="center"><?PHP echo $ans['sub_type']; ?></td>
			
		
					
			<td align="center"><a href="viewsub.php?eid=<?php echo $ans['sub_id']; ?>">Edit</a>/
			<a href="viewsub.php?Delete=<?php echo $ans['sub_id']; ?>">Delete</a></td>
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
