<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									{	
										$exname=$_POST["ename"];
										$excourse=$_POST["course"];
										$sem=$_POST["sem"];
							
										$code=$_POST["subcode"];
										$exdate=$_POST["cdt"];
										$fromt=$_POST["timef"];
										$tot=$_POST["timet"];
										$batchname=$_POST["bname"];
										if(isset($_POST["eid"]))
											$eid=$_POST["eid"];
										
										if($_POST["op"]=="Save"){
											$sql="insert into exam_schedule_pr(exam_name,course_name,sem_no,sub_code,batch_name,exam_date,time_from,time_to) values('".$exname."','".$excourse."','".$sem."','".$code."','".$batchname."','".$exdate."','".$fromt."','".$tot."')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update exam_schedule_pr set exam_name='$exname',course_name='$excourse',sem_no='$sem',sub_code='$code',batch_name='$batchname',exam_date='$exdate',time_from='$fromt',time_to='$tot' where exam_schedule_pr_id=$eid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from exam_schedule_pr where exam_schedule_pr_id=$eid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:create_pra_ex_schedule1.php?msg=$msg");
									}
									
?>