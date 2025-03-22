<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									{	
										$course=$_POST["cname"];
										$sem=$_POST["tsem"];
										if(isset($_POST["cid"]))
											$cid=$_POST["cid"];
										
										if($_POST["op"]=="Save"){
											$sql="insert into course_master(course_name,total_sem) values('".$course."','".$sem."')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update course_master set course_name='$course',total_sem='$sem' where course_id=$cid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from course_master where course_id=$cid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:course.php?msg=$msg");
									}
									
?>