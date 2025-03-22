<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									{	
										$exname=$_POST["name"];
										$exyear=$_POST["year"];
										$extype=$_POST["type"];
										if(isset($_POST["eid"]))
											$eid=$_POST["eid"];
										
										if($_POST["op"]=="Save"){
											$sql="insert into exam_info_master(exam_name,exam_year,exam_type) values('$exname','$exyear','$extype')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update exam_info_master set exam_name='$exname',exam_year='$exyear',exam_type='$extype' where exam_id=$eid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from exam_info_master where exam_id=$eid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:create_exam1.php?msg=$msg");
									}
									
?>