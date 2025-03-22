<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									{	
										$result_name=$_POST["result_name"];
										$course_name=$_POST["course_name"];
										$sem_no=$_POST["sem_no"];
										$roll_no=$_POST["roll_no"];
										$result_status=$_POST["result_status"];
										
										if(isset($_POST["rid"]))
											$rid=$_POST["rid"];
										
										if($_POST["op"]=="Save"){
											$sql="insert into result(result_name,course_name,sem_no,roll_no,result_status)                            
											      values('result_name','course_name','sem_no','roll_no','result_status')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update result set result_name='$result_name',course_name='$course_name',sem_no='$sem_no',roll_no='$roll_no',result_status='$result_status' where result_id=$rid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from result where result_id=$rid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:result.php?msg=$msg");
									}
									
?>