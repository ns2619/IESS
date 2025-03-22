<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									
									
									$labno=$_POST["lno"];
										$labs=$_POST["lstrength"];
										$labsp=$_POST["lspecial"];
										if(isset($_POST["lid"]))
											$lid=$_POST["lid"];
										
									
									
									{	
										
										$cname=$_POST["course"];
										$sem=$_POST["sem"];
										$sucode=$_POST["subcode"];
										$suname=$_POST["subname"];
										$sutype=$_POST["subtype"];
										
										if(isset($_POST["sid"]))
											$sub_id=$_POST["sid"];
										
										if($_POST["op"]=="Save"){
											//$sql="insert into sub_master(course_name,sem_no,sub_code,sub_name,sub_type)
												//  values('$course','$sem','$sucode','$suname','$sutype')";
												  
												  $sql="insert into sub_master(course_name,sem_no,sub_code,sub_name,sub_type)
												  values('".$cname."','".$sem."','".$sucode."','".$suname."','".$sutype."')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update sub_master set course_name='$cname',sem_no='$sem',sub_code='$sucode',sub_name='$suname',sub_type='$sutype' where sub_id=$sid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from sub_master where sub_id=$sid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:subject.php?msg=$msg");
									}
									
?>