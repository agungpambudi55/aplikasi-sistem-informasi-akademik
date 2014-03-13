<?php
session_start();
$path = "../image/sementara/";
	$valid_formats = array("jpg","JPG", "jpeg","JPEG", "png", "gif", "bmp");
	if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST")
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats))
					{
					if($size<(9999*9999))
						{
							$filename = strtolower(date("HmsdmY").$name);
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$filename))
								{	
									echo "<img src='".$path.$filename."'  class='preview'>";
									$_SESSION['photo_guru']=$filename;
								}
							else
								echo "failed";
						}
						else
						echo "Image file size max 1 MB";					
						}
						else
						echo "Invalid file format..";	
				}
			else
				echo "Please select image..!";
			exit;
		}
?>