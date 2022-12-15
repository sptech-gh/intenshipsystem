<?php

function file_upload($location,$image){
//file upload
		  $fileName =trim($_FILES[$image]['tmp_name']);
          $image = trim($_FILES[$image]['name']);
            
          move_uploaded_file($fileName, "{$location}{$image}");
           
            //error checking script
		if($_FILES[$image]['error'] > 0){
			switch ($_FILES[$image]['error']) {
				case 1: echo '<script> alert("File exceeded maximum server upload size. EVENT NOT CREATED!"); </script>';
					break;
				case 2: echo '<script> alert("File exceeded maximum file size. EVENT NOT CREATED!"); </script>';
					break;
				case 3: echo '<script> alert("File only partially uploaded. EVENT NOT CREATED!"); </script>';
					break;
				case 4: echo '<script> alert("No file upload. EVENT NOT CREATED!"); </script>';
					break;
				
				default:
					# code...
					break;
			}
	}

}

?>