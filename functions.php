<?php
//upload image to encode
function upimg(){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$target_dir = "/var/www/html/pyphp/uploads/";
$target_file = $target_dir . basename("/var/www/html/pyphp/uploads/image.png");

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imgToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}


// Check file size
if ($_FILES["imgToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


// Allow certain file formats
if($imageFileType != "png") {
    echo "Sorry, only PNG files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imgToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imgToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

//upload encoded image to decode
function deimg(){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$target_dir = "/var/www/html/pyphp/uploads/";
$target_file = $target_dir . basename("/var/www/html/pyphp/uploads/decode.png");

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["imgToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}


// Check file size
if ($_FILES["imgToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}


// Allow certain file formats
if($imageFileType != "png") {
    echo "Sorry, only PNG files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imgToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imgToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}


//upload text or bin
function uptext(){

// Text file Upload
$target_dir = "/var/www/html/pyphp/uploads/";
$target_file = $target_dir . basename("/var/www/html/pyphp/uploads/text.txt");
$uploadOk = 1;
$textFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}


// Check file size
if ($_FILES["txtToUpload"]["size"] > 500) {
    echo "Sorry, your text file is too large.";
    $uploadOk = 0;
}


// Allow certain file formats
if($textFileType != "txt") {
    echo "Sorry, only Txt files are allowed.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["txtToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["txtToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

}

//delete text file
function dlttxt(){

$file = "/var/www/html/pyphp/uploads/text.txt";
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
  }
}

//delete original image
function dltimg(){

$file = "/var/www/html/pyphp/uploads/image.png";
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
  }
}

//delete encoded image
function dltenimg(){

$file = "/var/www/html/pyphp/uploads/encoded.png";
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
  }
}

//delete decoded image
function dltdeimg(){

$file = "/var/www/html/pyphp/uploads/decode.png";
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
  }
}
//delete decoded image
function dltdetxt(){

$file = "/var/www/html/pyphp/uploads/decoded.txt";
if (!unlink($file))
  {
  echo ("Error deleting $file");
  }
else
  {
  echo ("Deleted $file");
  }
}

//add password to text file
function passintxt(){
if(isset($_POST["submit"])) 
{
	$ip = $_POST['passToUpload'];
	$ip = " ".$ip;
	file_put_contents("/var/www/html/pyphp/uploads/text.txt", $ip, FILE_APPEND);
}
}

function checkpass(){
if(isset($_POST["submit"])) 
{
	$passcheck = $_POST['passToCheck'];
	// Your string
	$str = file_get_contents("/var/www/html/pyphp/uploads/decoded.txt");
	// Split it into pieces, with the delimiter being a space. This creates an array.
	$split = explode(" ", $str);
	// Get the last value in the array.
	// count($split) returns the total amount of values.
	// Use -1 to get the index.
	$str = $split[count($split)-1];
	if ($str==$passcheck)
	{
		$str = file_get_contents("/var/www/html/pyphp/uploads/decoded.txt");
		$words = explode( " ", $str );
		array_splice( $words, -1 );
		$ip = implode( " ", $words );
		file_put_contents("/var/www/html/pyphp/uploads/decoded.txt", $ip);
		echo ("password matched");
		echo '<META HTTP-EQUIV="Refresh" CONTENT="5; URL=/pyphp/downloadtext.php">';
	}
	else
	{
		echo ("pass not matched");
	}
}
}

?>
