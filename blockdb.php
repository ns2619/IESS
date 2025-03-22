<?php

									include("connect.php");
									
									if(isset($_POST["op"]))
									{	
										$bno1=$_POST["blno"];
										$rno1=$_POST["rono"];
										$bstr1=$_POST["bstrength"];
										if(isset($_POST["bid"]))
											$bid=$_POST["bid"];
										
										if($_POST["op"]=="Save"){
											$sql="insert into block_master(block_no,room_no,block_strength) values('$bno1','$rno1','$bstr1')";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Insert SuccessFully";
											}
											else
												$msg="Insert Not SuccessFully";
					
										}
										else if($_POST["op"]=="Update"){
				
											echo $sql="update block_master set block_no='$bno1',room_no='$rno1',block_strength='$bstr1' where block_id=$bid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Update SuccessFully";
											}
											else
												$msg="Update Not SuccessFully";
												
										}
										else if($_POST["op"]=="Delete"){
											echo $sql="delete from block_master where block_id=$bid";
											$i=mysqli_query($con,$sql);
											$msg="";
											if($i>0){
												$msg="Delete SuccessFully";
											}
											else
												$msg="Delete Not SuccessFully";
										
										}
										header("location:block.php?msg=$msg");
									}
									
?>