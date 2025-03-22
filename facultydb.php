<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									{	
										
										$fname=$_POST["fname"];
										$gender=$_POST["ge"];
										$mno=$_POST["no"];
										$doj=$_POST["cdt"];
										if(isset($_POST["fid"]))
											$fid=$_POST["fid"];
										
										if($_POST["op"]=="Save"){
											$sql="insert into faculty_master(fac_name,gender,mobile_no,date_of_join) values('".$fname."','".$gender."','".$mno."','".$doj."')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update faculty_master set fac_name='$fname',gender='$gender',mobile_no='$mno',date_of_join='$doj' where fac_id=$fid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from faculty_master where fac_id=$fid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:faculty_data.php?msg=$msg");
									}
									
?>