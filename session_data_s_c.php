		<?php
					
					if(isset($_SESSION['exam_sub_co_ordinator']))
					{
						
						echo "<h2 class='title'> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Welcome, ";
						//$user=$_SESSION['exam_sub_co_ordinator'];
						echo "Exam Sub co-ordinator</h2>";
					
					}
					else
					{
						function redirect($url)
						{
							if(!headers_sent())
							{
							 //If headers not sent yet... then do php redirect
							header('Location: '.$url);
							exit;
							}
							
							else
							{
							    //If headers are sent... do javascript redirect... if javascript disabled, do html redirect.
							    echo '<script type="text/javascript">';
							    echo 'window.location.href="'.$url.'";';
							    echo '</script>';
							}
						}
							redirect("login.php");
					}
			?>
			