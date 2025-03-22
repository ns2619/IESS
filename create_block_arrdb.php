<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									{	
										$exname=$_POST["ename"];
										$excourse=$_POST["cname"];
										$sem=$_POST["sem"];
							
										$bno=$_POST["bno"];
										$rno=$_POST["rno"];
										$rnof=$_POST["rnof"];
										$rnot=$_POST["rnot"];
										
										$tstud=$_POST["totstud"];
										if(isset($_POST["bid"]))
											$bid=$_POST["bid"];
										
										if($_POST["op"]=="Save"){
											$sql="insert into block_arrange(exam_name,course_name,sem_no,block_no,room_no,roll_no_from,roll_no_to,total_stud) values('".$exname."','".$excourse."','".$sem."','".$bno."','".$rno."','".$rnof."','".$rnot."','".$tstud."')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update block_arrange set exam_name='$exname',course_name='$excourse',sem_no='$sem',block_no='$bno',room_no='$rno',roll_no_from='$rnof',roll_no_to='$rnot',total_stud='$tstud' where b_id=$bid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from block_arrange where b_id=$bid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:create_block_arr.php?msg=$msg");
									}
									
?>