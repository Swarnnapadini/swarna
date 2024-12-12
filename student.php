<html>
<body>
<form action=""method="post">
Id<input type="text"name="id"><br><br>
Name<input type="text"name="name"><br><br>
Age<input type="text"name="age"><br><br>
Class<input type="text"name="class"><br><br>
<input type="submit"value="submit">
</form>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	$id=$_POST['id'];
	$name=$_POST['name'];
	$age=$_POST['age'];
	$class=$_POST['class'];
	echo "Name:$name<br>
	id:$id<br>
	age:$age<br>
	class:$class";
	}
?>
