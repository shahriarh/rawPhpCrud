<?php 
include "inc/header.php"; 
include "config.php";
include "Database.php";
?>

<?php
	 $db = new Database();
	 if(isset($_POST['submit'])){
	 	$name=mysqli_real_escape_string($db->link,$_POST['name']);
	 	$email=mysqli_real_escape_string($db->link,$_POST['email']);
	 	$skill=mysqli_real_escape_string($db->link,$_POST['skill']);
	 	if ($name==''|| $email==''|| $skill=='') {
	 		$error = "feild must not be empty!";
	 	}else{
	 		$query ="insert into tbluser(name,email,skill) values('$name','$email','$skill')";
	 		$create =$db->insert($query);
	 	}
	 }	
?>
	 <?php 
	if (isset($error)) {
		echo "<span style='color:red'>".$error."</span>";
	}
   
	
?>

<form action="create.php" method="post">
<table class="tblone">
	
<tr>
	<td>Name</td>
	<td><input type="text" name="name" placeholder="Please enter name"/></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type="text" name="email" placeholder="Please enter Email"/></td>
</tr>
<tr>
	<td>Skill</td>
	<td><input type="text" name="skill" placeholder="Please enter skill"/></td>
</tr>
<tr>
	<td></td>
	<td>
		<input type="submit" name="submit" value="submit" />
		<input type="reset" value="cancel" />
	</td>
</tr>


</table>
</form>
<a href="index.php">GO Back</a>

<?php include "inc/footer.php"; ?>