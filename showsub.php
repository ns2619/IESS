		 
		 <?php
		 
		 
			 include("connect.php");
			 $course=$_REQUEST['subject'];
		 
			 if($_REQUEST["subject"])
			 {
					 
				$query = "select * from sub_master where sub_id='$sid'";

		                $result1 = @mysqli_query($con,$query);

                                				 
		 
				 while($row = mysqli_fetch_array($result1))
                                   
                                     echo "<select name='sname'>";
                                        echo "<option value='select'>Select Subject";
										
										echo "<option value='".$row["sub_id"]."'>".$row["sub_name"]."</option>";
                                        
				    
					
                                    }
				 echo "</select>";
		         }
			 mysqli_close($con);
		 
		 ?>
