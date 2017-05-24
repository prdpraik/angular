<?php
//$dest='uploads/text.jpg';
//$file=file_get_contents($dest); 
//echo strlen($file);
// echo '<br />';
//$file=file_get_contents($dest); 
//echo strlen($file);
 $link=mysql_connect('localhost', 'root', '');
 if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db('test',$link);

?>
<!DOCTYPE html>
<html>
<body>

<form action="#" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input name="my_files" type="file" multiple="multiple" />
    <input type="submit" value="Upload Image" name="submit">
</form>


<?php

 if (isset($_FILES['my_files']))
  {
				$myFile = $_FILES['my_files'];
				 $name =  $myFile["name"];
				 $temp = explode(".",$name);
				$newfilename = round(microtime(true)) . '.'.end($temp);

                  $temporary_file = $myFile["tmp_name"];
				 $type = $myFile["type"];
				 $size = $myFile["size"];
				$temp_path = "temp/$newfilename"; 
				$target_path = "uploads/";   
				if($size>0){ 
                move_uploaded_file($temporary_file,$temp_path);

				$q1="SELECT * FROM upload WHERE file_size='".$size."' AND file_type='".$type."'";
				$res=mysql_query($q1,$link);
				if(mysql_num_rows($res)){
				   $file=file_get_contents($temp_path); 
				   while($row=mysql_fetch_array($res)){
				   $file1=file_get_contents($target_path.$row['file_name']); 
				   
				   if(strcmp($file,$file1)===0){
				    echo 'file already exists';
					unlink($temp_path);
				   }else{
						$q=" INSERT INTO upload(file_name,file_size,file_type) values('".$newfilename."','".$size."','".$type."')";
						mysql_query($q,$link) or die(mysql_error());
						copy($temp_path,$target_path.$newfilename);
						unlink($temp_path);
				   }
				     //$row['file_name'];
				   }
				}else{
					$q=" INSERT INTO upload(file_name,file_size,file_type) values('".$newfilename."','".$size."','".$type."')";
					mysql_query($q,$link) or die(mysql_error());
					copy($temp_path,$target_path.$newfilename);
					unlink($temp_path);
				}

         }



         
}
mysql_close($link);
        ?>


</body>
</html>