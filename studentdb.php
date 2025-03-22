<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									{	
										$course=$_POST["course"];
										$semno=$_POST["sem"];
										$year=$_POST["year"];
										$sroll=$_POST["stroll"];
										$eroll=$_POST["enroll"];
										$tstud=$_POST["tstudent"];
										$tcstud=$_POST["cstudent"];
										if(isset($_POST["sid"]))
											$lid=$_POST["sid"];
										
										if($_POST["op"]=="Save"){
											$sql="insert into stud_strength_master(course_name,sem_no,year,roll_no_from,roll_no_to,total_stud,total_cancel_stud) values('".$course."','".$semno."','".$year."','".$sroll."','".$eroll."','".$tstud."','".$tcstud."')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update stud_strength_master set course_name='$course',sem_no='$semno',year='$year',roll_no_from='$sroll',roll_no_to='$eroll',total_stud='$tstud',total_cancel_stud='$tcstud' where stud_id=$sid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from stud_strength_master where stud_id=$sid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:student.php?msg=$msg");
									}
									
?>