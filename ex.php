<?php
include("connect.php");

$query = "select * from course_master where course_id=1";

		                $result1 = @mysqli_query($con,$query);

                                				 
		 
				 //echo "<select name='sem'>";
				 //echo "<option value='select'>Select sem";
				 while($row = mysqli_fetch_array($result1))
                                    $tsem=$row[2];
                                 echo $tsem;
?>
                                 