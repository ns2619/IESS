<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Internal Exam Scheduling System</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body onLoad=document.all["username"].focus()>



<div id="wrapper">
	<?php
	
		include("hedder.php");
	?>
	<!-- end #logo -->
	<div id="page">
		<div id="page-bgtop">
			<center>		<h2 class="title">Login For Exam Co-Ordinator & Faculty Member</h2>
					
					<div class="entry">
							<BR><BR>
							<form name="frm" id="frm" action="checklogin1.php" method="POST">
							  <img src="images/icon_admin.png">
							  
							  <table align="center" border='1' width=300px bgcolor="#EAEAFF" bordercolor="#0000CC">
							
							<tr>
								<td>User Name</td>
								<td><input type="text" name="username" size="20">
								
							</tr>
							<tr>
								<td>Password</td>
								<td><input type="password" name="pwd" size="20"></td>
							</tr>
							<tr>
								<td></td>
								<td><input type="submit" name="login" value="Log In"></td>
							</tr>
	
						</table>
						    
						    </form>
					</div>
			<!-- end #content -->
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
