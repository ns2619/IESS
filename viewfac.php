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
				
				
				
					
					<form name="frm" id="frm" method="post" action="" onSubmit="return validate_fac(this.form);">
					
						
						
						
						
						<caption><?php
							
							include("connect.php");
									
									$fname="";
									$id="";
									$gen="";
									$mno="";
									$doj="";
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["fname1"])){	
							
										$fid=$_POST["fname1"];
										 $sql="SELECT * FROM faculty_master WHERE fac_id =$fid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$id=$row["fac_id"];
										$fname=$row["fac_name"];
										$gen=$row["gender"];
										$mno=$row["mobile_no"];
										$doj=$row["date_of_join"];
										
										
									}		
							}
						?>
						
						<?php
						if(isset($_REQUEST['Delete']))
						{
							$sql="delete from faculty_master where fac_id='".$_REQUEST['Delete']."'";
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
	$update="update faculty_master set fac_name='".$_REQUEST['fname']."',gender='".$_REQUEST['gen']."',mobile_no='".$_REQUEST['mno']."',date_of_join='".$_REQUEST['doj']."' where fac_id='".$_REQUEST['eid']."'";
	$up=mysqli_query($con,$update);
	header("location:viewfac.php");
}
?>
						
						
						</caption>
						<a href="viewfac.php">View Faculty Detail</a><br/>
						<a href="faculty_data.php" >Add Faculty Detail</a>
						
						
    
        
        <p>&nbsp;</p>
	
		 <table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
			
			<td align="center">Faculty Name</td>
			<td align="center">Gender</td>
			<td align="center">Mobile No</td>
			
			
			<td width="25%" align="center">Operations</td>
		  </tr>
		  <?php
		  		  $sel="select * from faculty_master ORDER BY fac_id ASC";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
		  <tr>
		  
			
			<?php
				if(isset($_REQUEST['eid']))
				{
					if($_REQUEST['eid'] == $ans['fac_id'])
					{
					?>
				<td><input type="text" name="fname" size="20" value="<?PHP echo $ans['fac_name']; ?>" > </td>
				<td><input type="radio" name="gen" id="ge" value="Male" value="<?PHP echo $ans['gender']; ?>"> Male
					<input type="radio" name="gen" id="ge" value="female" value="<?PHP echo $ans['gender']; ?>"> Female  </td>
								
					<td><input type="text" name="mno" id="mno" size="20" value="<?PHP echo $ans['mobile_no']; ?>"></td>
					

								
					
					
					<td><input type="submit" name="Update" value="Update" />
			<?php
			continue;
					}
				}
			 ?>
			 
			<td align="center"><?PHP echo $ans['fac_name']; ?></td>
			<td align="center"><?PHP echo $ans['gender']; ?></td>
			<td align="center"><?PHP echo $ans['mobile_no']; ?></td>
			
			
		
					
			<td align="center"><a href="viewfac.php?eid=<?php echo $ans['fac_id']; ?>">Edit</a>/
			<a href="viewfac.php?Delete=<?php echo $ans['fac_id']; ?>">Delete</a></td>
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
