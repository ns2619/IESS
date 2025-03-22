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
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					Result Arrangement</center></font></h2>
					<form name='frmsub' id='frmsub' method='post' onSubmit="return validate_result();" action='resultdb.php'>
					<img src='images/resultpic.png' height='400' width='200' hspace="70">
						
						<table align='right' border='1' width=400px height=400px bgcolor='#EAEAFF' bordercolor='#0000CC'>
							
							<caption><?php
							
							include("connect.php");
									
									$id="";
									$result_name="";
									
											
											$roll_no="";
											$result_status="";
											
								
							if(isset($_REQUEST["msg"]))
							echo $_REQUEST["msg"];
							if(isset($_POST["result_name"])){	
							
										$rid=$_POST["result_name"];
										 $sql="SELECT * FROM result WHERE result_id =$rid";
											$res=mysqli_query($con,$sql);
								    	while($row=mysqli_fetch_assoc($res)){
									 	$result_id=$row["result_id"];
										$result_name=$row["result_name"];
										
										$roll_no=$row["roll_no"];
										$result_status=$row["result_status"];
										
									}		
							}
						?>
						</caption>

							
							
							
							
							
							
							<tr>
								<td align='center' colspan=2>For Save Data</td>
								
		
							</tr>
							
							<?php
							if(isset($_POST["result_name"])){
							?>
							<tr>
								<td>Result id : </td>
								<td><input type='text' name='rid' size='20' value="<?php echo $result_id;?>"> </td>
		
							</tr>
							<?php
							}
							?>
							<tr>
								<td>Result Name</td>
								<td><input type="text" name="result_name" value="<?php echo $result_name;?>"> </td>
		
							</tr>
							
							
							
							
							
							
							<tr>
								<td>Enter Roll No </td>
								<td><input type='text' id="roll_no" name='roll_no' size='20' value="<?php echo $roll_no;?>"> </td>
								
									
							</tr>
							
							
		
							
							<tr>
								<td>Result </td>
								<td>
								

								<input type='radio' name='result_status' value='pass' value="<?php echo $result_status;?>" > Pass 
							    <input type='radio' name='result_status' value='fail' value="<?php echo $result_status;?>"> Fail
								
							</td>
							</tr>
							
							<tr>
								<td align='center' colspan=2>
								
								<input type='submit' name='op' size='20' value='Save'>
								
									
								
								
							</tr>
					</form>
							<tr>
									
									<td colspan="2" align="center">
									<a href="viewresult.php">View</a>
									</td>
									</tr>
							
	
							

						</table>
					</form>
					
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