<?php 
require_once 'config.php';
$username=$_POST['usn'];
$password=$_POST['psw'];

$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result)>0) {
	echo "<script>
	window.location.href='home.php';
	</script>";
}
else{
	echo "<script>
	alert('loging fail!!');
	window.location.href='index.php';
	</script>";
}

 ?>