<?php 
include "inc/header.php"; 
include "config.php";
include "Database.php";
?>

<?php
	 $id = $_GET['id'];
	 $db = new Database();  
	 //$query = "SELECT * FROM tbluser WHERE id=$id";
	 $query = "Select * from tbluser WHERE id=$id";
	 $getData  = $db->select($query)->fetch_assoc();



	 if(isset($_POST['submit'])){
	 	$name=mysqli_real_escape_string($db->link,$_POST['name']);
	 	$email=mysqli_real_escape_string($db->link,$_POST['email']);
	 	$skill=mysqli_real_escape_string($db->link,$_POST['skill']);
	 	if ($name==''|| $email==''|| $skill=='') {
	 		$error = "feild must not be empty!";
	 	}else{
	 		$query ="update tbluser
	 		set 
	 		name  = '$name',
	 		email = '$email',
	 		skill = 'skill'
	 		where id=$id";

	 		$update =$db->update($query)->fetch_assoc();
	 	}
	 }

?>

<?php
	if (isset($_POST['delete'])) {
		$query = "delete from tbluser where id=$id";

		$deleteData=$db->delete($query);

	}

?>



	 <?php 
	if (isset($error)) {
		echo "<span style='color:red'>".$error."</span>";
	}	
?>




<form action="update.php?id=<?php echo $id?>" method="post">
<table class="tblone">	
	
<tr>
	<td>Name</td> 
	<td><input type="text" name="name" value="<?php echo  $getData['name'] ?>"/></td>
</tr>
<tr>
	<td>Email</td>
	<td><input type="text" name="email" value="<?php echo  $getData['email'] ?>"/></td>
</tr>
<tr>
	<td>Skill</td>
	<td><input type="text" name="skill" value="<?php echo  $getData['skill'] ?>"/></td>
</tr>
<tr>
	<td></td>
	<td>
		<input type="submit" name="submit" value="update" />
		<input type="reset" value="cancel" />
		<input type="submit" name="delete" value="delete" />
	</td>
</tr>


</table>
</form>
<a href="index.php">GO Back</a>

<?php include "inc/footer.php"; ?>