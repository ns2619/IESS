<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									{	
										$labno=$_POST["lno"];
										$labs=$_POST["lstrength"];
										$labsp=$_POST["lspecial"];
										if(isset($_POST["lid"]))
											$lid=$_POST["lid"];
										
										if($_POST["op"]=="Save"){
											$sql="insert into lab_master(lab_no,lab_strength,lab_specialization) values('$labno','$labs','$labsp')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update lab_master set lab_no='$labno',lab_strength='$labs',lab_specialization='$labsp' where lab_id=$lid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from lab_master where lab_id=$lid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:lab.php?msg=$msg");
									}
									
?>





