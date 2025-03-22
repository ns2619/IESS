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
				
				
				
					
					<form name="frm" id="frm" method="post" action="" onSubmit="return validate_lab();">
					
						
						
						
					<caption><?php
							
							include("connect.php");
									
									$lno="";
											$labstr="";
											$labspl="";
											$id="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["lno1"])){	
							
										$lid=$_POST["lno1"];
										 $sql="SELECT * FROM lab_master WHERE lab_id =$lid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["lab_id"];
										$lno=$row["lab_no"];
										$labstr=$row["lab_strength"];
										$labspl=$row["lab_specialization"];
									}		
							}
						?>
						<?php
						if(isset($_REQUEST['Delete']))
						{
							$sql="delete from lab_master where lab_id='".$_REQUEST['Delete']."'";
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
	$update="update lab_master set lab_no='".$_REQUEST['lno']."',lab_strength='".$_REQUEST['labstr']."',lab_specialization='".$_REQUEST['labspl']."' where lab_id='".$_REQUEST['eid']."'";
	$up=mysqli_query($con,$update);
	header("location:viewlab.php");
}
?>
						
						
						</caption>
						<a href="viewlab.php">View Lab Detail</a><br/>
						<a href="lab.php" >Add Lab Detail</a>
						
						
    
        
        <p>&nbsp;</p>
		
		 <table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
			
			<td align="center">Lab No</td>
			<td align="center">Lab Strength</td>
			<td align="center">Lab Specialization</td>
			
			
			<td width="25%" align="center">Operations</td>
		  </tr>
		  <?php
		  		  $sel="select * from lab_master ORDER BY lab_id ASC";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
		  <tr>
		  
			
			<?php
				if(isset($_REQUEST['eid']))
				{
					if($_REQUEST['eid'] == $ans['lab_id'])
					{
					?>
			
				<td><input type='text' name='lno' size='20' value="<?PHP echo $ans['lab_no']; ?>"></td>
								
					<td><input type='text' name='labstr' size='20' value="<?PHP echo $ans['lab_strength']; ?>"></td>
					<td><input type='text' name='labspl' size='20' value="<?PHP echo $ans['lab_specialization']; ?>"></td>
					
					<td><input type="submit" name="Update" value="Update" />
			<?php
			continue;
					}
				}
			 ?>
			 
			<td align="center"><?PHP echo $ans['lab_no']; ?></td>
			<td align="center"><?PHP echo $ans['lab_strength']; ?></td>
			<td align="center"><?PHP echo $ans['lab_specialization']; ?></td>
			
		
					
			<td align="center"><a href="viewlab.php?eid=<?php echo $ans['lab_id']; ?>">Edit</a>/
			<a href="viewlab.php?Delete=<?php echo $ans['lab_id']; ?>">Delete</a></td>
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
