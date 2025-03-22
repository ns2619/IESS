<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									{	
										$exname=$_POST["ename"];
										$edate=$_POST["edate"];
										$fname=$_POST["fname"];
							
										$lno=$_POST["lno"];
									
										$timef=$_POST["timef"];
										$timet=$_POST["timet"];
										
										
										if(isset($_POST["sid"]))
											$bid=$_POST["sid"];
										
										if($_POST["op"]=="Save"){
											$sql="insert into supervision_schedule_pr(exam_name,exam_date,fac_name,lab_no,time_from,time_to) values('".$exname."','".$edate."','".$fname."','".$lno."','".$timef."','".$timet."')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update supervision_schedule_pr set exam_name='$exname',exam_date='$edate',fac_name='$fname',lab_no='$lno',time_from='$timef',time_to='$timet' where sup_id_pr=$sid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from supervision_schedule_pr where sup_id_pr=$sid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:create_super_pr1.php?msg=$msg");
									}
									
?>