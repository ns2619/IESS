<?php
session_start();
?>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<meta http-equiv='content-type' content='text/html; charset=utf-8' />
<title>Internal Exam Scheduling System</title>
<meta name='keywords' content='' />
<meta name='description' content='' />
<link href='style.css' rel='stylesheet' type='text/css' media='screen' />
</head>
<body>


					
					
				<form name="frm" id="frm" method="post" action="viewthexschedulestud.php" >
					
					
					
					
					
					
			

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




<div id="wrapper">
	<?php
	
		include("hedder.php");
	?>
	<!-- end #logo -->
	<div id="page">
		<div id="page-bgtop">
			<div id="content">
				<div class="post">
				
				
				
					
					
					
						
						
						
						
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
						
						
						
						
						
						</caption>
						
						
						
        
        <p>&nbsp;</p>
		
		 <table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
		  
			
			<td width="26%" align="center">Exam Name</td>
			
			
		  </tr>
		  <?php
		  		  $sel="select distinct exam_name from exam_schedule";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
		  <tr>
		  	<td align="center"><a href="viewthschedulestudinfo.php?id=<?php echo $ans['exam_name']; ?> "> <?PHP echo $ans['exam_name']; ?></a></td>
					
			
		  </tr>
		  <?PHP
				  }
				  ?>
		</table>
		
							

					
					<div class="entry">
					</div>
				</div>
			</div>
			<!-- end #content -->
				<?php
					include("sidebar1.php");
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

					
					
					
					
					
					
					
					
					
					
						
						
	