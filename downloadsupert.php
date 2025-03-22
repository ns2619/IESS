<?php
session_start();
?>
<table> 
 <?php
 

header("Content-Type: application/vnd.ms-word"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=TheorySupervisionSchedule.doc");
 
 
 	include("connect.php");
	
   ?>
   <p>&nbsp;</p>
	
	<table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
			
			   		
				<td align="center">Exam Date</td>
			   		
					<td align="center">Faculty Name</td>
			<td align="center">Block No</td>
			<td align="center">Room No</td>
				
			
			<td align="center">Start Time</td>
			<td align="center">End Time</td>
			<td align="center">Reliever Faculty Name</td>
					
					  <tr>
	<?php	  
     $id1=$_REQUEST['id'];
	
	 
    
		  		  $sel="select * from supervision_schedule where exam_name='$id1'";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
			
			<td align="center"><?PHP echo $ans['exam_date']; ?></td>
			<td align="center"><?PHP echo $ans['fac_name']; ?></td>
			<td align="center"><?PHP echo $ans['block_no']; ?></td>
			<td align="center"><?PHP echo $ans['room_no']; ?></td>
			
			<td align="center"><?PHP echo $ans['time_from']; ?></td>
			<td align="center"><?PHP echo $ans['time_to']; ?></td>
			<td align="center"><?PHP echo $ans['reliever_fac_name']; ?></td>
		
					
			
		  </tr>
		
			
		 <?php
				  }
?>
</tr>
</table>
