<!DOCTYPE html>
<html>
<head>
	<title>loging page</title>

	
<style type="text/css">
	.h1{
	color: #FF00FF;
	font-family: sans-serif;
	text-align: center;
}
.div1{
	text-align: center;
	border-style: solid;
	width: 600px;
	height: 350px;
	background-color: #e0ffff;
	border-radius: 15px;
	
}
.body1{
	display: flex;
	align-items: center;
	justify-content: center;
	margin-top: 150px;
	background-image: url("Capture-43.jpg");
	background-repeat: no-repeat;
	background-size: 100%;
}

	input{
	padding: 5px 20px;
	border-radius: 5px;
	margin: 3px;
}
	</style>

</head>

<body class="body1">
	<div class="div1">
		<br>
		
		<img src="uni_logo.jpg" height="75" width="350" alt="University Logo">

	<h1 class="h">EXAMINATION ADDMISSION CARD GENERATING SYSTEM</h1>

	<form action="check.php" method="post">
		<input type="text" name="usn" placeholder="Enter User Name"><br>
		<input type="password" name="psw" placeholder="Password"><br><br>
		<input type="submit" name="submit" class="sub">
	</form>
	
	
	</div>

</body>
</html>