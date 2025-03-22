<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									{	
										$exname=$_POST["ename"];
										$bname=$_POST["bname"];
										$excourse=$_POST["cname"];
										
										$sem=$_POST["sem"];
							
										$lno=$_POST["lno"];
									
										$rnof=$_POST["rnof"];
										$rnot=$_POST["rnot"];
										
										$tstud=$_POST["totstud"];
										if(isset($_POST["bid"]))
											$bid=$_POST["bid"];
										
										if($_POST["op"]=="Save"){
											$sql="insert into batch_master(exam_name,batch_name,course_name,sem_no,lab_no,rno_from,rno_to,total_stud) values('".$exname."','".$bname."','".$excourse."','".$sem."','".$lno."','".$rnof."','".$rnot."','".$tstud."')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update batch_master set exam_name='$exname',batch_name='$bname',course_name='$excourse',sem_no='$sem',lab_no='$lno',rno_from='$rnof',rno_to='$rnot',total_stud='$tstud' where batch_id=$bid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from batch_master where batch_id=$bid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:create_lab_arr1.php?msg=$msg");
									}
									
?>