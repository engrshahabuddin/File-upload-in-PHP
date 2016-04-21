<?php

if(isset($_POST['form_name'])) {
	
	try {
		
		$uploaded_file = $_FILES['file_name']['name'];
		
		
		$file_basename = substr($uploaded_file, 0, strripos($uploaded_file, '.')); // strip extention
		$file_ext = substr($uploaded_file, strripos($uploaded_file, '.')); // strip name
		$f1 = '1'. $file_ext;
				
		/*
		$filesize = filesize($_FILES['file_name']['tmp_name']) * .0009765625; // bytes to KB
		if($filesize > 500) {
			throw new Exception('file size exceeds (2KB is maximum)');
		}
		*/		
		
		if(($file_ext!='.png')&&($file_ext!='.jpg')) {
			throw new Exception('file must be png or jpg');
		}
		
			
		move_uploaded_file($_FILES['file_name']['tmp_name'], 'upload/'.$f1);
		
		
		/*
		list($width, $height, $type, $attr) = getimagesize('upload/'.$f1);
		
		echo 'Width of image: '.$width.'<br>';
		echo 'Height of image: '.$height.'<br>';
		*/
		
		//$filesize = filesize($file) * .0009765625; // bytes to KB
		//$filesize = (filesize($file) * .0009765625) * .0009765625; // bytes to MB
		//$filesize = ((filesize($file) * .0009765625) * .0009765625) * .0009765625; // bytes to GB
		
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}
