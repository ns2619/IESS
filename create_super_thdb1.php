<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									{	
										$exname=$_POST["ename"];
										$edate=$_POST["edate"];
										$fname=$_POST["fname"];
							
										$bno=$_POST["bno"];
										$rno=$_POST["rno"];
										$timef=$_POST["timef"];
										$timet=$_POST["timet"];
										
										$rfname=$_POST["rfname"];
										if(isset($_POST["sid"]))
											$bid=$_POST["sid"];
										
										if($_POST["op"]=="Save"){
											$sql="insert into supervision_schedule(exam_name,exam_date,fac_name,block_no,room_no,time_from,time_to,reliever_fac_name) values('".$exname."','".$edate."','".$fname."','".$bno."','".$rno."','".$timef."','".$timet."','".$rfname."')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update supervision_schedule set exam_name='$exname',exam_date='$edate',fac_name='$fname',block_no='$bno',room_no='$rno',time_from='$timef',time_to='$timet',reliever_fac_name='$rfname' where sup_id=$sid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from supervision_schedule where sup_id=$sid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:create_super_th1.php?msg=$msg");
									}
									
?>