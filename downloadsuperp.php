<?php
session_start();
?>
<table> 
 <?php
 

header("Content-Type: application/vnd.ms-word"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=PracticalSupervisionSchedule.doc");
 
 
 	include("connect.php");
	
   ?>
   <p>&nbsp;</p>
	
	<table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
			
			   		
				<td align="center">Exam Date</td>
			   		
					<td align="center">Faculty Name</td>
			<td align="center">Lab No</td>
			
				
			
			<td align="center">Start Time</td>
			<td align="center">End Time</td>
		
					
					  <tr>
	<?php	  
     $id1=$_REQUEST['id'];
	
	 
    
		  		  $sel="select * from supervision_schedule_pr where exam_name='$id1'";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
			
			<td align="center"><?PHP echo $ans['exam_date']; ?></td>
			<td align="center"><?PHP echo $ans['fac_name']; ?></td>
			<td align="center"><?PHP echo $ans['lab_no']; ?></td>
			
			
			<td align="center"><?PHP echo $ans['time_from']; ?></td>
			<td align="center"><?PHP echo $ans['time_to']; ?></td>
					
			
		  </tr>
		
			
		 <?php
				  }
?>
</tr>
</table>
