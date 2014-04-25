<?php

function prep_input($string)
{
    $link = $GLOBALS['link'];
    $string = mysqli_real_escape_string($link,$string);
$string = htmlentities($string); 
    return $string;
}

function count_rows($sql_query)
{
    $link = $GLOBALS['link'];//getting the link var in the config.php file
    $result = mysqli_prepare($link,$sql_query);
    mysqli_stmt_execute($result);
    mysqli_stmt_store_result($result);
    $rows = mysqli_stmt_num_rows($result);
    return ($rows);   
}

function check_login($USERID)
{
    $sql_select = "SELECT USERID FROM users WHERE USERID = '$USERID'";
    $rows = count_rows($sql_select);
    if($rows == 1)
    {
        return true;
    }
    else
    {
        header("location:index.php"); 
    }
}

function upload_image($file, $location, $name)
{
    if ($file["name"] != '')
	{
        $file["name"] = strtolower($file["name"]);
	    $allowedExts = array("gif","jpeg","jpg","png");
        $full_file_name = $file["name"];
        $tmp = explode(".", $full_file_name);
        $extension = end($tmp);
        $file_type = $file["type"];
		if ((($file_type == "image/gif") || ($file_type == "image/jpeg") || ($file_type == "image/jpg") || ($file_type == "image/png")) && in_array($extension, $allowedExts))
		{
			if ($extension == "jpg" || $extension == "jpeg")
			{
				$uploadedfile = $file['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
			}
			elseif ($extension == "png")
			{
				$uploadedfile = $file['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
			}
			else
			{
                $uploadedfile = $file['tmp_name'];
				$src = imagecreatefromgif($uploadedfile);
			}
            $abs_dir = realpath(dirname(__FILE__) . '/..');
 			$img_name = $name;
            $filename = $location . $img_name.".".$extension;
			imagejpeg($src, $filename, 100);
			imagedestroy($src);
			
			$image_name = $img_name.'.'.$extension;
            return $image_name;
		}
		else
		{
			$error = 1;
			echo '<div class="error">Invalid image format</div>';
			$sql_addon = null;
		}
    }
}

function upload_image_thumb($file, $location, $name){
    if ($file["name"] != '')
    {
		$file["name"] = strtolower($file["name"]);
	    $allowedExts = array("gif","jpeg","jpg","png");
        $full_file_name = $file["name"];
        $tmp = explode(".", $full_file_name);
        $extension = end($tmp);
        $file_type = $file["type"];
		if ((($file_type == "image/gif") || ($file_type == "image/jpeg") || ($file_type == "image/jpg") || ($file_type == "image/png")) && in_array($extension, $allowedExts))
		{
            if ($extension == "jpg" || $extension == "jpeg")
			{
				$uploadedfile = $file['tmp_name'];
				$src = imagecreatefromjpeg($uploadedfile);
			}
			elseif ($extension == "png")
			{
				$uploadedfile = $file['tmp_name'];
				$src = imagecreatefrompng($uploadedfile);
			}
			else
			{
                $uploadedfile = $file['tmp_name'];
				$src = imagecreatefromgif($uploadedfile);
			}

			list($width, $height) = getimagesize($uploadedfile);
            
            $img_name = $name;
			$newwidth = 300;
			$newheight = ($height / $width) * $newwidth;
			$tmp = imagecreatetruecolor($newwidth, $newheight);

			imagecopyresampled($tmp, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

			$filename = $location . $img_name.".".$extension;
   
			imagejpeg($tmp, $filename, 100);

			imagedestroy($src);
			imagedestroy($tmp);
            
			$image_name = $img_name.'.'.$extension;
            return $image_name;
        }
        else
		{
            $error = 1;
			$error .= '<p>Invalid image format</p>';
			
        }
    }
}

function file_upload($file,$name)
{   
    $full_file_name = $file["name"];
    $tmp = explode(".", $full_file_name);
    $extension = end($tmp);
    $file_name = $name.'.'.$extension;
    $abs_dir = realpath(dirname(__FILE__) . '/..');
    move_uploaded_file($file["tmp_name"],$abs_dir.'/files/'.$file_name);
    return $file_name;      
}

?>