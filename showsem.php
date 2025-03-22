		 
		 <?php
		 
		 
			 include("connect.php");
			 $course=$_REQUEST['course'];
		 
			 if($_REQUEST["course"])
			 {
					 
				$query = "select * from course_master where course_name='$course'";

		                $result1 = @mysqli_query($con,$query);

                                				 
		 
				 while($row = mysqli_fetch_array($result1))
                                     $tsem=$row[2];
                                     echo "<select name='sem'>";
                                        
                                        
				     for($i=1;$i<=$tsem;$i++)
                                     {
                                        {	
			 
                                    	 printf("<option value=\"$i\">$i</option>\n");
					}	
                                    }
				 echo "</select>";
		         }
			 mysqli_close($con);
		 
		 ?>
