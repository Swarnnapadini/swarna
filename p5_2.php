<html>
	<head>
		<title>PHP5.2</title>
	<body>
		<form action="" method="POST">
			Email:<input type="text" name="email"><br><br>
			Password:<input type="text" name="password"><br><br>
			<input type="submit" name="submit" value="submit">
		</form>
	</body>
</html>			
	
<?php
$con=new mysqli("localhost","root","","php5");
if(!$con){
	echo"not ok";
	}
else
{
if(isset($_POST['submit'])){
	$email=$_POST['email'];
	$password=$_POST['password'];

$s = "SELECT * FROM table2 where email='$email' and password='$password'";
$sel=$con->query($s);		
	
	if($sel->num_rows>0){
		//echo "<script>alert("login successfull")</script>";
	 	header("location:welcome.php");
	 }
	//else{
	// 	echo"<script>alert("login unsuccessfull")</script>";
	// }	

}
}				
?>	
