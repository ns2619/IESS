<?php
session_start();
?>
<table> 
 <?php
 

header("Content-Type: application/vnd.ms-word"); 
header("Expires: 0"); 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0"); 
header("content-disposition: attachment;filename=BlockArrangement1.doc");
 
 
 	include("connect.php");
	
   ?>
   <p>&nbsp;</p>
	
	<table width="100%" border="1" bgcolor='#EAEAFF' bordercolor='#0000CC'>
			
			   		
				<td align="center">Course Name</td>
			<td align="center">Sem No</td>
			<td align="center">Block No</td>
			<td align="center">Room No</td>
			<td align="center">Starting Roll No</td>
			<td align="center">Ending Roll No</td>
			<td align="center">Total Students</td>
		
					
					  <tr>
	<?php	  
     $id1=$_REQUEST['id'];
	
	 
    
		  		  $sel="select * from block_arrange where exam_name='$id1'";
				  $qr1=mysqli_query($con,$sel);
				  while($ans=mysqli_fetch_array($qr1))
				  {
				  ?>
			<td align="center"><?PHP echo $ans['course_name']; ?></td>
				  <td align="center"><?PHP echo $ans['sem_no']; ?></td>
			
			<td align="center"><?PHP echo $ans['block_no']; ?></td>
			<td align="center"><?PHP echo $ans['room_no']; ?></td>
			<td align="center"><?PHP echo $ans['roll_no_from']; ?></td>
			<td align="center"><?PHP echo $ans['roll_no_to']; ?></td>
			<td align="center"><?PHP echo $ans['total_stud']; ?></td>
		
			
		  </tr>
		
			
		 <?php
				  }
?>
</tr>
</table>
