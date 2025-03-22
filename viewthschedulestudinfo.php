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


					
					
				<form name="frm" id="frm" method="post" action="viewthschedulestudinfo.php" >
					
					
					
					
					
					
			

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
				
				
				
					
					
					
						
						


<table> 
 <?php
 
 	include("connect.php");
	
	


   ?>
   <p>&nbsp;</p>
	
	<table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
			
			   		
					<td  align="center">Course Name</td>
			<td align="center">Sem No</td>
			<td align="center">Subject Code</td>
				
			<td align="center">Exam Date</td>
			<td align="center">Time From</td>
			<td align="center">Time To</td>
					
					  <tr>
	<?php	  
     $id1=$_REQUEST['id'];
	
	 
    
		  		  $sel="select * from exam_schedule where exam_name='$id1'";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
			
			
			<td align="center"><?PHP echo $ans['course_name']; ?></td>
			<td align="center"><?PHP echo $ans['sem_no']; ?></td>
			<td align="center"><?PHP echo $ans['sub_code']; ?></td>
			<td align="center"><?PHP echo $ans['exam_date']; ?></td>
			<td align="center"><?PHP echo $ans['time_from']; ?></td>
			<td align="center"><?PHP echo $ans['time_to']; ?></td>
		
					
			
		  </tr>
		
			
		 <?php
				  }
?>
</tr>
</table>
<br>
<br>
<a href="DownloadSchedule.php?id=<?php echo $id1;?>">Download</a>
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
