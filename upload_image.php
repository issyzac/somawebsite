<?php
	// error_reporting(0);

	$photo = $_FILES['photo'];
	$name = $_POST['name'];
	$ext = $_POST['ext'];

	// $ext = strtolower(pathinfo($name,PATHINFO_EXTENSION));

	$uploadOk = 1;
	$msg = "";
	$max_size = 2000000;


	if (isset($photo)) {
		// $check = getimagesize($_FILES['photo']["tmp_name"]);
		// if($check === false) {
		// 	$msg = "File is not an image.";
		// 	$uploadOk = 0;
		// }
		if ($photo["size"] > $max_size) {
			$msg = "Sorry, your file is too large.";
			$uploadOk = 0;
		}
		else if($ext != "jpg" && $ext != "png" && $ext != "jpeg"
			&& $ext != "gif" ) {
				$msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
		}


		if ($uploadOk == 0) {
			echo json_encode(["success" => false, "msg" => $msg,"photo" => json_encode($_FILES['photo'])]);
		} else {
			$file_name = time() . '-' . getRandStr(4) . '.' . $ext;
			$relative_path = 'uploads/' . $file_name;

			if (move_uploaded_file($_FILES['photo']["tmp_name"], $relative_path)) {
				echo json_encode([
					"success" => true, 
					"path" => getBaseUrl() . $relative_path
				]);

			} else {
				echo json_encode(["success" => false, "msg" => "Sorry, there was an error uploading your file."]);
			}
		}
		
		exit();
	}else{
		echo json_encode(["success" => false, "msg" => "Please upload an image."]);
		exit();
	}

	function getBaseUrl() {
		// output: /myproject/index.php
		$currentPath = $_SERVER['PHP_SELF'];
		
		// output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index )
		$pathInfo = pathinfo($currentPath);
		
		// output: localhost
		$hostName = $_SERVER['HTTP_HOST'];
		
		// output: http://
		$protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://'?'https://':'http://';
		
		// return: http://localhost/myproject/
		return $protocol.$hostName."/";
	}

	function getRandStr($length = 10){
		return substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
	}