<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;   
    cursor: inherit;
    display: block;
}
</style>
<body>

<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">Steganography Using ED Key</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/pyphp/index.php">Encode Image</a></li>
      <li><a href="/pyphp/decodeupload.php">Decode Image</a></li>
      <li><a href="/pyphp/audio/index.php">Encode Audio</a></li>
      <li><a href="/pyphp/audio/decodeupload.php">Decode Audio</a></li>	  
    </ul>
	<ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-phone"></span>Contact Us</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-user"></span>About Us</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">


<form action="upload.php" method="post" enctype="multipart/form-data">
	
	<h1>Encode Image</h1>
	<br><br>
	Select Image(PNG File only) to upload:
	<input type="file" name="imgToUpload" id="imgToUpload">
	<br>
	Select text or bin to upload:	
	<input type="file" name="txtToUpload" id="txtToUpload">
	<br>
	Enter password to encode:	
	<input type="password" name="passToUpload" id="passToUpload">
	<br>
	<input type="submit" value="Upload Image" name="submit">
</form>
</div>
</body>
</html>
