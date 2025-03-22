<?php
session_start();
?>
<table> 
 <?php
 

header("Content-Type: application/vnd.ms-word"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=LabArrangement.doc");
 
 
 	include("connect.php");
	
   ?>
   <p>&nbsp;</p>
	
	<table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
			
			   		
					<td align="center">Roll No</td>
			   		
					<td align="center">Result</td>
			
					  <tr>
	<?php	  
     $id1=$_REQUEST['id'];
	
	 
    
		  		  $sel="select * from result where result_name='$id1'";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
			
			<td align="center"><?PHP echo $ans['roll_no']; ?></td>
			<td align="center"><?PHP echo $ans['result_status']; ?></td>
			
		
					
			
		  </tr>
		
			
		 <?php
				  }
?>
</tr>
</table>
